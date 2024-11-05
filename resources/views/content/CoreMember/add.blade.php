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
                            <label for="nama">Nama Anggota *</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin *</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi *</label>
                            <select name="provinsi" id="provinsi" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for provinsi go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten *</label>
                            <select name="kabupaten" id="kabupaten" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for kabupaten go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan *</label>
                            <select name="kecamatan" id="kecamatan" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for kecamatan go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan *</label>
                            <select name="kelurahan" id="kelurahan" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for kelurahan go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dusun">Dusun *</label>
                            <input type="text" name="dusun" id="dusun" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir *</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir *</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat *</label>
                            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" name="kode_pos" id="kode_pos" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telp *</label>
                            <input type="text" name="no_telp" id="no_telp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sifat_anggota">Sifat Anggota *</label>
                            <select name="sifat_anggota" id="sifat_anggota" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for sifat anggota go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="identitas">Identitas</label>
                            <select name="identitas" id="identitas" class="form-control">
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for identitas go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_identitas">Nomor Identitas</label>
                            <input type="text" name="no_identitas" id="no_identitas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu_kandung">Nama Ibu Kandung</label>
                            <input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung" class="form-control">
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
