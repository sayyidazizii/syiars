@extends('adminlte::page')

@section('title', 'Tambah Business Offices | AdminLTE')
@section('content_header')<h1>Tambah Data</h1>
@stop
@section('content')<div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('core_office.store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Business Office</label>
                        <input type="text" name="office_code" class="form-control" placeholder="Enter Kode Business Office"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Business Office</label>
                        <input type="text" name="office_name" class="form-control"
                            placeholder="Enter Nama Business Office" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cabang</label>
                        <select name="branch_id" class="form-control">
                            @foreach ($core_branch as $data)
                                <option value="{{ $data->id }}">{{ $data->branch_name }}</option>
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
