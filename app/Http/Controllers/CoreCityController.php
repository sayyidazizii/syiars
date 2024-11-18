<?php

namespace App\Http\Controllers;
use App\Models\CoreCity;
use App\Models\CoreProvince;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CoreCityController extends Controller
{
    public function index()
    {
        $core_city       = CoreCity::all();
        return view('content.CoreCity.index',compact('core_city'));
    }
    public function create()
    {
        $core_province = CoreProvince::all();
        return view('content.CoreCity.add',compact('core_province'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'city_code' => 'required|string|max:4',
            'city_name' => 'required|string|max:255',
            'city_no' => 'nullable|string|max:20',
            'province_id' => 'required|integer',
        ]);
        try {
            DB::beginTransaction();
            CoreCity::create([
                'city_code' => $request->input('city_code'),
                'city_name' => $request->input('city_name'),
                'city_no' => $request->input('city_no'),
                'province_id' => $request->input('province_id'),
            ]);
            DB::commit();
            return redirect()->route('CoreCity.index')->success('Data Kota berhasil ditambahkan!');
        }catch (\Exception $e){
            DB::rollBack();
            report($e);
            return redirect()->route('CoreCity.index')->danger('Data Kota gagal ditambahkan!');

        }
    }
    public function update($id)
    {
        $core_city = CoreCity::find($id);
        $core_province = CoreProvince::all();
        return view('content.CoreCity.edit', compact('core_city', 'core_province'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $request->validate([
            'city_code' => 'required|string|max:4',
            'city_name' => 'required|string|max:255',
            'city_no' => 'nullable|string|max:20',
            'province_id' => 'required|integer',
        ]);
        try {
            DB::beginTransaction();
            $core_city = CoreCity::findOrFail($id);
            $core_city->city_code = $request->input('city_code');
            $core_city->city_name = $request->input('city_name');
            $core_city->city_no = $request->input('city_no');
            $core_city->province_id = $request->input('province_id');
            $core_city->update();
            DB::commit();
            return redirect()->route('CoreCity.index')->warning('Data Kota berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('CoreCity.index')->danger('Data Kota gagal diperbarui!');
        }
    }
    public function delete($id)
    {
        $core_city = CoreCity::findOrFail($id);
        $core_city->delete();
        return redirect()->route('CoreCity.index')->danger('Data Kota berhasil dihapus!');
    }
}

