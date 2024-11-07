@extends('adminlte::page')

@section('title', 'Tambah Cabang | AdminLTE')
@section('content_header')<h1>Tambah Data</h1>
@stop
@section('content')<div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('core_branch.store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Cabang</label>
                        <input type="text" name="branch_code" class="form-control" placeholder="Enter Kode Cabang"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Cabang</label>
                        <input type="text" name="branch_name" class="form-control" placeholder="Enter Nama Cabang"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Cabang</label>
                        <textarea name="branch_address" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kota Cabang</label>
                        <input type="text" name="branch_city" class="form-control" placeholder="Enter Kota Cabang"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact Person</label>
                        <input type="text" name="branch_contact_person" class="form-control"
                            placeholder="Enter Contact Person" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="branch_email" class="form-control" placeholder="Enter Email Cabang"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telephone 1</label>
                        <input type="number" name="branch_phone1" class="form-control" placeholder="Enter No Telephon"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telephone 2</label>
                        <input type="number" name="branch_phone2" class="form-control" placeholder="Enter No Telephon"
                            required="required">
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
