@extends('adminlte::page')

@section('title', 'Edit Cabang | AdminLTE')
@section('content_header')<h1>Edit Data</h1>
@stop
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('core_branch.prosesupdate', $core_branch->id) }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Cabang</label>
                        <input type="text" name="branch_code" class="form-control" value="{{ $core_branch->branch_code }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Cabang</label>
                        <input type="text" name="branch_name" class="form-control"
                            value="{{ $core_branch->branch_name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Cabang</label>
                        <textarea name="branch_address" class="form-control" cols="30" rows="10">{{ $core_branch->branch_address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kota Cabang</label>
                        <input type="text" name="branch_city" class="form-control"
                            value="{{ $core_branch->branch_city }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact Person</label>
                        <input type="text" name="branch_contact_person" class="form-control"
                            value="{{ $core_branch->branch_contact_person }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="branch_email" class="form-control"
                            value="{{ $core_branch->branch_email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telephone 1</label>
                        <input type="number" name="branch_phone1" class="form-control"
                            value="{{ $core_branch->branch_phone1 }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telephone 2</label>
                        <input type="number" name="branch_phone2" class="form-control"
                            value="{{ $core_branch->branch_phone2 }}">
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
