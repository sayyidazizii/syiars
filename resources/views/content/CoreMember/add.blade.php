@extends('adminlte::page')

@section('title', 'Tambah Data Anggota | AdminLTE')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Form Tambah Anggota</h1>
            <a href="{{ route('core_member.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card">
            <div class="card-header bg-success text-white">
                Form Tambah Anggota
            </div>
            <div class="card-body">
                <form action="{{ route('core_member.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="member_no">No Anggota</label>
                                <input type="text" class="form-control" id="member_no" name="member_no"
                                    value="{{ $newMemberNo }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="member_name">Nama Anggota *</label>
                                <input type="text" name="member_name" id="member_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="member_gender">Jenis Kelamin *</label>
                                <select name="member_gender" id="member_gender" class="form-control" required>
                                    <option value="">--- Pilih Salah Satu ---</option>
                                    @foreach ($membergender as $key => $value)
                                        <option data-kt-flag="{{ $key }}" value="{{ $key }}"
                                            {{ $key === old('member_gender', '' ?? '') ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="province_id">Provinsi *</label>
                                <select name="province_id" id="province_id" class="form-control" required>
                                    <option value="">--- Pilih Salah Satu ---</option>
                                    @foreach ($core_province as $data)
                                        <option value="{{ $data->province_id }}">{{ $data->province_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city_id">Kabupaten *</label>
                                <select name="city_id" id="city_id" class="form-control" required>
                                    <option value="">--- Pilih Salah Satu ---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan_id">Kecamatan *</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control" required>
                                    <option value="">--- Pilih Salah Satu ---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelurahan_id">Kelurahan *</label>
                                <select name="kelurahan_id" id="kelurahan_id" class="form-control" required>
                                    <option value="">--- Pilih Salah Satu ---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dusun_id">Dusun *</label>
                                <select name="dusun_id" id="dusun_id" class="form-control" required>
                                    <option value="">--- Pilih Salah Satu ---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="member_place_of_birth">Tempat Lahir *</label>
                                <input type="text" name="member_place_of_birth" id="member_place_of_birth"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="member_date_of_birth">Tanggal Lahir *</label>
                                <input type="date" name="member_date_of_birth" id="member_date_of_birth"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="member_address">Alamat *</label>
                                <textarea name="member_address" id="member_address" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="member_postal_code">Kode Pos</label>
                                <input type="text" name="member_postal_code" id="member_postal_code" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="member_phone">Nomor Telp *</label>
                                <input type="text" name="member_phone" id="member_phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="member_character">Sifat Anggota *</label>
                                <select name="member_character" id="member_character" class="form-control" required>
                                    <option value="">--- Pilih Salah Satu ---</option>
                                    @foreach ($membercharacter as $key => $value)
                                        <option data-kt-flag="{{ $key }}" value="{{ $key }}"
                                            {{ $key === old('member_character', '' ?? '') ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="member_job">Pekerjaan</label>
                                <input type="text" name="member_job" id="member_job" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="member_identity">Identitas</label>
                                <select name="member_identity" id="member_identity" class="form-control" required>
                                    <option value="">--- Pilih Salah Satu ---</option>
                                    @foreach ($memberidentity as $key => $value)
                                        <option data-kt-flag="{{ $key }}" value="{{ $key }}"
                                            {{ $key === old('member_identity', '' ?? '') ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="member_identity_no">Nomor Identitas</label>
                                <input type="text" name="member_identity_no" id="member_identity_no"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="member_mother">Nama Ibu Kandung</label>
                                <input type="text" name="member_mother" id="member_mother" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('core_member.index') }}" class="btn btn-danger mr-2">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#province_id').change(function() {
                var provinceId = $(this).val();
                $('#city_id').empty().append('<option value="">--- Pilih Salah Satu ---</option>');
                $('#kecamatan_id, #kelurahan_id, #dusun_id').empty().append(
                    '<option value="">--- Pilih Salah Satu ---</option>');
                if (provinceId) {
                    $.ajax({
                        url: '/get-cities/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#city_id').append('<option value="' + value.city_id +
                                    '">' + value.city_name + '</option>');
                            });
                        }
                    });
                }
            });
            $('#city_id').change(function() {
                var cityId = $(this).val();
                $('#kecamatan_id').empty().append('<option value="">--- Pilih Salah Satu ---</option>');
                $('#kelurahan_id, #dusun_id').empty().append(
                    '<option value="">--- Pilih Salah Satu ---</option>');
                if (cityId) {
                    $.ajax({
                        url: '/get-kecamatans/' + cityId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#kecamatan_id').append('<option value="' + value
                                    .kecamatan_id + '">' + value.kecamatan_name +
                                    '</option>');
                            });
                        }
                    });
                }
            });
            $('#kecamatan_id').change(function() {
                var kecamatanId = $(this).val();
                $('#kelurahan_id').empty().append('<option value="">--- Pilih Salah Satu ---</option>');
                $('#dusun_id').empty().append('<option value="">--- Pilih Salah Satu ---</option>');
                if (kecamatanId) {
                    $.ajax({
                        url: '/get-kelurahans/' + kecamatanId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#kelurahan_id').append('<option value="' + value
                                    .kelurahan_id + '">' + value.kelurahan_name +
                                    '</option>');
                            });
                        }
                    });
                }
            });
            $('#kelurahan_id').change(function() {
                var kelurahanId = $(this).val();
                $('#dusun_id').empty().append('<option value="">--- Pilih Salah Satu ---</option>');
                if (kelurahanId) {
                    $.ajax({
                        url: '/get-dusuns/' + kelurahanId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#dusun_id').append('<option value="' + value
                                    .dusun_id + '">' + value.dusun_name +
                                    '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('[class*="alert"]').each(function() {
                    $(this).alert('close');
                });
            }, 5000);
        });
        $(document).on('DOMNodeInserted', '[class*="alert"]', function() {
            setTimeout(function() {
                $(this).alert('close');
            }.bind(this), 5000);
        });
    </script>
@stop
