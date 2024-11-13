@extends('adminlte::page')

@section('title', 'Edit Provinsi | AdminLTE')

@section('content')
<div class="card border border-dark">
    <div class="card-header bg-dark">
        <h5 class="mb-0 text-white">Edit Provinsi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('core_province.prosesupdate', $core_province->province_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="province_code">Kode Provinsi</label>
                <input type="text" class="form-control" id="province_code" name="province_code" value="{{ $core_province->province_code }}" required maxlength="2" placeholder="Masukkan kode provinsi">
            </div>
            <div class="form-group">
                <label for="province_name">Nama Provinsi</label>
                <input type="text" class="form-control" id="province_name" name="province_name" value="{{ $core_province->province_name }}" required maxlength="255" placeholder="Masukkan nama provinsi">
            </div>
            <div class="form-group">
                <label for="province_no">Nomor Provinsi</label>
                <input type="text" class="form-control" id="province_no" name="province_no" value="{{ $core_province->province_no }}" maxlength="20" placeholder="Masukkan nomor provinsi (opsional)">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('core_province.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
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
