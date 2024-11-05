<?php

namespace App\Http\Controllers;


use App\Models\CoreCity;
use App\Models\CoreDusun;
use App\Models\CoreMember;
use App\Models\CoreProvince;
use Illuminate\Http\Request;
use App\Helpers\Configuration;
use Illuminate\Support\Facades\DB;
use App\Models\CoreKelurahan;

class CoreMemberController extends Controller
{
    public function index()
    {
        $core_dusun = CoreDusun::all();
        $core_city = CoreCity::all();
        $core_province = CoreProvince::all();
        $core_kelurahan = CoreKelurahan::all();
        $core_kecamatan = CoreKecamatan::all();
        $core_member = CoreMember::all();
        return view('content.CoreMember.index', compact('core_member', 'core_kecamatan', 'core_kelurahan', 'core_province', 'core_city', 'core_dusun'));
    }
    public function create()
    {
        $core_dusun = CoreDusun::all();
        $core_city = CoreCity::all();
        $core_province = CoreProvince::all();
        $core_kelurahan = CoreKelurahan::all();
        $core_kecamatan = CoreKecamatan::all();
        return view('content.CoreMember.add', compact('core_kecamatan', 'core_kelurahan', 'core_province', 'core_city', 'core_dusun'));
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
