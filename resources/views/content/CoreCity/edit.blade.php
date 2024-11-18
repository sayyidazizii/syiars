@extends('adminlte::page')

@section('title', 'Edit Kota | AdminLTE')
@section('content_header')
    <h1>Edit Data Kota</h1>
@stop
@section('content')
    <div class="col-md-12">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('CoreCity.prosesupdate', $core_city->city_id) }}">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="city_code">Kode Kota</label>
                        <input type="text" name="city_code" class="form-control @error('city_code') is-invalid @enderror"
                            value="{{ old('city_code', $core_city->city_code) }}" placeholder="Masukkan kode kota">
                        @error('city_code')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no Perkiraan">Nama Provinsi</label>
                        <select name="province_id" class="form-control">
                            @foreach ($core_province as $data)
                                <option value="{{ $data->province_id }}">{{ $data->province_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="province_id">Kode Provinsi</label>
                    <select name="province_id" class="form-control">
                        @foreach ($core_province as $data)
                            <option value="{{ $data->province_id }}">{{ $data->province_code }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="city_name">Nama Kota</label>
                    <input type="text" name="city_name" class="form-control @error('city_name') is-invalid @enderror"
                        value="{{ old('city_name', $core_city->city_name) }}" placeholder="Masukkan nama kota">
                    @error('city_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no Perkiraan">Nomor Provinsi</label>
                    <select name="province_id" class="form-control">
                        @foreach ($core_province as $data)
                            <option value="{{ $data->province_id }}">{{ $data->province_no }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="city_no">Nomor Kota</label>
                    <input type="text" name="city_no" class="form-control @error('city_no') is-invalid @enderror"
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
