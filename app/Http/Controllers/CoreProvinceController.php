<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CoreProvince;
class CoreProvinceController extends Controller
{
    public function index()
    {
        $core_province = CoreProvince::all();
        return view('content.CoreProvince.index', compact('core_province'));
    }
    public function create()
    {
        return view('content.CoreProvince.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'province_code' => 'required|max:2',
            'province_name' => 'required|max:255',
            'province_no' => 'max:20',
        ]);
        try {
            DB::beginTransaction();
            CoreProvince::create([
                'province_code' => $request->province_code,
                'province_name' => $request->province_name,
                'province_no' => $request->province_no,
            ]);
            DB::commit();
            return redirect()->route('core_province.index')->success('Data Provinsi berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('core_province.index')->danger('Data Provinsi gagal ditambahkan!');
        }
    }
    public function update($id)
    {
        $core_province = CoreProvince::findOrFail($id);
        return view('content.CoreProvince.edit', compact('core_province'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $request->validate([
            'province_code' => 'required|string|max:2',
            'province_name' => 'required|string|max:255',
            'province_no' => 'nullable|string|max:20',
            'data_state' => 'nullable|integer',
        ]);
        try {
            DB::beginTransaction();
            $province = CoreProvince::findOrFail($id);
            $province->province_code = $request->input('province_code');
            $province->province_name = $request->input('province_name');
            $province->province_no = $request->input('province_no');
            $province->data_state = $request->input('data_state', 0);
            $province->update();
            DB::commit();
            return redirect()->route('core_province.index')->warning('Data Provinsi berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('core_province.index')->danger('Data Provinsi gagal diperbarui!');
        }
    }
    public function delete($id)
    {
        $province = CoreProvince::findOrFail($id);
        $province->delete();
        return redirect()->route('core_province.index')->danger('Data Provinsi berhasil dihapus!');
    }
}
