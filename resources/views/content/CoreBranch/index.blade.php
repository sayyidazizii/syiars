@extends('adminlte::page')

@section('title', 'Core Branch | AdminLTE')
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
                Tabel Core Branch
            </h5>
            <div class="form-actions float-right">
                <a href="{{ url('/core_branch/add') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah
                    Core Branch</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" style="width:100%"
                    class="table table-striped table-bordered table-hover table-full-width">
                    <thead>
                        <tr>
                            <th width="2%" style='text-align:center'>No</th>
                            <th width="15%" style='text-align:center'>Kode Branch</th>
                            <th width="15%" style='text-align:center'>Nama Branch</th>
                            <th width="15%" style='text-align:center'>Alamat Branch</th>
                            <th width="15%" style='text-align:center'>Kota Branch</th>
                            <th width="15%" style='text-align:center'>Contact Person</th>
                            <th width="15%" style='text-align:center'>Email</th>
                            <th width="15%" style='text-align:center'>Phone1</th>
                            <th width="15%" style='text-align:center'>Phone2</th>
                            <th width="10%" style='text-align:center'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($core_branch as $data)
                            <tr>
                                <td style='text-align:center'>{{ $no++ }}</td>
                                <td>{{ $data->branch_code }}</td>
                                <td>{{ $data->branch_name }}</td>
                                <td>{{ $data->branch_address }}</td>
                                <td>{{ $data->branch_city }}</td>
                                <td>{{ $data->branch_contact_person }}</td>
                                <td>{{ $data->branch_email }}</td>
                                <td>{{ $data->branch_phone1 }}</td>
                                <td>{{ $data->branch_phone2 }}</td>
                                <td class="text-center">
                                    <a type="button" class="btn btn-outline-warning btn-sm mb-2"
                                        href="{{ route('core_branch.update', $data->branch_id) }}">Edit</a>
                                    <form action="{{ route('core_branch.delete', $data->branch_id) }}" method="post">
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
