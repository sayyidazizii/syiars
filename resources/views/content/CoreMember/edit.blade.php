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
                <form action="{{ route('core_member.prosesupdate', $core_member->member_id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Anggota *</label>
                                <input type="text" name="member_name" id="member_name" class="form-control"
                                    value="{{ old('member_name', $core_member->member_name) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat *</label>
                                <textarea name="member_address" id="member_address" class="form-control" required>{{ old('member_address', $core_member->member_address) }}</textarea>
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
                                <label for="no_telp">Nomor Telp *</label>
                                <input type="text" name="member_phone" id="member_phone" class="form-control"
                                    value="{{ old('member_phone', $core_member->member_phone) }}" required>
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
