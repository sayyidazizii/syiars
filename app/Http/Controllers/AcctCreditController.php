<?php

namespace App\Http\Controllers;
use App\Models\AcctAccount;
use App\Models\AcctCredit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $request->validate([
            'credits_code' => 'required|string|max:255',
            'credits_name' => 'required|string|max:255',
            'account_id' => 'required|integer',
        ]);
        try {
            DB::beginTransaction();
            AcctCredit::create([
                'credits_code' => $request->input('credits_code'),
                'credits_name' => $request->input('credits_name'),
                'account_id' => $request->input('account_id'),
            ]);
            DB::commit();
            return redirect()->route('acct_credit.index')->success('Data Kode Pembiayaan berhasil ditambahkan!');
        }catch (\Exception $e){
            DB::rollBack();
            report($e);
            return redirect()->route('acct_credit.index')->danger('Data Kode Pembiayaan gagal ditambahkan!');
        }
    }
        public function update($id)
    {
        $acct_credits = AcctCredit::find($id);
        $acct_account = AcctAccount::all();
        return view('content.AcctCredit.edit', compact('acct_credits','acct_account'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $request->validate([
            'credits_code' => 'required|string|max:255',
            'credits_name' => 'required|string|max:255',
            'account_id' => 'required|integer',
        ]);
        try {
            DB::beginTransaction();
            $acct_credits = AcctCredit::findOrFail($id);
            $acct_credits->credits_code = $request->input('credits_code');
            $acct_credits->credits_name = $request->input('credits_name');
            $acct_credits->account_id = $request->input('account_id');
            $acct_credits->update();
            DB::commit();
            return redirect()->route('acct_credit.index')->warning('Data Kode Pembiayaan berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('acct_credit.index')->danger('Data Kode Pembiayaan gagal diperbarui!');
        }
    }
    public function delete($id)
    {
        $acct_credits = AcctCredit::find($id);
        $acct_credits->delete();
        return redirect()->route('acct_credit.index')->danger('Data Kode Pembiayaan berhasil dihapus!');
    }
}
