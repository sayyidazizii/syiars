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
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="member_name">Nama Anggota *</label>
                            <input type="text" name="member_name" id="member_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="member_gender">Jenis Kelamin *</label>
                            <select name="member_gender" id="member_gender" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="province_id">Provinsi *</label>
                            <select name="province_id" id="province_id" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for provinsi go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city_id">Kabupaten *</label>
                            <select name="city_id" id="city_id" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for city_id go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan_id">Kecamatan *</label>
                            <select name="kecamatan_id" id="kecamatan_id" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for kecamatan go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan_id">Kelurahan *</label>
                            <select name="kelurahan_id" id="kelurahan_id" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for kelurahan go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dusun_id">Dusun *</label>
                            <input type="text" name="dusun_id" id="dusun_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="member_place_of_birth">Tempat Lahir *</label>
                            <input type="text" name="member_place_of_birth" id="member_place_of_birth" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="member_date_of_birth">Tanggal Lahir *</label>
                            <input type="date" name="member_date_of_birth" id="member_date_of_birth" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="member_address">Alamat *</label>
                            <textarea name="member_address" id="member_address" class="form-control" required></textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="member_postal_code">Kode Pos</label>
                            <input type="text" name="member_postal_code" id="member_postal_code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="member_phone">Nomor Telp *</label>
                            <input type="text" name="member_phone" id="member_phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="member_character">Sifat Anggota *</label>
                            <select name="member_character" id="member_character" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for sifat anggota go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="member_job">Pekerjaan</label>
                            <input type="text" name="member_job" id="member_job" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="member_identity">Identitas</label>
                            <select name="member_identity" id="member_identity" class="form-control">
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for member_identity go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="member_identity_no">Nomor Identitas</label>
                            <input type="text" name="member_identity_no" id="member_identity_no" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="member_mother">Nama Ibu Kandung</label>
                            <input type="text" name="member_mother" id="member_mother" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
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
