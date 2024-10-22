<?php

namespace App\Http\Controllers;
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
        return view('content.AactCredit.add');
    }
    public function store(Request $request)
    {
        $aact_credit = new AactCredit();
        $aact_credit->credits_code = $request->credits_code;
        $aact_credit->credits_name = $request->credits_name;
        $aact_credit->credits_number = $request->credits_number;
        $aact_credit->credits_fine = $request->credits_fine;
        $aact_credit->save();

        Session::flash('success', 'Berhasil menambah Kode Pembiayaan!');
        return redirect()->route('aact_credit.index');
    }
    public function update($id)
    {
        $aact_credits = AactCredit::find($id);
        return view('content.AactCredit.edit', compact('aact_credits'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $aact_credit = AactCredit::find($id);
        $aact_credit->credits_code = $request->credits_code;
        $aact_credit->credits_name = $request->credits_name;
        $aact_credit->credits_number = $request->credits_number;
        $aact_credit->credits_fine = $request->credits_fine;
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
