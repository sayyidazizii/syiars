@extends('adminlte::page')

@section('title', 'Tambah Nomor Perkiraan | AdminLTE')
@section('content_header')<h1>Tambah Data</h1>
@stop
@section('content')<div class="col-md-6">
        <div class="box box-primary">
            <form role="form" method="post" action="{{ route('acct_account.store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Perkiraan</label>
                        <input type="text" name="account_code" class="form-control" placeholder="Enter Nomor Perkiraan"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perkiraan</label>
                        <input type="text" name="account_name" class="form-control" placeholder="Enter Nama Perkiraan"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Golongan Perkiraan</label>
                        <input type="text" name="account_group" class="form-control"
                            placeholder="Enter Golongan Perkiraan" required="required">
                    </div>
                    <div>
                        {{-- <label class="col-lg-4 col-form-label fw-bold fs-6 required">{{ __('Kelompok Perkiraan') }}</label> --}}
                        <label for="exampleInputEmail1">Kelompok Perkiraan</label>
                        <div class="col-lg-8 fv-row">
                            {{-- <select name="account_type_id" id="account_type_id" aria-label="{{ __('Pilih Kelompok Perkiraan') }}" data-control="select2" data-placeholder="{{ __('Pilih Kelompok Perkiraan') }}" data-allow-clear="true" class="form-select form-select-solid form-select-lg"> --}}
                            <select name="account_type_id" id="account_type_id" class="form-control">
                                {{-- <option value="">{{ __('Pilih') }}</option> --}}
                                @foreach ($kelompokperkiraan as $key => $value)
                                    <option data-kt-flag="{{ $key }}" value="{{ $key }}"
                                        {{ $key === old('account_type_id', '' ?? '') ? 'selected' : '' }}>{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        {{-- <label class="col-lg-4 col-form-label fw-bold fs-6 required">{{ __('Kelompok Perkiraan') }}</label> --}}
                        <label for="exampleInputEmail1">Akun Status</label>
                        <div class="col-lg-8 fv-row">
                            {{-- <select name="account_type_id" id="account_type_id" aria-label="{{ __('Pilih Kelompok Perkiraan') }}" data-control="select2" data-placeholder="{{ __('Pilih Kelompok Perkiraan') }}" data-allow-clear="true" class="form-select form-select-solid form-select-lg"> --}}
                            <select name="account_status" id="account_status" class="form-control">
                                {{-- <option value="">{{ __('Pilih') }}</option> --}}
                                @foreach ($accountstatus as $key => $value)
                                    <option data-kt-flag="{{ $key }}" value="{{ $key }}"
                                        {{ $key === old('account_status', '' ?? '') ? 'selected' : '' }}>{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6 required"></label>
                        <div class="col-lg-8 fv-row">
                            <select name="account_status" id="account_status" data-control="select2" data-allow-clear="true" class="form-select form-select-solid form-select-lg">
                                <option value="1">{{ __('Pilih') }}</option>
                                <option value="0">{{ __('Pilih') }}</option>
                                @foreach ($accountstatus as $key => $value)
                                    <option data-kt-flag="{{ $key }}" value="{{ $key }}" {{ $key === old('account_status', '' ?? '') ? 'selected' :'' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                </div class="box-footer">
                <button type="submit" class="btn btn-primary m-2">Simpan</button>
        </div>
        </form>
    </div>
    </div>
    @stop @section('css')
    <link rel="stylesheet" href="/css/admin.custom.css">
    @stop @section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
