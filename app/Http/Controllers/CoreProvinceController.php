<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
            'data_state' => 0, // Set default value to 0
            'branch_id' => $request->branch_id ?? 1,
            'created_id' => auth()->id(),
            'uuid' => \Str::uuid(),
        ]);
        DB::commit();

        return redirect()->route('core_province.index')->with('success', 'Provinsi berhasil ditambahkan.');
    } catch (\Exception $e) {
        DB::rollBack();
        report($e);
        return redirect()->route('core_province.index')->with('danger', 'Data provinsi gagal ditambahkan!');
    }
}


    /**
     * Menampilkan form untuk mengedit provinsi.
     */
    public function update($id)
    {
        $core_province = CoreProvince::findOrFail($id);
        return view('content.CoreProvince.edit', compact('core_province'));
    }

    /**
     * Memperbarui data provinsi.
     */
    public function prosesupdate(Request $request, $id)
    {
    // Validasi input
    $request->validate([
        'province_code' => 'required|string|max:2',
        'province_name' => 'required|string|max:255',
        'province_no' => 'nullable|string|max:20',
        'data_state' => 'nullable|integer', // Aturan validasi yang tepat
    ]);

    $province = CoreProvince::findOrFail($id);

    // Isi field data
    $province->province_code = $request->input('province_code');
    $province->province_name = $request->input('province_name');
    $province->province_no = $request->input('province_no');
    $province->data_state = $request->input('data_state', 0); // Default ke 0 jika null

    $province->save();

    Session::flash('success', 'Provinsi berhasil diperbarui.');
    return redirect()->route('core_province.index');

    }


    /**
     * Menghapus data provinsi.
     */
    public function delete($id)
    {
        $province = CoreProvince::findOrFail($id);
        $province->delete(); // Menghapus provinsi
        
        Session::flash('success', 'Provinsi berhasil dihapus.');
        return redirect()->route('core_province.index');
    }
}
