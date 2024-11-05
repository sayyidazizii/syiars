@extends('adminlte::page')

@section('title', 'Edit Data Anggota | AdminLTE')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Form Edit Anggota</h1>
        <a href="{{ route('core_member.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-header bg-success text-white">
            Form Edit Anggota
        </div>
        <div class="card-body">
            <form action="{{ route('core_member.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Anggota *</label>
                            <input type="text" name="member_name" id="member_name" class="form-control" value="{{ old('member_name', $member->member_name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin *</label>
                            <select name="member_gender" id="member_gender" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <option value="Laki-Laki" {{ old('member_gender', $member->member_gender) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('member_gender', $member->member_gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi *</label>
                            <select name="province_id" id="province_id" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for province_id should be populated dynamically -->
                                <option value="province_id 1" {{ old('province_id', $member->province_id) == 'province_id 1' ? 'selected' : '' }}>province_id 1</option>
                                <option value="province_id 2" {{ old('province_id', $member->province_id) == 'province_id 2' ? 'selected' : '' }}>province_id 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten *</label>
                            <select name="city_id" id="city_id" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for city_id should be populated dynamically -->
                                <option value="city_id 1" {{ old('city_id', $member->city_id) == 'city_id 1' ? 'selected' : '' }}>city_id 1</option>
                                <option value="city_id 2" {{ old('city_id', $member->city_id) == 'city_id 2' ? 'selected' : '' }}>Kabupaten 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan *</label>
                            <select name="kecamatan_id" id="kecamatan_id" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for kecamatan_id should be populated dynamically -->
                                <option value="kecamatan_id 1" {{ old('kecamatan_id', $member->kecamatan_id) == 'kecamatan_id 1' ? 'selected' : '' }}>kecamatan_id 1</option>
                                <option value="kecamatan_id 2" {{ old('kecamatan_id', $member->kecamatan_id) == 'kecamatan_id 2' ? 'selected' : '' }}>Kecamatan 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan *</label>
                            <select name="kelurahan_id" id="kelurahan_id" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for kelurahan_id should be populated dynamically -->
                                <option value="kelurahan_id 1" {{ old('kelurahan_id', $member->kelurahan_id) == 'kelurahan_id 1' ? 'selected' : '' }}>kelurahan_id 1</option>
                                <option value="kelurahan_id 2" {{ old('kelurahan_id', $member->kelurahan_id) == 'kelurahan_id 2' ? 'selected' : '' }}>Kelurahan 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dusun">Dusun *</label>
                            <input type="text" name="dusun_id" id="dusun_id" class="form-control" value="{{ old('dusun_id', $member->dusun_id) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir *</label>
                            <input type="text" name="member_place_of_birth" id="member_place_of_birth" class="form-control" value="{{ old('member_place_of_birth', $member->member_place_of_birth) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir *</label>
                            <input type="date" name="member_date_of_birth" id="member_date_of_birth" class="form-control" value="{{ old('member_date_of_birth', $member->member_date_of_birth) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat *</label>
                            <textarea name="member_address" id="member_address" class="form-control" required>{{ old('member_address', $member->member_address) }}</textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" name="member_postal_code" id="member_postal_code" class="form-control" value="{{ old('member_postal_code', $member->member_postal_code) }}">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telp *</label>
                            <input type="text" name="member_phone" id="member_phone" class="form-control" value="{{ old('member_phone', $member->member_phone) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="member_character">Sifat Anggota *</label>
                            <select name="member_character" id="member_character" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <option value="Sifat 1" {{ old('member_character', $member->member_character) == 'Sifat 1' ? 'selected' : '' }}>Sifat 1</option>
                                <option value="Sifat 2" {{ old('member_character', $member->member_character) == 'Sifat 2' ? 'selected' : '' }}>Sifat 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="member_job" id="member_job" class="form-control" value="{{ old('member_job', $member->member_job) }}">
                        </div>
                        <div class="form-group">
                            <label for="member_identity">Identitas</label>
                            <select name="member_identity" id="member_identity" class="form-control">
                                <option value="">--- Pilih Salah Satu ---</option>
                                <option value="KTP" {{ old('member_identity', $member->member_identity) == 'KTP' ? 'selected' : '' }}>KTP</option>
                                <option value="SIM" {{ old('member_identity', $member->member_identity) == 'SIM' ? 'selected' : '' }}>SIM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="member_identity_no">Nomor Identitas</label>
                            <input type="text" name="member_identity_no" id="member_identity_no" class="form-control" value="{{ old('member_identity_no', $member->member_identity_no) }}">
                        </div>
                        <div class="form-group">
                            <label for="member_mother">Nama Ibu Kandung</label>
                            <input type="text" name="member_mother" id="member_mother" class="form-control" value="{{ old('nama_ibu_kandung', $member->member_mother) }}">
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('core_member.index') }}" class="btn btn-danger mr-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin.custom.css">
@stop

@section('js')
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('[class*="alert"]').each(function () {
                $(this).alert('close');
            });
        }, 5000);
    });

    $(document).on('DOMNodeInserted', '[class*="alert"]', function () {
        setTimeout(function () {
            $(this).alert('close');
        }.bind(this), 5000);
    });
</script>
@stop
