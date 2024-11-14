@extends('adminlte::page')

@section('title', 'Kode Simpanan Berjangka | AdminLTE')
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
                Tabel Kode Simpanan Berjangka
            </h5>
            <div class="form-actions float-right">
                <a href="{{ route('AcctDeposito.create') }}" class="btn btn-sm btn-info">
                    <i class="fa fa-plus"></i>
                    Tambah Kode Simpanan Berjangka</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" style="width:100%"
                    class="table table-striped table-bordered table-hover table-full-width">
                    <thead>
                        <tr>
                            <th width="2%" style='text-align:center'>No</th>
                            <th width="15%" style='text-align:center'>Kode Berjangka</th>
                            <th width="15%" style='text-align:center'>Nama</th>
                            <th width="15%" style='text-align:center'>No. Perkiraan</th>
                            <th width="15%" style='text-align:center'>Basil</th>
                            <th width="15%" style='text-align:center'>Akun Basil</th>
                            <th width="15%" style='text-align:center'>Jangka Waktu</th>
                            <th width="15%" style='text-align:center'>Bagi Hasil/th</th>
                            <th width="10%" style='text-align:center'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($acct_depositos as $index => $acct_deposito)
                            <tr>
                                <td style='text-align:center'>{{ $index + 1 }}</td>
                                <td style='text-align:center'>{{ $acct_deposito->deposito_code }}</td>
                                <td style='text-align:center'>{{ $acct_deposito->deposito_name }}</td>
                                <td style='text-align:center'>
                                    @if ($acct_deposito->account)
                                        {{ $acct_deposito->account->account_code }} -
                                        {{ $acct_deposito->account->account_name }}
                                    @else
                                        Tidak Ada Akun Terkait
                                    @endif
                                </td>
                                <td style='text-align:center'>{{ $acct_deposito->account_id }}</td>
                                <td style='text-align:center'>
                                    {{ $acct_deposito->account ? $acct_deposito->account->account_name : 'Tidak Ada Akun Terkait' }}
                                </td>
                                <td style='text-align:center'>{{ $acct_deposito->deposito_period }}</td>
                                <td style='text-align:center'>{{ $acct_deposito->deposito_profit_sharing }}</td>
                                <td class="text-center">
                                    <a type="button" class="btn btn-outline-warning btn-sm mb-2"
                                        href="{{ route('AcctDeposito.update', $acct_deposito->deposito_id) }}">Edit</a>
                                    <form action="{{ route('AcctDeposito.delete', $acct_deposito->deposito_id) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" style="text-align:center">Data Deposito tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    @stop @section('css')
    <link rel="stylesheet" href="/css/admin.custom.css">
    @stop @section('js')
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
