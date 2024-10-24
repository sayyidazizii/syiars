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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="savings_code">Kode Simpanan <span class="text-danger">*</span></label>
                        <input type="text" name="savings_code" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="savings_name">Nama Simpanan <span class="text-danger">*</span></label>
                        <input type="text" name="savings_name" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="savings_number">Nomor Perkiraan</label>
                        <select name="savings_number" class="form-control">
                            <option value="" selected disabled>Select</option>
                            <!-- Add options here -->
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button class="btn btn-success mt-4" type="button" data-toggle="modal"
                            data-target="#modalNomorPerkiraan">
                            + Tambah Nomor Perkiraan Baru
                        </button>

                    </div>
                </div>
                <!-- Modal Tambah Nomor Perkiraan Baru -->
                <div class="modal fade" id="modalNomorPerkiraan" tabindex="-1"
                    aria-labelledby="modalNomorPerkiraanLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <!-- modal-lg untuk lebar ekstra -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalNomorPerkiraanLabel">Nomor Perkiraan Baru</h5>
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formNomorPerkiraan">
                                    <div class="row">
                                        <!-- Nomor Perkiraan -->
                                        <div class="col-md-6 mb-3">
                                            <label for="nomorPerkiraan" class="form-label">Nomor Perkiraan</label>
                                            <input type="text" class="form-control" id="nomorPerkiraan" placeholder="Masukkan Nomor Perkiraan" required>
                                        </div>

                                        <!-- Nama Perkiraan -->
                                        <div class="col-md-6 mb-3">
                                            <label for="namaPerkiraan" class="form-label">Nama Perkiraan</label>
                                            <input type="text" class="form-control" id="namaPerkiraan" placeholder="Masukkan Nama Perkiraan" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Golongan Perkiraan -->
                                        <div class="col-md-6 mb-3">
                                            <label for="golonganPerkiraan" class="form-label">Golongan Perkiraan</label>
                                            <input type="text" class="form-control" id="golonganPerkiraan" placeholder="Masukkan Golongan Perkiraan">
                                        </div>

                                        <!-- Saldo Awal -->
                                        <div class="col-md-6 mb-3">
                                            <label for="saldoAwal" class="form-label">Saldo Awal</label>
                                            <select class="form-select" id="saldoAwal" required>
                                                <option value="debit">Debit</option>
                                                <option value="kredit">Kredit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Kelompok Perkiraan -->
                                        <div class="col-md-12 mb-3">
                                            <label for="kelompokPerkiraan" class="form-label">Kelompok Perkiraan</label>
                                            <select class="form-select" id="kelompokPerkiraan" required>
                                                <option value="NA">NA - Neraca Aktiva</option>
                                                <option value="NP">NP - Neraca Pasiva</option>
                                                <option value="RA">RA - Rugi Laba (A)</option>
                                                <option value="RP">RP - Rugi Laba (B)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="button" class="btn btn-danger me-2" data-dismiss="modal">
                                            <i class="fa fa-times"></i> Tutup
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check"></i> Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="savings_profit_sharing">Bagi Hasil</label>
                        <select name="savings_profit_sharing" class="form-control">
                            <option value="0">Tidak Bagi Hasil</option>
                            <option value="1">Bagi Hasil</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account_basil_id">Nomor Perkiraan Bagi Hasil</label>
                        <select name="account_basil_id" class="form-control">
                            <option value="" selected disabled>Select</option>
                            <!-- Add options here -->
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="savings_nisbah">Nisbah <span class="text-danger">*</span></label>
                        <input type="number" step="any" name="savings_nisbah" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="savings_basil">Bagi Hasil <span class="text-danger">*</span></label>
                        <input type="number" step="any" name="savings_basil" class="form-control" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('AcctSavings.index') }}" class="btn btn-danger">Batal</a>
        </form>
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

    document.getElementById('formNomorPerkiraan').addEventListener('submit', function(event) {
    event.preventDefault();
    // Cek jika form valid
    if (this.checkValidity()) {
        // Lakukan sesuatu setelah validasi berhasil
        alert("Form is valid and ready to submit!");
    } else {
        // Jika ada isian yang belum diisi
        alert("Please fill in all the required fields!");
    }
    });
</script>
@stop
