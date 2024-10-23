@extends('adminlte::page')

@section('title', 'Kode Pembiayaan Tambah | AdminLTE')
@section('content_header')
    <h1>Tambah Data</h1>
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('aact_credit.store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Pembiayaan</label>
                        <input type="text" name="credits_code" class="form-control" placeholder="Enter Kode Pembiayaan"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pembiayaan</label>
                        <input type="text" name="credits_name" class="form-control" placeholder="Enter Nama Pembiayaan"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan</label>
                        <select name="receivable_account_id" class="form-control">
                            @foreach ($aact_account as $data)
                                <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan Margin</label>
                        <select name="income_account_id" class="form-control"   >
                            @foreach ($aact_account as $data)
                                <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-actions float-right">
                        <a href="{{ url('/aact_credit/add_account') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah
                            Nomor Perkiraan Baru</a>
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
