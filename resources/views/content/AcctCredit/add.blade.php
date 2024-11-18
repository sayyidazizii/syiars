@extends('adminlte::page')

@section('title', 'Tambah Kode Pembiayaan | AdminLTE')
@section('content_header')<h1>Tambah Data</h1>
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('acct_credit.store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Pembiayaan</label>
                        <input type="text" name="credits_code" class="form-control" placeholder="Enter Kode Pembiayaan"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pembiayaan</label>
                        <input type="text" name="credits_name" class="form-control" placeholder="Enter Nama Pembiayaan"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan</label>
                        <select name="account_id" class="form-control">
                            @foreach ($acct_account as $data)
                                <option value="{{ $data->account_id }}">{{ $data->account_code }}
                                    - {{ $data->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan Margin</label>
                        <select name="account_id" class="form-control">
                            @foreach ($acct_account as $data)
                                <option value="{{ $data->account_id }}">{{ $data->account_code }}
                                    - {{ $data->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-actions float-right">
                        <a href="{{ url('/acct_account/add') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-plus"></i>
                            Tambah Nomor Perkiraan Baru</a>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
