@extends('adminlte::page')

@section('title', 'Acct Deposito Tambah | AdminLTE')
@section('content_header') < h1 > Tambah Data</h1>
@stop
@section('content')
@if(session('msg')) < div class = "alert alert-{{ session('type') ?? 'info' }}" role = "alert" > {{ session('msg') }} < /div>
@endif


@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li > @endforeach < /div>
@endif
<div class="col-md-12">
    <div class="box box-primary">
        <form role="form" method="post" action="{{ route('AcctDeposito.store') }}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="kode berjangka">Kode Berjangka</label > <input
    type="text"
    name="deposito_code"
    class="form-control @error('deposito_code') is-invalid @enderror"
    value="{{ old('deposito_code') }}"
    placeholder="Masukkan kode berjangka">
    @error('deposito_code')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="nama">Nama</label>
    <input
        type="text"
        name="deposito_name"
        class="form-control @error('deposito_name') is-invalid @enderror"
        value="{{ old('deposito_name') }}"
        placeholder="Masukkan nama deposito">
        @error('deposito_name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="no Perkiraan">No Perkiraan</label>
        <select name="deposito_number" class="form-control">
            @foreach ($acct_acount as $data)
            <option value="{{ $data->id }}">{{ $data->account_code }}</option>
            @endforeach
        </select>
        @error('deposito_number')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <!-- Button to trigger the modal -->

    <div class="form-group">
        <label for="account_id">Basil</label>
        <input
            type="text"
            name="account_id"
            class="form-control @error('account_id') is-invalid @enderror"
            value="{{ old('account_id') }}"
            placeholder="Masukkan Basil">
            @error('account_id')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="no Perkiraan">Akun Basil</label>
            <select name="account_basil_id" class="form-control">
                @foreach ($acct_acount as $data)
                <option value="{{ $data->id }}">{{ $data->account_name }}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="No Perkiraan">Jangka Waktu</label>
                <input
                    type="text"
                    name="deposito_period"
                    class="form-control @error('deposito_period') is-invalid @enderror"
                    value="{{ old('deposito_period') }}"
                    placeholder="Masukkan jangka waktu">
                    @error('deposito_period')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bagi hasil/th">bagi hasil/th</label>
                    <input
                        type="text"
                        name="deposito_profit_sharing"
                        class="form-control @error('deposito_profit_sharing') is-invalid @enderror"
                        value="{{ old('deposito_profit_sharing') }}"
                        placeholder="Masukkan bagi hasil/th ">
                        @error('deposito_profit_sharing')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-actions float-left">
                        <a href="{{ route('acct_account.create') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-plus"></i>
                            Tambah Nomor Perkiraan Baru</a>
                    </div>
                    <div class="box-footer float-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </div>
            </form>

            <!-- Modal -->

        </div>
    </div>
    @stop @section('css')
    <link rel="stylesheet" href="/css/admin.custom.css">
        @stop @section('js')
        <script>
            console.log('Hi!');
        </script>
        @stop
