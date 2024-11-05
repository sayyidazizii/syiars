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
                        <th>No Anggota</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Sifat</th>
                        <th>No. Telp</th>
                        <th>Simp Pokok</th>
                        <th>Simp Khusus</th>
                        <th>Simp Wajib</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
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
