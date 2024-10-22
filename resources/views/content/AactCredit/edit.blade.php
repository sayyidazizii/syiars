@extends('adminlte::page')

@section('title', 'Aact Credit Edit | AdminLTE')
@section('content_header')
    <h1>Edit Data</h1>
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('aact_credit.prosesupdate', $aact_credits->credits_id) }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Credit</label>
                        <input type="text" name="credits_code" class="form-control" value="{{$aact_credits->credits_code}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Credit</label>
                        <input type="text" name="credits_name" class="form-control" value="{{$aact_credits->credits_name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Credit</label>
                        <input type="number" name="credits_number" class="form-control" value="{{$aact_credits->credits_number}}">
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
