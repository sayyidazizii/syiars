<?php

namespace App\Http\Controllers;

use App\Models\CoreMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoreMemberController extends Controller
{
    public function index()
    {
        $core_member = CoreMember::all();
        return view('content.CoreMember.index', compact('core_member'));
    }
    public function create()
    {
        return view('content.CoreMember.add');
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
            CoreMember::create([
                'office_code' => $request->input('office_code'),
                'office_name' => $request->input('office_name'),
                'branch_id' => $request->input('branch_id'),
            ]);
            DB::commit();
            return redirect()->route('core_member.index')->success( 'Data Business Office berhasil ditambahkan!');
        }catch (\Exception $e){
            DB::rollBack();
            report($e);
            return redirect()->route('core_member.index')->danger('Data Business Office gagal diperbarui!');
        }
    }
    public function update($id)
    {
        $core_member = CoreMember::find($id);
        return view('content.CoreMember.edit', compact('core_member'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $request->validate([
            'office_code' => 'required|string|max:20',
            'office_name' => 'required|string|max:50',
            'branch_id' => 'required|integer',
        ]);

        $core_member = CoreMember::findOrFail($id);

    $core_member->office_code = $request->input('office_code');
    $core_member->office_name = $request->input('office_name');
    $core_member->branch_id = $request->input('branch_id');


    $core_member->save();

    return redirect()->route('core_member.index')->warning('Data Business Office diperbarui!');
    }
    public function delete($id)
    {
        $core_member = CoreMember::find($id);
        $core_member->delete();

        return redirect()->route('core_member.index')->danger('Data Business Office dihapus!');
    }
}
