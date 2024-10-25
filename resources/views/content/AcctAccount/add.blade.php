@extends('adminlte::page')

@section('title', 'Perkiraan Tambah Baru | AdminLTE')
@section('content_header')
    <h1>Tambah Data</h1>
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('acct_account.store') }}">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account_type_id">Kelompok Perkiraan</label>
                            <select name="account_type_id" id="account_type_id" class="form-control select2me">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                @if(isset($kelompokperkiraan))
                                    @foreach($kelompokperkiraan as $key => $value)
                                        <option value="{{ $key }}" {{ (old('account_type_id', $data['account_type_id'] ?? '') == $key) ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account_status">D/K</label>
                            <select name="account_status" id="account_status" class="form-control select2me">
                                <option value="">Debit</option>
                                <option value="">Kredit</option>
                                @if(isset($accountstatus))
                                    @foreach($accountstatus as $key => $value)
                                        <option value="{{ $key }}" {{ (old('account_status', $data['account_status'] ?? '') == $key) ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
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
