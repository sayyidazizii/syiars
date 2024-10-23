@extends('adminlte::page')

@section('title', 'Acct Deposito Tambah | AdminLTE')
@section('content_header')
<h1>Tambah Data</h1>
@stop
@section('content')
@if (session('msg'))
<div class="alert alert-{{ session('type') ?? 'info' }}" role="alert">
    {{ session('msg') }}
</div>
@endif


@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif
<div class="col-md-12">
    <div class="box box-primary">
        <form role="form" method="post" action="{{ route('AcctDeposito.store') }}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="kode berjangka">Kode Berjangka</label>
                    <input type="text" name="deposito_code"
                        class="form-control @error('deposito_code') is-invalid @enderror"
                        value="{{ old('deposito_code') }}" placeholder="Masukkan kode berjangka">
                    @error('deposito_code')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="deposito_name"
                        class="form-control @error('deposito_name') is-invalid @enderror"
                        value="{{ old('deposito_name') }}" placeholder="Masukkan nama deposito">
                    @error('deposito_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="No Perkiraan">No Perkiraan</label>
                    <input type="text" name="deposito_number"
                        class="form-control @error('deposito_number') is-invalid @enderror"
                        value="{{ old('deposito_number') }}" placeholder="Masukkan nomor deposito">
                    @error('deposito_number')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="account_id">Basil</label>
                    <select id="account_id" name="account_id"
                        class="form-control @error('account_id') is-invalid @enderror">
                        <option value="">Pilih nomor deposito</option>
                        <option value="1" {{ old('account_id') == '1' ? 'selected' : '' }}>Deposito 1</option>
                        <option value="2" {{ old('account_id') == '2' ? 'selected' : '' }}>Deposito 2</option>
                        <option value="3" {{ old('account_id') == '3' ? 'selected' : '' }}>Deposito 3</option>
                        <!-- Add more options as needed -->
                    </select>
                    @error('account_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="akun basil">Akun Basil</label>
                    <select id="account_basil_id" name="account_basil_id"
                        class="form-control @error('account_basil_id') is-invalid @enderror">
                        <option value="">Pilih nomor deposito</option>
                        <option value="1" {{ old('account_basil_id') == '1' ? 'selected' : '' }}>Deposito 1</option>
                        <option value="2" {{ old('account_basil_id') == '2' ? 'selected' : '' }}>Deposito 2</option>
                        <option value="3" {{ old('account_basil_id') == '3' ? 'selected' : '' }}>Deposito 3</option>
                        <!-- Add more options as needed -->
                    </select>
                    @error('account_basil_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="No Perkiraan">Jangka Waktu</label>
                    <input type="text" name="deposito_period"
                        class="form-control @error('deposito_period') is-invalid @enderror"
                        value="{{ old('deposito_period') }}" placeholder="Masukkan jangka waktu">
                    @error('deposito_period')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bagi hasil/th">bagi hasil/th</label>
                    <input type="text" name="deposito_profit_sharing"
                        class="form-control @error('deposito_profit_sharing') is-invalid @enderror"
                        value="{{ old('deposito_profit_sharing') }}" placeholder="Masukkan bagi hasil/th ">
                    @error('deposito_profit_sharing')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
    console.log('Hi!');

</script>
@stop
