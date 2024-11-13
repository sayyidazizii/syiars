<?php

namespace App\Http\Controllers;
use App\Models\AcctAccount;
use Illuminate\Http\Request;
use App\Models\AcctSavings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class AcctSavingsController extends Controller
{
    public function index()
    {
        $acct_savings = AcctSavings::with('account')->get();
        return view('content.AcctSavings.index', compact('acct_savings'));
    }
    public function create()
    {
        $acct_acount = AcctAccount::get();
        return view('content.AcctSavings.add', compact('acct_acount'));
    }
    public function store(Request $request){
        $request->validate([
            'savings_code' => 'required|string',
            'savings_name' => 'required|string',
            'account_id' => 'required|integer',
            'account_basil_id' => 'required|integer',
            'savings_nisbah' => 'required|numeric',
            'savings_basil' => 'required|numeric',
        ]);
        try {
            DB::beginTransaction();
            AcctSavings::create([
                'savings_code' => $request->input('savings_code'),
                'savings_name' => $request->input('savings_name'),
                'account_basil_id' => $request->input('account_basil_id'),
                'account_id' => $request->input('account_id'),
                'savings_profit_sharing' => $request->input('savings_profit_sharing'),
                'savings_nisbah' => $request->input('savings_nisbah'),
                'savings_basil' => $request->input('savings_basil'),
                'savings_status' => $request->input('savings_status'),
            ]);
            DB::commit();
            return redirect()->route('AcctSavings.index')->success('Kode Simpanan berhasil ditambahkan!');
        }catch (\Exception $e){
            DB::rollBack();
            report($e);
            return redirect()->route('AcctSavings.index')->warning('Kode Simpanan gagal ditambahkan!');
        }
    }
    public function update($id)
    {
        $acct_savings = AcctSavings::find($id);
        $acct_account = AcctAccount::all();
        return view('content.AcctSavings.edit', compact('acct_savings', 'acct_account'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $request->validate([
            'savings_code' => 'required|string',
            'savings_name' => 'required|string',
            'account_id' => 'required|integer',
            'account_basil_id' => 'required|integer',
            'savings_nisbah' => 'required|numeric',
            'savings_basil' => 'required|numeric',
        ]);
        try {
            DB::beginTransaction();

            $acct_savings = AcctSavings::find($id);
            $acct_savings->savings_code = $request->savings_code;
            $acct_savings->savings_name = $request->savings_name;
            $acct_savings->account_id = $request->account_id;
            $acct_savings->savings_profit_sharing = $request->savings_profit_sharing;
            $acct_savings->account_basil_id = $request->account_basil_id;
            $acct_savings->savings_nisbah = $request->savings_nisbah;
            $acct_savings->savings_basil = $request->savings_basil;
            $acct_savings->update();
            DB::commit();
            return redirect()->route('AcctSavings.index')->warning('Kode Simpanan berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('AcctSavings.index')->danger('Kode Simpanan gagal diperbarui!');
        }
    }
    public function delete($id)
    {
        $acct_savings = AcctSavings::find($id);
        $acct_savings->delete();
        return redirect()->route('AcctSavings.index')->danger('Kode Simpanan berhasil dihapus!');
    }
}
