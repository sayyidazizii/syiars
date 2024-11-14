@extends('adminlte::page')

@section('title', 'Tambah Kode Simpanan | AdminLTE')
@section('content')
<div class="card border border-dark mt-5">
    <div class="card-header bg-dark clearfix">
        <h5 class="mb-0 float-left">Tambah Kode Simpanan</h5>
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
                        <label for="account_id">Nomor Perkiraan</label>
                        <select name="account_id" class="form-control">
                            <option value="" selected disabled>Select</option>
                            @foreach ($acct_acount as $data)
                                <option value="{{ $data->account_id }}">{{ $data->account_code }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button class="btn btn-success mt-4" type="button" id="addRowBtn">+ Tambah Nomor Perkiraan Baru</button>
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
                            <option value="" selected disabled>Pilih Nama Akun</option>
                            @foreach ($acct_acount as $data)
                                <option value="{{ $data->account_id }}">{{ $data->account_name }}</option>
                            @endforeach
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
    document.getElementById('addRowBtn').addEventListener('click', function () {
        window.location.href = "{{ url('/acct_account/add') }}";
    });

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

    document.getElementById('formNomorPerkiraan').addEventListener('submit', function (event) {
        event.preventDefault();
        if (this.checkValidity()) {
            alert("Form is valid and ready to submit!");
        } else {
            alert("Please fill in all the required fields!");
        }
    });
</script>
@stop
