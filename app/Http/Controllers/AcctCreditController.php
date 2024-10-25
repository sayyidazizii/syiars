<?php

namespace App\Http\Controllers;
use App\Models\AcctAccount;
use Illuminate\Support\Facades\Session;
use App\Models\AcctCredit;
use Illuminate\Http\Request;

class AcctCreditController extends Controller
{
    public function index()
    {
        $acct_credits = AcctCredit::all();
        return view('content.AcctCredit.index', compact('acct_credits'));
    }
    public function create()
    {
        $acct_account = AcctAccount::all();
        return view('content.AcctCredit.add', compact('acct_account'));
    }
    public function store(Request $request)
    {
        $acct_credit = new AcctCredit();
        $acct_credit->credits_code = $request->credits_code;
        $acct_credit->credits_name = $request->credits_name;
        $acct_credit->account_id = $request->account_id;
        $acct_credit->account_id = $request->account_id;
        $acct_credit->save();

        Session::flash('success', 'Berhasil menambah Kode Pembiayaan!');
        return redirect()->route('acct_credit.index');
    }
        public function update($id)
    {
        $acct_credits = AcctCredit::find($id);
        $acct_account = AcctAccount::all();
        return view('content.AcctCredit.edit', compact('acct_credits','acct_account'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $acct_credit = AcctCredit::find($id);
        $acct_credit->credits_code = $request->credits_code;
        $acct_credit->credits_name = $request->credits_name;
        $acct_credit->account_id = $request->account_id;
        $acct_credit->account_id = $request->account_id;
        $acct_credit->update();

        Session::flash('warning', 'Berhasil Mengubah Kode Pembiayaan!');
        return redirect()->route('acct_credit.index');
    }
    public function delete($id)
    {
        $acct_credits = AcctCredit::find($id);
        $acct_credits->delete();

        Session::flash('danger', 'Berhasil Menghapus Kode Pembiayaan!');
        return redirect()->route('acct_credit.index');
    }
}
