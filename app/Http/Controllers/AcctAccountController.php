<?php

namespace App\Http\Controllers;
use App\Helpers\Configuration;
use App\Models\AcctAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AcctAccountController extends Controller
{
    public function index()
    {
        $acct_account = AcctAccount::all();
        $kelompokperkiraan = Configuration::KelompokPerkiraan();
        $accountstatus = Configuration::AccountStatus();
        return view('content.AcctAccount.index', compact('acct_account', 'kelompokperkiraan','accountstatus'));
    }
    public function create()
    {
        $kelompokperkiraan = Configuration::KelompokPerkiraan();
        $accountstatus = Configuration::AccountStatus();
        return view('content.AcctAccount.add', compact('kelompokperkiraan','accountstatus'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'account_code' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'account_group' => 'required|string|max:255',
            'account_type_id' => 'required|integer',
            'account_status' => 'required|numeric',
        ]);
        try {
            DB::beginTransaction();
            AcctAccount::create([
                'account_code' => $request->input('account_code'),
                'account_name' => $request->input('account_name'),
                'account_group' => $request->input('account_group'),
                'account_type_id' => $request->input('account_type_id'),
                'account_status' => $request->input('account_status'),
            ]);
            DB::commit();
            return redirect()->route('acct_account.index')->success( 'Data Nomor Perkiraan berhasil ditambahkan!');
        }catch (\Exception $e){
            DB::rollBack();
            report($e);
            return redirect()->route('acct_account.index')->danger('Data Nomor Perkiraan gagal ditambahkan!');
        }
    }
    public function update($id)
    {
        $acct_account = AcctAccount::find($id);
        $kelompokperkiraan = Configuration::KelompokPerkiraan();
        $accountstatus = Configuration::AccountStatus();
        return view('content.AcctAccount.edit', compact('acct_account', 'kelompokperkiraan','accountstatus'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $request->validate([
            'account_code' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'account_group' => 'required|string|max:255',
            'account_type_id' => 'required|integer',
            'account_status' => 'required|numeric',
        ]);
        $acct_account = AcctAccount::findOrFail($id);
        $acct_account->account_code = $request->input('account_code');
        $acct_account->account_name = $request->input('account_name');
        $acct_account->account_group = $request->input('account_group');
        $acct_account->account_type_id = $request->input('account_type_id');
        $acct_account->account_status = $request->input('account_status');
        $acct_account->save();
        return redirect()->route('acct_account.index')->warning('Data Nomor Perkiraan berhasil diperbarui!');
    }
    public function delete($id)
    {
        $acct_account = AcctAccount::find($id);
        $acct_account->delete();
        return redirect()->route('acct_account.index')->danger('Data Nomor Perkiraan berhasil dihapus!');
    }
}
