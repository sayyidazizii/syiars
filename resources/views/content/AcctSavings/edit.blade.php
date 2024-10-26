@extends('adminlte::page')

@section('title', 'Edit Kode Simpanan | AdminLTE')

@section('content_header') < h1 > Edit Data Kode Simpanan</h1>
@stop

@section('content') < div class = "col-md-6" > <div class="box box-primary">
    <form
        action="{{ route('AcctSavings.prosesupdate', $acct_savings->savings_id) }}"
        method="POST">
        @csrf @method('PUT')
        <!-- Untuk metode update -->
        <div class="box-body">
            <div class="form-group">
                <label for="savings_code">Kode Simpanan</label>
                <input
                    type="text"
                    name="savings_code"
                    class="form-control"
                    value="{{ $acct_savings->savings_code }}"></div>
                <div class="form-group">
                    <label for="savings_name">Nama Simpanan</label>
                    <input
                        type="text"
                        name="savings_name"
                        class="form-control"
                        value="{{ $acct_savings->savings_name }}"></div>
                    <div class="form-group">
                        <label for="savings_number">Nomor Perkiraan</label>
                        <input
                            type="text"
                            name="savings_number"
                            class="form-control"
                            value="{{ $acct_savings->savings_number }}"></div>
                        <div class="form-group">
                            <label for="savings_profit_sharing">Bagi Hasil</label>
                            <input
                                type="number"
                                step="any"
                                name="savings_profit_sharing"
                                class="form-control"
                                value="{{ $acct_savings->savings_profit_sharing }}"></div>
                            <div class="form-group">
                                <label for="account_basil_id">Nomor Perkiraan Hasil</label>
                                <input
                                    type="text"
                                    name="account_basil_id"
                                    class="form-control"
                                    value="{{ $acct_savings->account_basil_id }}"></div>
                                <div class="form-group">
                                    <label for="savings_nisbah">Nisbah</label>
                                    <input
                                        type="number"
                                        step="any"
                                        name="savings_nisbah"
                                        class="form-control"
                                        value="{{ $acct_savings->savings_nisbah }}"></div>
                                    <div class="form-group">
                                        <label for="savings_basil">Bagi Hasil</label>
                                        <input
                                            type="number"
                                            step="any"
                                            name="savings_basil"
                                            class="form-control"
                                            value="{{ $acct_savings->savings_basil }}"></div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('AcctSavings.index') }}" class="btn btn-secondary">Batal</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @stop @section('css')
                        <link rel="stylesheet" href="/css/admin.custom.css">
                            @stop @section('js')
                            <script>
                                console.log('Edit form loaded');
                            </script>
                            @stop
