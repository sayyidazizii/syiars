<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'data_state' => 'required|integer',
        ]);

        CoreProvince::create([
            'province_code' => $request->province_code,
            'province_name' => $request->province_name,
            'province_no' => $request->province_no,
            'data_state' => $request->data_state,
            'branch_id' => $request->branch_id ?? 1,
            'created_id' => auth()->id(),
            'uuid' => \Str::uuid(),
        ]);

        return redirect()->route('core_province.index')->with('success', 'Provinsi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit provinsi.
     */
    public function update($id)
    {
        $province = CoreProvince::findOrFail($id);
        return view('content.CoreProvince.edit', compact('province'));
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
        'data_state' => 'nullable|integer',
        // Tambahkan validasi lain sesuai kebutuhan
    ]);

    // Temukan provinsi berdasarkan ID
    $province = CoreProvince::findOrFail($id);

    // Update data provinsi
    $province->province_code = $request->input('province_code');
    $province->province_name = $request->input('province_name');
    $province->province_no = $request->input('province_no');
    $province->data_state = $request->input('data_state');
    // Update atribut lain sesuai kebutuhan

    // Simpan perubahan
    $province->save();

    // Redirect dengan pesan sukses
    return redirect()->route('core_province.index')->with('success', 'Provinsi berhasil diperbarui.');
}


    /**
     * Menghapus data provinsi.
     */
    public function delete($id)
{
    $province = CoreProvince::findOrFail($id);
    $province->delete(); // Menghapus provinsi
    
    return redirect()->route('core_province.index')->with('success', 'Provinsi berhasil dihapus.');
}

}
