@extends('adminlte::page')

@section('title', 'Tambah Kode Simpanan Berjangka | AdminLTE')
@section('content_header')
    <h1> Tambah Data</h1>
@stop
@section('content')
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
                        <label for="no Perkiraan">No Perkiraan</label>
                        <select name="account_id" class="form-control @error('account_id') is-invalid @enderror">
                            <option value="">-- Pilih Akun --</option>
                            @foreach ($acct_acount as $data)
                                <option value="{{ $data->account_id }}">{{ $data->account_code }}</option>
                            @endforeach
                        </select>
                        @error('account_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deposito_number">Basil</label>
                        <input type="number" name="deposito_number"
                            class="form-control @error('deposito_number') is-invalid @enderror"
                            value="{{ old('deposito_number') }}" placeholder="Masukkan Basil">
                        @error('deposito_number')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Akun Basil">Akun Basil</label>
                        <select name="account_basil_id"
                            class="form-control @error('account_basil_id') is-invalid @enderror">
                            <option value="">-- Pilih Akun Basil --</option>
                            @foreach ($acct_acount as $data)
                                <option value="{{ $data->account_id }}">{{ $data->account_name }}</option>
                            @endforeach
                        </select>
                        @error('account_basil_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="No Perkiraan">Jangka Waktu</label>
                        <input type="number" name="deposito_period"
                            class="form-control @error('deposito_period') is-invalid @enderror"
                            value="{{ old('deposito_period') }}" placeholder="Masukkan jangka waktu">
                        @error('deposito_period')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bagi hasil/th">Bagi Hasil/th</label>
                        <input type="number" name="deposito_profit_sharing"
                            class="form-control @error('deposito_profit_sharing') is-invalid @enderror"
                            value="{{ old('deposito_profit_sharing') }}" placeholder="Masukkan bagi hasil/th">
                        @error('deposito_profit_sharing')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="box-footer float-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
            <div class="form-actions float-left">
                <a href="{{ route('acct_account.create') }}" class="btn btn-sm btn-info">
                    <i class="fa fa-plus"></i> Tambah Nomor Perkiraan Baru
                </a>
            </div>
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
