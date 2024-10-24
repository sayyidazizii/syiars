<?php

namespace App\Http\Controllers;

use App\Models\AactAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AactAccountController extends Controller
{
    public function index()
    {
        $aact_account = AactAccount::all();
        return view('content.AactAccount.index', compact('aact_account'));
    }
    public function create()
    {
        return view('content.AactAccount.add');
    }
    public function store(Request $request)
    {
        $aact_accoun = new AactAccount();
        $aact_accoun->account_code = $request->account_code;
        $aact_accoun->account_name = $request->account_name;
        $aact_accoun->account_group = $request->account_group;
        $aact_accoun->account_type_id = $request->account_type_id;
        $aact_accoun->account_status = $request->account_status;
        $aact_accoun->save();

        Session::flash('success', 'Berhasil menambah Akun!');
        return redirect()->route('aact_account.index');
    }
        public function update($id)
    {
        $aact_account = AactAccount::find($id);
        return view('content.AactAccount.edit', compact('aact_account'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $aact_accoun = AactAccount::find($id);
        $aact_accoun->account_code = $request->account_code;
        $aact_accoun->account_name = $request->account_name;
        $aact_accoun->account_group = $request->account_group;
        $aact_accoun->account_type_id = $request->account_type_id;
        $aact_accoun->account_status = $request->account_status;
        $aact_accoun->update();

        Session::flash('warning', 'Berhasil Mengubah Akun!');
        return redirect()->route('aact_account.index');
    }
    public function delete($id)
    {
        $aact_account = AactAccount::find($id);
        $aact_account->delete();

        Session::flash('danger', 'Berhasil Menghapus Akun!');
        return redirect()->route('aact_account.index');
    }
}
