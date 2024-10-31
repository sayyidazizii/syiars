@extends('adminlte::page')

@section('title', 'Tambah Kota | AdminLTE')
@section('content_header')
<h1>Tambah Data Kota</h1>
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
        <form role="form" method="post" action="{{ route('CoreCity.store') }}">
            @csrf
            <div class="box-body">
                <!-- City Code -->
                <div class="form-group">
                    <label for="city_code">Kode Kota</label>
                    <input type="text" name="city_code" class="form-control @error('city_code') is-invalid @enderror"
                        value="{{ old('city_code') }}" placeholder="Masukkan kode kota">
                    @error('city_code')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Province ID -->
                <div class="form-group">
                    <label for="no Perkiraan">Nama Province</label>
                    <select name="province_id" class="form-control">
                        @foreach ($core_provinces as $data)
                        <option value="{{ $data->province_id }}">{{ $data->province_name }}</option>
                        @endforeach
                    </select>
                    @error('province_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Province Code -->
                <div class="form-group">
                    <label for="no Perkiraan">Kode Province</label>
                    <select name="province_code" class="form-control">
                        @foreach ($core_provinces as $data)
                        <option value="{{ $data->province_id }}">{{ $data->province_code }}</option>
                        @endforeach
                    </select>
                    @error('province_code')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
               

                <!-- City Name -->
                <div class="form-group">
                    <label for="city_name">Nama Kota</label>
                    <input type="text" name="city_name" class="form-control @error('city_name') is-invalid @enderror"
                        value="{{ old('city_name') }}" placeholder="Masukkan nama kota">
                    @error('city_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Province No -->
                <div class="form-group">
                    <label for="no Perkiraan">Nomor Province</label>
                    <select name="province_no" class="form-control">
                        @foreach ($core_provinces as $data)
                        <option value="{{ $data->province_id }}">{{ $data->province_no }}</option>
                        @endforeach
                    </select>
                    @error('province_no')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                

                <!-- City No -->
                <div class="form-group">
                    <label for="city_no">Nomor Kota</label>
                    <input type="text" name="city_no" class="form-control @error('city_no') is-invalid @enderror"
                        value="{{ old('city_no') }}" placeholder="Masukkan nomor kota">
                    @error('city_no')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
    console.log('Form tambah data kota siap!');

</script>
@stop
