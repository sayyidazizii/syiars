<?php

namespace App\Http\Controllers;
use App\Models\CoreBranch;
use App\Models\CoreOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CoreOfficeController extends Controller
{
    public function index()
    {
        $core_office = CoreOffice::all();
        return view('content.CoreOffice.index', compact('core_office'));
    }
    public function create()
    {
        $core_branch = CoreBranch::all();
        return view('content.CoreOffice.add', compact('core_branch'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'office_code' => 'required|string|max:20',
            'office_name' => 'required|string|max:50',
            'branch_id' => 'required|integer',
        ]);

        try {
            DB::beginTransaction();
            CoreOffice::create([
                'office_code' => $request->input('office_code'),
                'office_name' => $request->input('office_name'),
                'branch_id' => $request->input('branch_id'),
            ]);
            DB::commit();
            return redirect()->route('core_office.index')->success( 'Data Business Office berhasil ditambahkan!');
        }catch (\Exception $e){
            DB::rollBack();
            report($e);
            return redirect()->route('core_office.index')->danger('Data Business Office gagal diperbarui!');
        }
    }
    public function update($id)
    {
        $core_office = CoreOffice::find($id);
        $core_branch = CoreBranch::all();
        return view('content.CoreOffice.edit', compact('core_office', 'core_branch'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $request->validate([
            'office_code' => 'required|string|max:20',
            'office_name' => 'required|string|max:50',
            'branch_id' => 'required|integer',
        ]);

        $core_office = CoreOffice::findOrFail($id);

    // Update user data
    $core_office->office_code = $request->input('office_code');
    $core_office->office_name = $request->input('office_name');
    $core_office->branch_id = $request->input('branch_id');


    $core_office->save();

    // Redirect back to the user list with success message
    return redirect()->route('core_office.index')->warning('Data Business Office diperbarui!');
    }
    public function delete($id)
    {
        $core_office = CoreOffice::find($id);
        $core_office->delete();

        return redirect()->route('core_office.index')->danger('Data Business Office dihapus!');
    }
}
