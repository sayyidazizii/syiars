@extends('adminlte::page')

@section('title', 'Tambah Provinsi | AdminLTE')

@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible mt-5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i>{{ Session::get('success') }}</h4>
</div>
@endif
@if (Session::has('warning'))
<div class="alert alert-warning alert-dismissible mt-5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-exclamation-triangle"></i>{{ Session::get('warning') }}</h4>
</div>
@endif
@if (Session::has('danger'))
<div class="alert alert-danger alert-dismissible mt-5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-times"></i>{{ Session::get('danger') }}</h4>
</div>
@endif

<div class="card border border-dark mt-5">
    <div class="card-header bg-dark">
        <h5 class="mb-0 text-white">Tambah Provinsi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('core_province.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="province_code">Kode Provinsi</label>
                <input type="text" class="form-control" id="province_code" name="province_code" required maxlength="2" placeholder="Masukkan kode provinsi">
            </div>
            <div class="form-group">
                <label for="province_name">Nama Provinsi</label>
                <input type="text" class="form-control" id="province_name" name="province_name" required maxlength="255" placeholder="Masukkan nama provinsi">
            </div>
            <div class="form-group">
                <label for="province_no">Nomor Provinsi</label>
                <input type="text" class="form-control" id="province_no" name="province_no" maxlength="20" placeholder="Masukkan nomor provinsi (opsional)">
            </div>
            <div class="form-group">
                <label for="data_state">Data State</label>
                <input type="number" class="form-control" id="data_state" name="data_state" value="0" min="0" placeholder="Masukkan data state">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
