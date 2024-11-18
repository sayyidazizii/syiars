<?php

namespace App\Http\Controllers;
use App\Models\CoreCity;
use App\Models\CoreKecamatan;
use App\Models\CoreKelurahan;
use App\Models\CoreDusun;
class LocationController extends Controller
{
    public function getCities($provinceId) {
        $core_city = CoreCity::where('province_id', $provinceId)->get();
        return response()->json($core_city);
    }
    public function getKecamatans($cityId) {
        $core_kecamatan = CoreKecamatan::where('city_id', $cityId)->get();
        return response()->json($core_kecamatan);
    }
    public function getKelurahans($kecamatanId) {
        $core_kelurahan = CoreKelurahan::where('kecamatan_id', $kecamatanId)->get();
        return response()->json($core_kelurahan);
    }
    public function getDusuns($kelurahanId) {
        $core_dusun = CoreDusun::where('kelurahan_id', $kelurahanId)->get();
        return response()->json($core_dusun);
    }
}
