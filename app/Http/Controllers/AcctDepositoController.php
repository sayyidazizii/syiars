<?php

namespace App\Http\Controllers;

use App\Models\AcctAccount;
use App\Models\AcctDeposito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcctDepositoController extends Controller
{
    //
    public function index(){
        $acct_depositos         = AcctDeposito::with('account')->get();
        return view('content.AcctDeposito.index',compact('acct_depositos'));
    }
    public function create()
    {
        $acct_acount = AcctAccount::get();
        return view('content.AcctDeposito.add',compact('acct_acount'));
      

    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'deposito_code' => 'required|string|max:20',
            'deposito_name' => 'required|string|max:50',
            'deposito_number' => 'required|integer', // sesuaikan tipe datanya
            'account_id' => 'required|integer', // sesuaikan tipe datanya
            'account_basil_id' => 'required|integer', // sesuaikan tipe datanya
            'deposito_period' => 'required|integer', // sesuaikan tipe datanya
            'deposito_profit_sharing' => 'required|integer', // sesuaikan tipe datanya
        ]);
    
        try {
            DB::beginTransaction();
            AcctDeposito::create([
                'account_basil_id' => $request->input('account_basil_id'),
                'deposito_code' => $request->input('deposito_code'),
                'deposito_name' => $request->input('deposito_name'),
                'deposito_number' => $request->input('deposito_number'),
                'account_id' => $request->input('account_id'),
                'deposito_period' => $request->input('deposito_period'),
                'deposito_profit_sharing' => $request->input('deposito_profit_sharing'),
            ]);
            DB::commit();
            return redirect()->route('AcctDeposito.index')->success( 'kode simpanan berjangka berhasil ditambahkan!');
        }catch (\Exception $e){
            DB::rollBack();
            report($e);
            return redirect()->route('AcctDeposito.index')->success('Data simpanan berjangka gagal diperbarui!');
        }
    }
    public function update($id)
    {
        $acct_deposito = AcctDeposito::find($id);
        return view('content.AcctDeposito.edit', compact('acct_deposito'));
    }

    public function prosesupdate(Request $request, $id)
    {
    // Validate the incoming data
    $request->validate([
       
        'deposito_code' => 'required|string|max:255',
        'deposito_name' => 'required|string|max:255',
        'deposito_number' => 'required|string|max:255',
        'deposito_period' => 'required|string|max:255',
        'deposito_profit_sharing' => 'required|string|max:255',
    ]);

    // Find the user by ID
    $acct_deposito = AcctDeposito::findOrFail($id);

    // Update user data
    $acct_deposito->account_basil_id = $request->input('account_basil_id');
    $acct_deposito->deposito_code = $request->input('deposito_code');
    $acct_deposito->deposito_name = $request->input('deposito_name');
    $acct_deposito->deposito_number = $request->input('deposito_number');
    $acct_deposito->deposito_period = $request->input('deposito_period');
    $acct_deposito->deposito_profit_sharing = $request->input('deposito_profit_sharing');
    
    $acct_deposito->save();

    // Redirect back to the user list with success message
    return redirect()->route('AcctDeposito.index')->success('Data simpanan berjangka diperbarui!');
    }

    public function delete($id)
    {
        // Find the user by ID
        $acct_deposito = AcctDeposito::findOrFail($id);
    
        // Delete the user
        $acct_deposito->delete();
    
        // Redirect back to the user list with a success message
        return redirect()->route('AcctDeposito.index')->success('Data simpanan berjangka berhasil dihapus!');
    }
    

}

