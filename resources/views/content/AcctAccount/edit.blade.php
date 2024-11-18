@extends('adminlte::page')

@section('title', 'Edit Nomor Perkiraan | AdminLTE')
@section('content_header')<h1>Edit Data</h1>
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('acct_account.prosesupdate', $acct_account->account_id) }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan</label>
                        <input type="text" name="account_code" class="form-control"
                            value="{{ $acct_account->account_code }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perkiraan</label>
                        <input type="text" name="account_name" class="form-control"
                            value="{{ $acct_account->account_name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Golongan Perkiraan</label>
                        <input type="text" name="account_group" class="form-control"
                            value="{{ $acct_account->account_group }}">
                    </div>
                    <div>
                        <label for="exampleInputEmail1">Kelompok Perkiraan</label>
                        <div class="col-lg-8 fv-row">
                            <select name="account_type_id" id="account_type_id" class="form-control">
                                @foreach ($kelompokperkiraan as $key => $value)
                                    <option data-kt-flag="{{ $key }}" value="{{ $key }}"
                                        {{ $key === old('account_type_id', '' ?? '') ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="exampleInputEmail1">Akun Status</label>
                        <div class="col-lg-8 fv-row">
                            <select name="account_status" id="account_status" class="form-control">
                                @foreach ($accountstatus as $key => $value)
                                    <option data-kt-flag="{{ $key }}" value="{{ $key }}"
                                        {{ $key === old('account_type_id', '' ?? '') ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary m-2">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @stop @section('css')
    <link rel="stylesheet" href="/css/admin.custom.css">
    @stop @section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
