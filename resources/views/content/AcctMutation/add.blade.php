@extends('adminlte::page')

@section('title', 'Tambah Daftar Mutasi | AdminLTE')
@section('content')
    <div class="card border border-dark mt-5">
        <div class="card-header bg-success text-white clearfix">
            <h5 class="mb-0 float-left">Form Tambah</h5>
            <a href="{{ route('acct_mutation.index') }}" class="btn btn-outline-light btn-sm float-right"><i
                    class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('acct_mutation.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mutation_code">Kode Mutasi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mutation_code" name="mutation_code" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mutation_name">Nama Mutasi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mutation_name" name="mutation_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mutation_function">Fungsi (+/-) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mutation_function" name="mutation_function"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mutation_status">D/K <span class="text-danger">*</span></label>
                            <select class="form-control" id="mutation_status" name="mutation_status" required>
                                <option value="Debit">Debit</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('acct_mutation.index') }}" class="btn btn-danger"><i class="fa fa-times"></i>
                        Batal</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin.custom.css">
@stop
