@extends('adminlte::page')

@section('title', 'Daftar Kode Simpanan | AdminLTE')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible mt-5">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>
                <i class="icon fa fa-check"></i>
                {{ Session::get('success') }}
            </h4>
        </div>
    @endif
    @if (Session::has('warning'))
        <div class="alert alert-warning alert-dismissible mt-5">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>
                <i class="icon fa fa-check"></i>
                {{ Session::get('warning') }}
            </h4>
        </div>
    @endif
    @if (Session::has('danger'))
        <div class="alert alert-danger alert-dismissible mt-5">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>
                <i class="icon fa fa-check"></i>
                {{ Session::get('danger') }}
            </h4>
        </div>
    @endif

    <div class="card border border-dark mt-5">
        <div class="card-header bg-dark clearfix">
            <h5 class="mb-0 float-left">
            Tambah Kode Simpanan
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('AcctSavings.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="savings_code">Kode Simpanan</label>
                    <input type="text" name="savings_code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="savings_name">Nama Simpanan</label>
                    <input type="text" name="savings_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="savings_number">Nomor Perkiraan</label>
                    <input type="text" name="savings_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="savings_profit_sharing">Bagi Hasil</label>
                    <input type="number" step="any" name="savings_profit_sharing" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="account_basil_id">Nomor Perkiraan Hasil</label>
                    <input type="text" name="account_basil_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="savings_nisbah">Nisbah</label>
                    <input type="number" step="any" name="savings_nisbah" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="savings_basil">Bagi Hasil</label>
                    <input type="number" step="any" name="savings_basil" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('AcctSavings.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin.custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('[class*="alert"]').each(function() {
                    $(this).alert('close');
                });
            }, 5000);
        });

        $(document).on('DOMNodeInserted', '[class*="alert"]', function() {
            setTimeout(function() {
                $(this).alert('close');
            }.bind(this), 5000);
        });
    </script>
@stop
