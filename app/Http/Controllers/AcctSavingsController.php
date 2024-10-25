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
        $acct_savings = AcctSavings::get();
        return view('content.AcctSavings.index', compact('acct_savings'));
    }

    public function create()
    {
        $acct_acount = AcctAccount::get(); 
        return view('content.AcctSavings.add', compact('acct_acount'));
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'savings_code' => 'nullable|string|max:255',
    //         'savings_name' => 'nullable|string|max:255',
    //         'account_id' => 'required|integer',
    //         'account_basil_id' => 'required|integer',
    //         'savings_number' => 'nullable|string',
    //         'savings_last_balance' => 'required|numeric',
    //         'savings_profit_sharing' => 'required|numeric',
    //         'savings_nisbah' => 'nullable|numeric',
    //         'savings_basil' => 'nullable|numeric',
    //         'savings_status' => 'nullable|integer',
    //         'branch_id' => 'nullable|integer',
    //     ]);

    //     AcctSavings::create($validatedData);

    //     return redirect()->route('AcctSavings.index')->with('success', 'Savings account created successfully!');
    // }

    public function store(Request $request){
        // Tambahkan validasi di sini
        $request->validate([
            'savings_code' => 'required',
            'savings_name' => 'required',
            'account_basil_id' => 'required', // Validasi agar tidak null
            'savings_number' => 'required|numeric', // Tambahkan validasi lainnya
            'savings_profit_sharing' => 'required|numeric',
            'savings_nisbah' => 'required|numeric',
            'savings_basil' => 'required|numeric',
            'savings_status' => 'required',
        ]);

        $acct_savings = new AcctSavings();
        $acct_savings->savings_code = $request->input('savings_code');
        $acct_savings->savings_name = $request->input('savings_name');
        $acct_savings->account_basil_id = $request->input('account_basil_id'); // Ini harus ada
        $acct_savings->savings_number = $request->input('savings_number');
        $acct_savings->savings_profit_sharing = $request->input('savings_profit_sharing');
        $acct_savings->savings_nisbah = $request->input('savings_nisbah');
        $acct_savings->savings_basil = $request->input('savings_basil');
        $acct_savings->savings_status = $request->input('savings_status');
        $acct_savings->save();


        return redirect()->route('AcctSavings.index')->with('success', 'Savings account created successfully!');
    }

    public function update($id)
    {
        $acct_savings = AcctSavings::find($id);
        return view('content.AcctSavings.edit', compact('acct_savings'));
    }

    // Method untuk memproses update data
    public function prosesupdate(Request $request, $id)
    {
        $acct_savings = AcctSavings::find($id);
        $acct_savings->savings_code = $request->savings_code;
        $acct_savings->savings_name = $request->savings_name;
        $acct_savings->savings_number = $request->savings_number;
        $acct_savings->savings_profit_sharing = $request->savings_profit_sharing;
        $acct_savings->account_basil_id = $request->account_basil_id;
        $acct_savings->savings_nisbah = $request->savings_nisbah;
        $acct_savings->savings_basil = $request->savings_basil;
        $acct_savings->update();

        Session::flash('warning', 'Berhasil Mengubah Kode Simpanan!');
        return redirect()->route('AcctSavings.index');
    }

    // Method untuk menghapus data
    public function delete($id)
    {
        $acct_savings = AcctSavings::find($id);
        $acct_savings->delete();

        Session::flash('success', 'Berhasil Menghapus Data Kode Simpanan!');
        return redirect()->route('AcctSavings.index');
    }
}