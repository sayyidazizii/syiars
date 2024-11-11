@extends('adminlte::page')

@section('title', 'Acct Deposito Edit | AdminLTE')
@section('content_header')<h1>Edit Data</h1>
@stop

@section('content')
@if(session('msg'))<div class="alert alert-{{ session('type') ?? 'info' }}" role = "alert" > {{ session('msg') }}</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li > @endforeach < /div>
@endif

<div class="col-md-12">
    <div class="box box-primary">
        <form role="form" method="post" action="{{ route('AcctDeposito.prosesupdate', $acct_deposito->deposito_id) }}">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->
            <div class="box-body">
                <div class="form-group">
                    <label for="deposito_code">Kode Berjangka</label > <input
    type="text"
    name="deposito_code"
    class="form-control @error('deposito_code') is-invalid @enderror"
    value="{{ old('deposito_code', $acct_deposito->deposito_code) }}"
    placeholder="Masukkan kode berjangka"
    required="required">
    @error('deposito_code')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="deposito_name">Nama</label>
    <input
        type="text"
        name="deposito_name"
        class="form-control @error('deposito_name') is-invalid @enderror"
        value="{{ old('deposito_name', $acct_deposito->deposito_name) }}"
        placeholder="Masukkan nama deposito"
        required="required">
        @error('deposito_name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="deposito_number">No Perkiraan</label>
        <input
            type="text"
            name="deposito_number"
            class="form-control @error('deposito_number') is-invalid @enderror"
            value="{{ old('deposito_number', $acct_deposito->deposito_number) }}"
            placeholder="Masukkan nomor deposito"
            required="required">
            @error('deposito_number')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="account_id">Basil</label>
            <select
                id="account_id"
                name="account_id"
                class="form-control @error('account_id') is-invalid @enderror">
                <option value="">Pilih nomor deposito</option>
                <option
                    value="1"
                    {{ old('account_id', $acct_deposito->account_id) == '1' ? 'selected' : '' }}>Deposito 1</option>
                <option
                    value="2"
                    {{ old('account_id', $acct_deposito->account_id) == '2' ? 'selected' : '' }}>Deposito 2</option>
                <option
                    value="3"
                    {{ old('account_id', $acct_deposito->account_id) == '3' ? 'selected' : '' }}>Deposito 3</option>
                <!-- Add more options as needed -->
            </select>
            @error('account_id')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="account_basil_id">Akun Basil</label>
            <select
                id="account_basil_id"
                name="account_basil_id"
                class="form-control @error('account_basil_id') is-invalid @enderror">
                <option value="">Pilih nomor deposito</option>
                <option
                    value="1"
                    {{ old('account_basil_id', $acct_deposito->account_basil_id) == '1' ? 'selected' : '' }}>Deposito 1</option>
                <option
                    value="2"
                    {{ old('account_basil_id', $acct_deposito->account_basil_id) == '2' ? 'selected' : '' }}>Deposito 2</option>
                <option
                    value="3"
                    {{ old('account_basil_id', $acct_deposito->account_basil_id) == '3' ? 'selected' : '' }}>Deposito 3</option>
                <!-- Add more options as needed -->
            </select>
            @error('account_basil_id')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="deposito_period">Jangka Waktu</label>
            <input
                type="text"
                name="deposito_period"
                class="form-control @error('deposito_period') is-invalid @enderror"
                value="{{ old('deposito_period', $acct_deposito->deposito_period) }}"
                placeholder="Masukkan jangka waktu"
                required="required">
                @error('deposito_period')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="deposito_profit_sharing">Bagi Hasil/th</label>
                <input
                    type="text"
                    name="deposito_profit_sharing"
                    class="form-control @error('deposito_profit_sharing') is-invalid @enderror"
                    value="{{ old('deposito_profit_sharing', $acct_deposito->deposito_profit_sharing) }}"
                    placeholder="Masukkan bagi hasil/th "
                    required="required">
                    @error('deposito_profit_sharing')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop @section('css')
<link rel="stylesheet" href="/css/admin.custom.css">
    @stop @section('js')
    <script>
        console.log('Edit Form Loaded!');
    </script>
    @stop
