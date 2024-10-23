@extends('adminlte::page')

@section('title', 'Kode Pembiayaan Tambah Baru | AdminLTE')
@section('content_header')
    <h1>Tambah Data</h1>
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('aact_credit.stores') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan</label>
                        <input type="text" name="account_code" class="form-control" placeholder="Enter Nomor Perkiraan"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perkiraan</label>
                        <input type="text" name="account_name" class="form-control" placeholder="Enter Nama Perkiraan"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Golongan Perkiraan</label>
                        <input type="text" name="account_group" class="form-control" placeholder="Enter Golongan Perkiraan" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1"></label>
                        <select name="account_status" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelompok Perkiraan</label>
                        <select name="account_type_id" class="form-control">
                            <option value=""></option>
                        </select>
                    </div> --}}
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
