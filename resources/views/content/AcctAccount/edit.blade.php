@extends('adminlte::page')

@section('title', 'Nomor Perkiraan Edit | AdminLTE')
@section('content_header')
    <h1>Edit Data</h1>
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('acct_account.prosesupdate', $acct_account->id) }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Pembiayaan</label>
                        <input type="text" name="account_code" class="form-control" value="{{$acct_account->account_code}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pembiayaan</label>
                        <input type="text" name="account_name" class="form-control" value="{{$acct_account->account_name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Golongan Perkiraan</label>
                        <input type="text" name="account_group" class="form-control" value="{{$acct_account->account_group}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelompok Perkiraan</label>
                        <select name="account_type_id" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">D/K</label>
                        <select name="account_status" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
