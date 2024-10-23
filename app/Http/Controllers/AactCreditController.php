<?php

namespace App\Http\Controllers;
use App\Models\AactAccount;
use Illuminate\Support\Facades\Session;
use App\Models\AactCredit;
use Illuminate\Http\Request;

class AactCreditController extends Controller
{
    public function index()
    {
        $aact_credits = AactCredit::all();
        return view('content.AactCredit.index', compact('aact_credits'));
    }
    public function create()
    {
        $aact_account = AactAccount::all();
        return view('content.AactCredit.add', compact('aact_account'));
    }
    public function creates()
    {
        $aact_account = AactAccount::all();
        return view('content.AactCredit.add_account', compact('aact_account'));
    }
    public function store(Request $request)
    {
        $aact_credit = new AactCredit();
        $aact_credit->credits_code = $request->credits_code;
        $aact_credit->credits_name = $request->credits_name;
        $aact_credit->receivable_account_id = $request->receivable_account_id;
        $aact_credit->income_account_id = $request->income_account_id;
        $aact_credit->save();

        Session::flash('success', 'Berhasil menambah Kode Pembiayaan!');
        return redirect()->route('aact_credit.index');
    }
    public function stores(Request $request)
    {
        $aact_accoun = new AactAccount();
        $aact_accoun->account_code = $request->account_code;
        $aact_accoun->account_name = $request->account_name;
        $aact_accoun->account_group = $request->account_group;
        // $aact_credit->account_status = $request->account_status;
        // $aact_credit->account_type_id = $request->account_type_id;
        $aact_accoun->save();

        Session::flash('success', 'Berhasil menambah Nomor Perkiraan Baru!');
        return redirect()->route('aact_credit.create');
    }
    public function update($id)
    {
        $aact_credits = AactCredit::find($id);
        $aact_account = AactAccount::all();
        return view('content.AactCredit.edit', compact('aact_credits','aact_account'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $aact_credit = AactCredit::find($id);
        $aact_credit->credits_code = $request->credits_code;
        $aact_credit->credits_name = $request->credits_name;
        $aact_credit->receivable_account_id = $request->receivable_account_id;
        $aact_credit->income_account_id = $request->income_account_id;
        $aact_credit->update();

        Session::flash('warning', 'Berhasil Mengubah Kode Pembiayaan!');
        return redirect()->route('aact_credit.index');
    }
    public function delete($id)
    {
        $aact_credits = AactCredit::find($id);
        $aact_credits->delete();

        Session::flash('danger', 'Berhasil Menghapus Kode Pembiayaan!');
        return redirect()->route('aact_credit.index');
    }
}
