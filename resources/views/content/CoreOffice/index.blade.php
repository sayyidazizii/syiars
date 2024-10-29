@extends('adminlte::page')

@section('title', 'Business Office | AdminLTE')
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
                Tabel Business Office
            </h5>
            <div class="form-actions float-right">
                <a href="{{ url('/core_office/add') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah
                    Business Office</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" style="width:100%"
                    class="table table-striped table-bordered table-hover table-full-width">
                    <thead>
                        <tr>
                            <th width="2%" style='text-align:center'>No</th>
                            <th width="15%" style='text-align:center'>Kode BO</th>
                            <th width="15%" style='text-align:center'>Nama BO</th>
                            <th width="15%" style='text-align:center'>Cabang</th>
                            <th width="10%" style='text-align:center'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($core_office as $data)
                            <tr>
                                <td style='text-align:center'>{{ $no++ }}</td>
                                <td>{{ $data->office_code }}</td>
                                <td>{{ $data->office_name }}</td>
                                <td>{{ $data->branch->branch_name }}</td>
                                <td class="text-center">
                                    <a type="button" class="btn btn-outline-warning btn-sm mb-2"
                                        href="{{ route('core_office.update', $data->office_id) }}">Edit</a>
                                    <form action="{{ route('core_office.delete', $data->office_id) }}" method="post">
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
