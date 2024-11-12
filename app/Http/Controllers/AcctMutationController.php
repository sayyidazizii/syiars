<?php

namespace App\Http\Controllers;

use App\Models\AcctMutation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AcctMutationController extends Controller
{
    public function index()
    {
        $acct_mutation = AcctMutation::all();
        return view('content.AcctMutation.index', compact('acct_mutation'));
    }

    public function create()
    {
        return view('content.AcctMutation.add');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'mutation_code' => 'required|string',
            'mutation_name' => 'required|string',
            'mutation_function' => 'required|string',
            'mutation_status' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            AcctMutation::create([
                'mutation_code' => $request->input('mutation_code'),
                'mutation_name' => $request->input('mutation_name'),
                'mutation_function' => $request->input('mutation_function'),
                'mutation_status' => $request->input('mutation_status'),
            ]);
            DB::commit();
            return redirect()->route('acct_mutation.index')->with('success', 'Mutasi berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('acct_mutation.index')->with('danger', 'Mutasi gagal ditambahkan!');
        }
    }

    public function update($id)
    {
        $acct_mutation = AcctMutation::find($id);
        return view('content.AcctMutation.edit', compact('acct_mutation'));
    }

    public function prosesupdate(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'mutation_code' => 'required|string',
            'mutation_name' => 'required|string',
            'mutation_function' => 'required|string',
            'mutation_status' => 'required|string',
        ]);
    
        try {
            DB::beginTransaction();
            $acct_mutation = AcctMutation::find($id);
            $acct_mutation->update([
                'mutation_code' => $request->input('mutation_code'),
                'mutation_name' => $request->input('mutation_name'),
                'mutation_function' => $request->input('mutation_function'),
                'mutation_status' => $request->input('mutation_status'),
            ]);
            DB::commit();
            return redirect()->route('acct_mutation.index')->with('warning', 'Mutasi berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('acct_mutation.index')->with('danger', 'Mutasi gagal diperbarui!');
        }
    }
    
    public function delete($id)
    {
        $mutation = AcctMutation::findOrFail($id);
        $mutation->delete();
    
        return redirect()->route('acct_mutation.index')->with('success', 'Mutasi berhasil dihapus');
    }
}    