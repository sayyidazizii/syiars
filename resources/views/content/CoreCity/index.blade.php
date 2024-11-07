@extends('adminlte::page')

@section('title', 'Core City | AdminLTE')

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
<div class="card border border-dark mt-5">
    <div class="card-header bg-dark clearfix">
        <h5 class="mb-0 float-left">
            Tabel Core City
        </h5>
        <div class="form-actions float-right">
            <a href="{{ route('CoreCity.create') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah
                Core City</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" style="width:100%"
                class="table table-striped table-bordered table-hover table-full-width">
                <thead>
                    <tr>
                        <th width="2%" style='text-align:center'>No</th>
                        <th width="15%" style='text-align:center'>Kode Kota</th>
                        <th width="15%" style='text-align:center'>Nama Provinsi</th>
                        <th width="15%" style='text-align:center'>Kode Provinsi</th>
                        <th width="15%" style='text-align:center'>Nama Kota</th>
                        <th width="15%" style='text-align:center'>Nomor Provinsi</th>
                        <th width="15%" style='text-align:center'>Nomor Kota</th>
                        <th width="10%" style='text-align:center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @forelse($core_city as $data)
                    <tr>
                        <td style='text-align:center'>{{ $no++ }}</td>
                        <td style='text-align:center'>{{ $data->city_code }}</td>
                        <td style='text-align:center'>{{ $data->Province->province_name }}</td>
                        <td style='text-align:center'>{{ $data->Province->province_code }}</td>
                        <td style='text-align:center'>{{ $data->city_name }}</td>
                        <td style='text-align:center'>{{ $data->Province->province_no }}</td>
                        <td style='text-align:center'>{{ $data->city_no }}</td>
                        <td class="text-center">
                        <a type="button" class="btn btn-outline-warning btn-sm mb-2"
                            href="{{ route('CoreCity.update', $data->id) }}">Edit</a>
                        <form action="{{ route('CoreCity.delete', $data->id) }}" method="post">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</button>
                        </form>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align:center">Tidak ada data pengguna</td>
                    </tr>
                    @endforelse
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
    $(document).ready(function () {
        setTimeout(function () {
            $('[class*="alert"]').each(function () {
                $(this).alert('close');
            });
        }, 5000);
    });

    $(document).on('DOMNodeInserted', '[class*="alert"]', function () {
        setTimeout(function () {
            $(this).alert('close');
        }.bind(this), 5000);
    });

</script>
@stop
