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
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $member->nama) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin *</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <option value="Laki-Laki" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi *</label>
                            <select name="provinsi" id="provinsi" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for provinsi should be populated dynamically -->
                                <option value="Provinsi 1" {{ old('provinsi', $member->provinsi) == 'Provinsi 1' ? 'selected' : '' }}>Provinsi 1</option>
                                <option value="Provinsi 2" {{ old('provinsi', $member->provinsi) == 'Provinsi 2' ? 'selected' : '' }}>Provinsi 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten *</label>
                            <select name="kabupaten" id="kabupaten" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for kabupaten should be populated dynamically -->
                                <option value="Kabupaten 1" {{ old('kabupaten', $member->kabupaten) == 'Kabupaten 1' ? 'selected' : '' }}>Kabupaten 1</option>
                                <option value="Kabupaten 2" {{ old('kabupaten', $member->kabupaten) == 'Kabupaten 2' ? 'selected' : '' }}>Kabupaten 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan *</label>
                            <select name="kecamatan" id="kecamatan" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for kecamatan should be populated dynamically -->
                                <option value="Kecamatan 1" {{ old('kecamatan', $member->kecamatan) == 'Kecamatan 1' ? 'selected' : '' }}>Kecamatan 1</option>
                                <option value="Kecamatan 2" {{ old('kecamatan', $member->kecamatan) == 'Kecamatan 2' ? 'selected' : '' }}>Kecamatan 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan *</label>
                            <select name="kelurahan" id="kelurahan" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <!-- Options for kelurahan should be populated dynamically -->
                                <option value="Kelurahan 1" {{ old('kelurahan', $member->kelurahan) == 'Kelurahan 1' ? 'selected' : '' }}>Kelurahan 1</option>
                                <option value="Kelurahan 2" {{ old('kelurahan', $member->kelurahan) == 'Kelurahan 2' ? 'selected' : '' }}>Kelurahan 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dusun">Dusun *</label>
                            <input type="text" name="dusun" id="dusun" class="form-control" value="{{ old('dusun', $member->dusun) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir *</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $member->tempat_lahir) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir *</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $member->tanggal_lahir) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat *</label>
                            <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat', $member->alamat) }}</textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" name="kode_pos" id="kode_pos" class="form-control" value="{{ old('kode_pos', $member->kode_pos) }}">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telp *</label>
                            <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ old('no_telp', $member->no_telp) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="sifat_anggota">Sifat Anggota *</label>
                            <select name="sifat_anggota" id="sifat_anggota" class="form-control" required>
                                <option value="">--- Pilih Salah Satu ---</option>
                                <option value="Sifat 1" {{ old('sifat_anggota', $member->sifat_anggota) == 'Sifat 1' ? 'selected' : '' }}>Sifat 1</option>
                                <option value="Sifat 2" {{ old('sifat_anggota', $member->sifat_anggota) == 'Sifat 2' ? 'selected' : '' }}>Sifat 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ old('pekerjaan', $member->pekerjaan) }}">
                        </div>
                        <div class="form-group">
                            <label for="identitas">Identitas</label>
                            <select name="identitas" id="identitas" class="form-control">
                                <option value="">--- Pilih Salah Satu ---</option>
                                <option value="KTP" {{ old('identitas', $member->identitas) == 'KTP' ? 'selected' : '' }}>KTP</option>
                                <option value="SIM" {{ old('identitas', $member->identitas) == 'SIM' ? 'selected' : '' }}>SIM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_identitas">Nomor Identitas</label>
                            <input type="text" name="no_identitas" id="no_identitas" class="form-control" value="{{ old('no_identitas', $member->no_identitas) }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu_kandung">Nama Ibu Kandung</label>
                            <input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung" class="form-control" value="{{ old('nama_ibu_kandung', $member->nama_ibu_kandung) }}">
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
