<?php

namespace App\Http\Controllers;
use App\Models\CoreBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoreBranchController extends Controller
{
    public function index()
    {
        $core_branch = CoreBranch::all();
        return view('content.CoreBranch.index', compact('core_branch'));
    }
    public function create()
    {
        return view('content.CoreBranch.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'branch_code' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'branch_address' => 'required|string|max:255',
            'branch_city' => 'required|string|max:255',
            'branch_contact_person' => 'required|string|max:255',
            'branch_email' => 'required|string|max:255',
            'branch_phone1' => 'required|string|max:255',
            'branch_phone2' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();
            CoreBranch::create([
                'branch_code' => $request->input('branch_code'),
                'branch_name' => $request->input('branch_name'),
                'branch_address' => $request->input('branch_address'),
                'branch_city' => $request->input('branch_city'),
                'branch_contact_person' => $request->input('branch_contact_person'),
                'branch_email' => $request->input('branch_email'),
                'branch_phone1' => $request->input('branch_phone1'),
                'branch_phone2' => $request->input('branch_phone2'),
            ]);
            DB::commit();
            return redirect()->route('core_branch.index')->success( 'Data Cabang berhasil ditambahkan!');
        }catch (\Exception $e){
            DB::rollBack();
            report($e);
            return redirect()->route('core_branch.index')->danger('Data Cabang gagal diperbarui!');
        }
    }
    public function update($id)
    {
        $core_branch = CoreBranch::find($id);
        return view('content.CoreBranch.edit', compact('core_branch'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $request->validate([
            'branch_code' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'branch_address' => 'required|string|max:255',
            'branch_city' => 'required|string|max:255',
            'branch_contact_person' => 'required|string|max:255',
            'branch_email' => 'required|string|max:255',
            'branch_phone1' => 'required|string|max:255',
            'branch_phone2' => 'required|string|max:255',
        ]);

        $core_branch = CoreBranch::findOrFail($id);

    $core_branch->branch_code = $request->input('branch_code');
    $core_branch->branch_name = $request->input('branch_name');
    $core_branch->branch_address = $request->input('branch_address');
    $core_branch->branch_city = $request->input('branch_city');
    $core_branch->branch_contact_person = $request->input('branch_contact_person');
    $core_branch->branch_email = $request->input('branch_email');
    $core_branch->branch_phone1 = $request->input('branch_phone1');
    $core_branch->branch_phone2 = $request->input('branch_phone2');


    $core_branch->save();

    return redirect()->route('core_branch.index')->warning('Data Cabang diperbarui!');
    }
    public function delete($id)
    {
        $core_branch = CoreBranch::find($id);
        $core_branch->delete();

        return redirect()->route('core_branch.index')->danger('Data Cabang dihapus!');
    }
}
