<?php

namespace App\Http\Controllers;
use App\Models\CoreBranch;
use App\Models\CoreCity;
use App\Models\CoreDusun;
use App\Models\CoreMember;
use App\Models\CoreProvince;
use Illuminate\Http\Request;
use App\Models\CoreKecamatan;
use App\Models\CoreKelurahan;
use App\Helpers\Configuration;
use Illuminate\Support\Facades\DB;
class CoreMemberController extends Controller
{
    public function index()
    {
        $core_member = CoreMember::all();
        $memberstatus = Configuration::MemberStatus();
        $membercharacter = Configuration::MemberCharacter();
        return view('content.CoreMember.index', compact('core_member', 'memberstatus', 'membercharacter'));
    }
    public function create()
    {
        $lastMember = CoreMember::orderBy('member_no', 'desc')->first();
        $newMemberNo = $lastMember ? $lastMember->member_no + 1 : 1;
        $newMemberNo = str_pad($newMemberNo, 3, '0', STR_PAD_LEFT);
        $core_province = CoreProvince::all();
        $core_city = CoreCity::all();
        $core_kecamatan = CoreKecamatan::all();
        $core_kelurahan = CoreKelurahan::all();
        $core_dusun = CoreDusun::all();
        $membergender = Configuration::MemberGender();
        $membercharacter = Configuration::MemberCharacter();
        $memberidentity = Configuration::Member();
        return view('content.CoreMember.add', compact('newMemberNo','core_province', 'core_city', 'core_kecamatan', 'core_kelurahan', 'core_dusun','membergender', 'membercharacter', 'memberidentity'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'member_no' => 'required|string|max:50',
            'member_name' => 'required|string|max:100',
            'member_gender' => 'required|numeric',
            'province_id' => 'required|integer',
            'city_id' => 'required|integer',
            'kecamatan_id' => 'required|integer',
            'kelurahan_id' => 'required|integer',
            'dusun_id' => 'required|integer',
            'member_place_of_birth' => 'required|string|max:100',
            'member_date_of_birth' => 'required|date',
            'member_address' => 'required|string',
            'member_postal_code' => 'required|string|max:10',
            'member_phone' => 'required|string|max:20',
            'member_character' => 'required|numeric',
            'member_job' => 'required|string|max:100',
            'member_identity' => 'required|numeric',
            'member_identity_no' => 'required|string|max:50',
            'member_mother' => 'required|string|max:50',
        ]);
        try {
            DB::beginTransaction();
            CoreMember::create([
                'member_no' => $request->input('member_no'),
                'member_name' => $request->input('member_name'),
                'member_gender' => $request->input('member_gender'),
                'province_id' => $request->input('province_id'),
                'city_id' => $request->input('city_id'),
                'kecamatan_id' => $request->input('kecamatan_id'),
                'kelurahan_id' => $request->input('kelurahan_id'),
                'dusun_id' => $request->input('dusun_id'),
                'member_place_of_birth' => $request->input('member_place_of_birth'),
                'member_date_of_birth' => $request->input('member_date_of_birth'),
                'member_address' => $request->input('member_address'),
                'member_postal_code' => $request->input('member_postal_code'),
                'member_phone' => $request->input('member_phone'),
                'member_character' => $request->input('member_character'),
                'member_job' => $request->input('member_job'),
                'member_identity' => $request->input('member_identity'),
                'member_identity_no' => $request->input('member_identity_no'),
                'member_mother' => $request->input('member_mother'),
            ]);
            DB::commit();
            return redirect()->route('core_member.index')->success('Data Anggota berhasil ditambahkan!');
        }catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('core_member.index')->danger('Data Anggota gagal ditambahkan!');
        }
    }
    public function update($id)
    {
        $core_member = CoreMember::find($id);
        $core_province = CoreProvince::all();
        $core_city = CoreCity::all();
        $core_kecamatan = CoreKecamatan::all();
        $core_kelurahan = CoreKelurahan::all();
        $core_dusun = CoreDusun::all();
        $membergender = Configuration::MemberGender();
        $membercharacter = Configuration::MemberCharacter();
        $memberidentity = Configuration::Member();
        return view('content.CoreMember.edit', compact('core_member', 'core_province', 'core_city', 'core_kecamatan', 'core_kelurahan', 'core_dusun','membergender', 'membercharacter', 'memberidentity'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $request->validate([
            'member_name' => 'required|string|max:100',
            'member_address' => 'required|string',
            'member_phone' => 'required|string|max:20',
            'member_character' => 'required|numeric',
        ]);
        try {
            DB::beginTransaction();
            $core_member = CoreMember::findOrFail($id);
            $core_member->member_name = $request->input('member_name');
            $core_member->member_address = $request->input('member_address');
            $core_member->member_phone = $request->input('member_phone');
            $core_member->member_character = $request->input('member_character');
            $core_member->update();
            DB::commit();
            return redirect()->route('core_member.index')->warning('Data Anggota berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('core_member.index')->danger('Data Anggota gagal diperbarui!');
        }
    }
    public function delete($id)
    {
        $core_member = CoreMember::find($id);
        $core_member->delete();
        return redirect()->route('core_member.index')->danger('Data Anggota berhasil dihapus!');
    }
    public function index_update()
    {
        $core_member = CoreMember::all();
        $memberstatus = Configuration::MemberStatus();
        $membercharacter = Configuration::MemberCharacter();
        return view('content.CoreMember.index_update', compact('core_member', 'memberstatus', 'membercharacter'));
    }
    public function update_status(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $core_member = CoreMember::findOrFail($id);
            $core_member->member_status = 1;
            $core_member->update();
            DB::commit();
            return redirect()->route('core_member_status.index_update')->warning('Data Update Calon Anggota berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('core_member_status.index_update')->danger('Data Update Calon Anggota gagal diperbarui!');
        }
    }
    public function getMasterDataCoreMember()
    {
        $branches = CoreBranch::all(); 
        $core_member = CoreMember::all();
        $memberstatus = Configuration::MemberStatus(); // Pastikan metode ini ada
        $membercharacter = Configuration::MemberCharacter(); // Pastikan metode ini ada

        return view('content.CoreMember.getMasterDataCoreMember', compact('core_member', 'memberstatus', 'membercharacter', 'branches'));
    }
}
