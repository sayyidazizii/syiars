@extends('adminlte::page')

@section('title', 'Edit Kode Pembiayaan | AdminLTE')
@section('content_header')<h1>Edit Data</h1>
@stop
@section('content')<div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('acct_credit.prosesupdate', $acct_credits->id) }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Pembiayaan</label>
                        <input type="text" name="credits_code" class="form-control"
                            value="{{ $acct_credits->credits_code }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pembiayaan</label>
                        <input type="text" name="credits_name" class="form-control"
                            value="{{ $acct_credits->credits_name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan</label>
                        <select name="account_id" class="form-control">
                            @foreach ($acct_account as $data)
                                <option {{ $acct_credits->account_id == $data->id ? 'selected' : '' }}
                                    value="{{ $data->id }}">{{ $data->account_code }}
                                    - {{ $data->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan Margin</label>
                        <select name="accountaccount_code" class="form-control">
                            @foreach ($acct_account as $data)
                                <option {{ $acct_credits->account_id == $data->id ? 'selected' : '' }}
                                    value="{{ $data->id }}">{{ $data->account_code }}
                                    - {{ $data->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
