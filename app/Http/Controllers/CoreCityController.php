<?php

namespace App\Http\Controllers;

use App\Models\CoreCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoreCityController extends Controller
{
    //
    public function index(){
        $core_citys         = CoreCity::get();
        return view('content.CoreCity.index',compact('core_citys'));
    }

    public function create()
    {
        
        return view('content.CoreCity.add');
    }
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'city_code' => 'required|string|max:4',
            'province_code' => 'required|string|max:2',
            'city_name' => 'required|string|max:255',
            'province_no' => 'nullable|string|max:20',
            'city_no' => 'nullable|string|max:20',
        ]);
    
        try {
            DB::beginTransaction();
            CoreCity::create([
                'city_code' => $request->input('city_code'),
                'province_code' => $request->input('province_code'),
                'city_name' => $request->input('city_name'),
                'province_no' => $request->input('province_no'),
                'city_no' => $request->input('city_no'),
            ]);
            DB::commit();
            return redirect()->route('CoreCity.index')->success( 'Data core city berhasil ditambahkan!');
        }catch (\Exception $e){
            DB::rollBack();
            report($e);
            return redirect()->route('CoreCity.index')->success('Data core city gagal diperbarui!');
        }
    }
    public function update($id)
    {
        $core_city = CoreCity::find($id);
        return view('content.CoreCity.edit', compact('core_city'));
    }

    public function prosesupdate(Request $request, $id){

        $request->validate([
       
            'city_code' => 'required|string|max:4',
            'province_code' => 'required|string|max:2',
            'city_name' => 'required|string|max:255',
            'province_no' => 'nullable|string|max:20',
            'city_no' => 'nullable|string|max:20',
        ]);

        $core_city = CoreCity::findOrFail($id);

    // Update user data
    $core_city->city_code = $request->input('city_code');
    $core_city->province_code = $request->input('province_code');
    $core_city->city_name = $request->input('city_name');
    $core_city->province_no = $request->input('province_no');
    $core_city->city_no = $request->input('city_no');
    
    $core_city->save();

    // Redirect back to the user list with success message
    return redirect()->route('CoreCity.index')->success('Data core city diperbarui!');
    }

    public function delete($id)
    {
        // Find the user by ID
        $core_city = CoreCity::findOrFail($id);
    
        // Delete the user
        $core_city->delete();
    
        // Redirect back to the user list with a success message
        return redirect()->route('CoreCity.index')->success('Data core city berhasil dihapus!');
    }
}

