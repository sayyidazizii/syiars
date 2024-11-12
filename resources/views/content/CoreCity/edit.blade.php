@extends('adminlte::page')

@section('title', 'Edit Kota | AdminLTE')
@section('content_header')
<h1>Edit Data Kota</h1>
@stop

@section('content')
@if (session('msg'))
<div class="alert alert-{{ session('type') ?? 'info' }}" role="alert">
    {{ session('msg') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif

<div class="col-md-12">
    <div class="box box-primary">
        <form role="form" method="post" action="{{ route('CoreCity.prosesupdate', $core_city->city_id) }}">
            @csrf
            @method('PUT')
            <div class="box-body">
                <!-- City Code -->
                <div class="form-group">
                    <label for="city_code">Kode Kota</label>
                    <input type="text" name="city_code"
                        class="form-control @error('city_code') is-invalid @enderror"
                        value="{{ old('city_code', $core_city->city_code) }}" placeholder="Masukkan kode kota">
                    @error('city_code')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="province_code">Kode Provinsi</label>
                    <input type="text" name="province_code"
                        class="form-control @error('province_code') is-invalid @enderror"
                        value="{{ old('province_code', $core_city->province_code) }}" placeholder="Masukkan kode provinsi">
                    @error('province_code')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- City Name -->
                <div class="form-group">
                    <label for="city_name">Nama Kota</label>
                    <input type="text" name="city_name"
                        class="form-control @error('city_name') is-invalid @enderror"
                        value="{{ old('city_name', $core_city->city_name) }}" placeholder="Masukkan nama kota">
                    @error('city_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Province No -->
                <div class="form-group">
                    <label for="province_no">Nomor Provinsi</label>
                    <input type="text" name="province_no"
                        class="form-control @error('province_no') is-invalid @enderror"
                        value="{{ old('province_no', $core_city->province_no) }}" placeholder="Masukkan nomor provinsi">
                    @error('province_no')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- City No -->
                <div class="form-group">
                    <label for="city_no">Nomor Kota</label>
                    <input type="text" name="city_no"
                        class="form-control @error('city_no') is-invalid @enderror"
                        value="{{ old('city_no', $core_city->city_no) }}" placeholder="Masukkan nomor kota">
                    @error('city_no')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('CoreCity.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin.custom.css">
@stop

@section('js')
<script>
    console.log('Form edit data kota siap!');
</script>
@stop
