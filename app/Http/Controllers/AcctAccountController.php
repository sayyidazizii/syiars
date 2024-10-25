<?php

namespace App\Http\Controllers;

use App\Models\AcctAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AcctAccountController extends Controller
{
    public function index()
    {
        $acct_account = AcctAccount::all();
        return view('content.AcctAccount.index', compact('acct_account'));
    }
    public function create()
    {
        return view('content.AcctAccount.add');
    }
    public function store(Request $request)
    {
        $acct_accoun = new AcctAccount();
        $acct_accoun->account_code = $request->account_code;
        $acct_accoun->account_name = $request->account_name;
        $acct_accoun->account_group = $request->account_group;
        $acct_accoun->account_type_id = $request->account_type_id;
        $acct_accoun->account_status = $request->account_status;
        $acct_accoun->save();

        Session::flash('success', 'Berhasil menambah Akun!');
        return redirect()->route('acct_account.index');
    }
        public function update($id)
    {
        $acct_account = AcctAccount::find($id);
        return view('content.AcctAccount.edit', compact('acct_account'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $acct_accoun = AcctAccount::find($id);
        $acct_accoun->account_code = $request->account_code;
        $acct_accoun->account_name = $request->account_name;
        $acct_accoun->account_group = $request->account_group;
        $acct_accoun->account_type_id = $request->account_type_id;
        $acct_accoun->account_status = $request->account_status;
        $acct_accoun->update();

        Session::flash('warning', 'Berhasil Mengubah Akun!');
        return redirect()->route('acct_account.index');
    }
    public function delete($id)
    {
        $acct_account = AcctAccount::find($id);
        $acct_account->delete();

        Session::flash('danger', 'Berhasil Menghapus Akun!');
        return redirect()->route('acct_account.index');
    }
}
