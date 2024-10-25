@extends('adminlte::page')

@section('title', 'Acct Deposito Tambah | AdminLTE')
@section('content_header')
<h1>Tambah Data</h1>
@stop
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
<div class="col-md-12">
    <div class="box box-primary">
        <form role="form" method="post" action="{{ route('AcctDeposito.store') }}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="kode berjangka">Kode Berjangka</label>
                    <input type="text" name="deposito_code"
                        class="form-control @error('deposito_code') is-invalid @enderror"
                        value="{{ old('deposito_code') }}" placeholder="Masukkan kode berjangka">
                    @error('deposito_code')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="deposito_name"
                        class="form-control @error('deposito_name') is-invalid @enderror"
                        value="{{ old('deposito_name') }}" placeholder="Masukkan nama deposito">
                    @error('deposito_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no Perkiraan">No Perkiraan</label>
                    <select id="deposito_number" name="deposito_number"
                        class="form-control @error('deposito_number') is-invalid @enderror">
                        <option value="">Pilih nomor deposito</option>
                        <option value="1" {{ old('deposito_number') == '1' ? 'selected' : '' }}>Deposito 1</option>
                        <option value="2" {{ old('deposito_number') == '2' ? 'selected' : '' }}>Deposito 2</option>
                        <option value="3" {{ old('deposito_number') == '3' ? 'selected' : '' }}>Deposito 3</option>
                        <!-- Add more options as needed -->
                    </select>
                    @error('deposito_number')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Button to trigger the modal -->
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addAccountModal"><i class="fa fa-plus"></i> Tambah
                Nomor Perkiraan Baru</button> 
                   

                <!-- Modal -->
                <div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addAccountLabel">Form Tambah Perkiraan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nomorPerkiraan" class="form-label">Nomor Perkiraan</label>
                                            <input type="text" class="form-control" id="nomorPerkiraan"
                                                placeholder="Nomor Perkiraan">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="namaPerkiraan" class="form-label">Nama Perkiraan</label>
                                            <input type="text" class="form-control" id="namaPerkiraan"
                                                placeholder="Nama Perkiraan">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="golonganPerkiraan" class="form-label">Golongan Perkiraan</label>
                                            <input type="text" class="form-control" id="golonganPerkiraan"
                                                placeholder="Golongan Perkiraan">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jenisPerkiraan" class="form-label">Jenis Perkiraan</label>
                                            <select class="form-select" id="jenisPerkiraan">
                                                <option value="debit">Debit</option>
                                                <option value="credit">Kredit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kelompokPerkiraan" class="form-label">Kelompok Perkiraan</label>
                                        <select class="form-select" id="kelompokPerkiraan">
                                            <option value="NA">NA - Neraca Aktiva</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="account_id">Basil</label>
                    <input type="text" name="account_id"
                        class="form-control @error('account_id') is-invalid @enderror"
                        value="{{ old('account_id') }}" placeholder="Masukkan Basil">
                    @error('account_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="akun basil">Akun Basil</label>
                    <select id="account_basil_id" name="account_basil_id"
                        class="form-control @error('account_basil_id') is-invalid @enderror">
                        <option value="">Pilih nomor deposito</option>
                        <option value="1" {{ old('account_basil_id') == '1' ? 'selected' : '' }}>Deposito 1</option>
                        <option value="2" {{ old('account_basil_id') == '2' ? 'selected' : '' }}>Deposito 2</option>
                        <option value="3" {{ old('account_basil_id') == '3' ? 'selected' : '' }}>Deposito 3</option>
                        <!-- Add more options as needed -->
                    </select>
                    @error('account_basil_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="No Perkiraan">Jangka Waktu</label>
                    <input type="text" name="deposito_period"
                        class="form-control @error('deposito_period') is-invalid @enderror"
                        value="{{ old('deposito_period') }}" placeholder="Masukkan jangka waktu">
                    @error('deposito_period')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bagi hasil/th">bagi hasil/th</label>
                    <input type="text" name="deposito_profit_sharing"
                        class="form-control @error('deposito_profit_sharing') is-invalid @enderror"
                        value="{{ old('deposito_profit_sharing') }}" placeholder="Masukkan bagi hasil/th ">
                    @error('deposito_profit_sharing')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin.custom.css">
@stop
@section('js')
<script>
    console.log('Hi!');

</script>
@stop
