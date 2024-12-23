@extends('adminlte::page')

@section('title', 'Update Calon Anggota | AdminLTE')
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
    <div class="card">
        <div class="card-header bg-dark clearfix">
            <h5 class="mb-0 float-left">
                Tabel Update Calon Anggota
            </h5>
        </div>
        <div class="card-body">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Anggota</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Sifat</th>
                                    <th>No Telp</th>
                                    <th>Simp Pokok</th>
                                    <th>Simp Khusus</th>
                                    <th>Simp Wajib</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($core_member as $data)
                                    <tr>
                                        <td style='text-align:center'>{{ $no++ }}</td>
                                        <td>{{ $data->member_no }}</td>
                                        <td>{{ $data->member_name }}</td>
                                        <td>{{ $data->member_address }}</td>
                                        <td>{{ $memberstatus[$data->member_status] }}</td>
                                        <td>{{ $membercharacter[$data->member_character] }}</td>
                                        <td>{{ $data->member_phone }}</td>
                                        <td>{{ $data->saldo_pokok_old }}</td>
                                        <td>{{ $data->saldo_khusus_old }}</td>
                                        <td>{{ $data->saldo_wajib_old }}</td>
                                        <td class="text-center">
                                            @if ($data->member_status != 1)
                                            <form action="{{ route('core_member_status.update_status', $data->member_id) }}"
                                                method="post">
                                                @csrf
                                                <button class="btn btn-outline-warning btn-sm">Update</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
