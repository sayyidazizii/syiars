@extends('adminlte::page')

@section('title', 'Kode Pembiayaan Edit | AdminLTE')
@section('content_header')
    <h1>Edit Data</h1>
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('aact_credit.prosesupdate', $aact_credits->id) }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Pembiayaan</label>
                        <input type="text" name="credits_code" class="form-control" value="{{$aact_credits->credits_code}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pembiayaan</label>
                        <input type="text" name="credits_name" class="form-control" value="{{$aact_credits->credits_name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan</label>
                            <select name="receivable_account_id" class="form-control">
                                @foreach ($aact_account as $data)
                                    <option {{ $aact_credits->receivable_account_id == $data->id ? 'selected' : '' }}
                                        value="{{ $data->id }}">{{ $data->id }} - {{ $data->account_name }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan Margin</label>
                            <select name="income_account_id" class="form-control">
                                @foreach ($aact_account as $data)
                                    <option {{ $aact_credits->income_account_id == $data->id ? 'selected' : '' }}
                                        value="{{ $data->id }}">{{ $data->id }} - {{ $data->account_name }}</option>
                                @endforeach
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
