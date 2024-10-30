@extends('adminlte::page')

@section('title', 'Business Office Edit | AdminLTE')
@section('content_header')<h1>Edit Data</h1>
@stop
@section('content')<div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('core_office.prosesupdate', $core_office->office_id) }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Business Office</label>
                        <input type="text" name="office_code" class="form-control" value="{{ $core_office->office_code }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Business Office</label>
                        <input type="text" name="office_name" class="form-control"
                            value="{{ $core_office->office_name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cabang</label>
                        <select name="branch_id" class="form-control">
                            @foreach ($core_branch as $data)
                                <option {{ $core_office->branch_id == $data->id ? 'selected' : '' }}
                                    value="{{ $data->id }}">{{ $data->branch_name }}</option>
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
