@extends('adminlte::page')

@section('title', 'Edit Kode Simpanan | AdminLTE')

@section('content')
    <div class="card border border-dark mt-5">
        <div class="card-header bg-dark clearfix">
            <h5 class="mb-0 float-left">Edit Data Kode Simpanan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('AcctSavings.prosesupdate', $acct_savings->savings_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="savings_code">Kode Simpanan <span class="text-danger">*</span></label>
                            <input type="text" name="savings_code" class="form-control" value="{{ old('savings_code', $acct_savings->savings_code) }}">
                            @error('savings_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="savings_name">Nama Simpanan <span class="text-danger">*</span></label>
                            <input type="text" name="savings_name" class="form-control" value="{{ old('savings_name', $acct_savings->savings_name) }}">
                            @error('savings_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account_id">Nomor Perkiraan</label>
                            <select name="account_id" class="form-control">
                                <option value="" selected disabled>Pilih Nomor Perkiraan</option>
                                @foreach ($acct_account as $account)
                                    <option value="{{ $account->account_id }}" {{ old('account_id', $acct_savings->account_id) == $account->id ? 'selected' : '' }}>
                                        {{ $account->account_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('account_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="savings_profit_sharing">Bagi Hasil</label>
                            <input type="number" step="any" name="savings_profit_sharing" class="form-control" value="{{ old('savings_profit_sharing', $acct_savings->savings_profit_sharing) }}">
                            @error('savings_profit_sharing')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account_basil_id">Nomor Perkiraan Hasil</label>
                            <select name="account_basil_id" class="form-control">
                                <option value="" selected disabled>Pilih Nomor Perkiraan Hasil</option>
                                @foreach ($acct_account as $account)
                                    <option value="{{ $account->account_id }}" {{ old('account_basil_id', $acct_savings->account_basil_id) == $account->id ? 'selected' : '' }}>
                                        {{ $account->account_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('account_basil_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="savings_nisbah">Nisbah <span class="text-danger">*</span></label>
                            <input type="number" step="any" name="savings_nisbah" class="form-control" value="{{ old('savings_nisbah', $acct_savings->savings_nisbah) }}">
                            @error('savings_nisbah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="savings_basil">Bagi Hasil <span class="text-danger">*</span></label>
                            <input type="number" step="any" name="savings_basil" class="form-control" value="{{ old('savings_basil', $acct_savings->savings_basil) }}">
                            @error('savings_basil')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
        console.log('Edit form loaded');
    </script>
@stop
