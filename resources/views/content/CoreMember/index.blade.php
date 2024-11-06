@extends('adminlte::page')

@section('title', 'Core Member | AdminLTE')

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
<div class="container">
    <h1>Master Data Anggota <small>Kelola Data Anggota</small></h1>
    <!-- Daftar Section -->
    <div class="card">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            Daftar
            <div>
                <a href="{{ route('core_member.create') }}" class="btn btn-primary">+ Input Data Anggota</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Dusun</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Kode Pos</th>
                        <th>No Telepon</th>
                        <th>Sifat</th>
                        <th>Pekerjaan</th>
                        <th>Identitas</th>
                        <th>Nomor Identitas</th>
                        <th>Ibu Kandung</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($core_member as $data)
                        <tr>
                            <td style='text-align:center'>{{ $no++ }}</td>
                            <td>{{ $data->member_name }}</td>
                            <td>{{ $membergender[$data->member_gender] }}</td>
                            <td>{{ $data->CoreProvince->province_name }}</td>
                            <td>{{ $data->CoreCity->city_name }}</td>
                            <td>{{ $data->CoreKecamatan->kecamatan_name }}</td>
                            <td>{{ $data->CoreKelurahan->kelurahan_name }}</td>
                            <td>{{ $data->CoreDusun->dusun_name }}</td>
                            <td>{{ $data->member_place_of_birth }}</td>
                            <td>{{ $data->member_date_of_birth }}</td>
                            <td>{{ $data->member_address }}</td>
                            <td>{{ $data->member_postal_code }}</td>
                            <td>{{ $data->member_phone }}</td>
                            <td>{{ $membercharacter[$data->member_character] }}</td>
                            <td>{{ $data->member_job }}</td>
                            <td>{{ $memberidentity[$data->member_identity] }}</td>
                            <td>{{ $data->member_identity_no }}</td>
                            <td>{{ $data->member_mother }}</td>
                            <td class="text-center">
                                <a type="button" class="btn btn-outline-warning btn-sm mb-2"
                                    href="{{ route('core_member.update', $data->member_id) }}">Edit</a>
                                <form action="{{ route('core_member.delete', $data->member_id) }}" method="post">
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
