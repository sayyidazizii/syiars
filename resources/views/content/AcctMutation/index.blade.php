@extends('adminlte::page')

@section('title', 'Daftar Mutasi | AdminLTE')
@section('content')
@if (session('msg'))
        <div class="alert alert-{{ session('type') ?? 'info' }}" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
<div class="card border border-dark">
    <div class="card-header bg-dark clearfix">
        <h5 class="mb-0 float-left">
            Tabel Mutasi
        </h5>
        <div class="form-actions float-right">
            <a href="{{ route('acct_mutation.create') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Mutasi Baru</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered table-hover table-full-width">
                <thead>
                    <tr>
                        <th width="5%" style="text-align:center">No</th>
                        <th width="15%" style="text-align:center">Kode Mutasi</th>
                        <th width="20%" style="text-align:center">Nama Mutasi</th>
                        <th width="15%" style="text-align:center">Fungsi</th>
                        <th width="10%" style="text-align:center">D/K</th>
                        <th width="20%" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($acct_mutation as $mutation)
                    <tr>
                        <td style="text-align:center">{{ $no++ }}</td>
                        <td style="text-align:center">{{ $mutation->mutation_code }}</td>
                        <td>{{ $mutation->mutation_name }}</td>
                        <td>{{ $mutation->mutation_function }}</td>
                        <td style="text-align:center">{{ $mutation->mutation_status }}</td>
                        <td class="text-center">
                            <a type="button" class="btn btn-outline-warning btn-sm mb-2"
                             href="{{ route('acct_mutation.update', $mutation->mutation_id) }}">Edit</a>
                            <form action="{{ route('acct_mutation.delete', $mutation->mutation_id) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm"
                                 onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
