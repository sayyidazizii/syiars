@extends('adminlte::page')

@section('title', 'Master Data Anggota')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        </div>
    </div>
</div>

<!-- Alert Section -->
@if (session('msg'))
<div class="alert alert-{{ session('type') ?? 'info' }} alert-dismissible fade show" role="alert">
    {{ session('msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-header bg-success text-white">
        <h3 class="card-title">Master Data Anggota</h3>
    </div>
    <div class="card-body">
        <!-- Filter Section -->
        <div class="form-group">
            <label for="branch" class="font-weight-bold">Cabang <span class="text-danger">*</span></label>
            <select id="branch" class="form-control" name="branch" onchange="this.form.submit()">
                <option value="" disabled selected>Select</option>
                @foreach ($branches as $branch)
                <option value="{{ $branch->id }}" {{ request('branch') == $branch->id ? 'selected' : '' }}>
                    {{ $branch->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <!-- Sejajarkan tombol "Batal" dan "Cari" di sebelah kanan dengan ikon -->
            <button class="btn btn-danger mr-2">
                <i class="fa fa-times"></i> Batal
            </button>
            <button class="btn btn-success">
                <i class="fa fa-search"></i> Cari
            </button>
        </div>
    <div class="card">
        <div class="card-header bg-success text-white">
            <h3 class="card-title">Master Data Anggota</h3>
        </div>
        <div class="card-body">
            <!-- Filter Section -->
            <div class="form-group">
                <label for="branch" class="font-weight-bold">Cabang <span class="text-danger">*</span></label>
                <select id="branch" class="form-control" name="branch" onchange="this.form.submit()">
                    <option value="">Select</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                    @endforeach
                </select>
               
            </div>
            <div class="d-flex justify-content-end mb-3">
                <!-- Sejajarkan tombol "Batal" dan "Cari" di sebelah kanan dengan ikon -->
                <button class="btn btn-danger mr-2">
                    <i class="fa fa-times"></i> Batal
                </button>
                <button class="btn btn-success">
                    <i class="fa fa-search"></i> Cari
                </button>
            </div>

        <!-- Table Section -->
        <div class="table-responsive mt-3">
            <table class="table table-hover table-bordered" id="dataTable">
                <thead>
                    <tr class="bg-light">
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($core_member as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->member_no }}</td>
                        <td>{{ $data->member_name }}</td>
                        <td>{{ $data->member_address }}</td>
                        <td>{{ $memberstatus[$data->member_status] }}</td>
                        <td>{{ $membercharacter[$data->member_character] }}</td>
                        <td>{{ $data->member_phone }}</td>
                        <td>{{ $data->saldo_pokok_old }}</td>
                        <td>{{ $data->saldo_khusus_old }}</td>
                        <td>{{ $data->saldo_wajib_old }}</td>
                        <td>
                            @if($data->member_status == 1)
                            Aktif
                            @else
                            Tidak Aktif
                            @endif
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" class="text-center">Data tidak tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Export Button -->
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#exportModal">
                <i class="fa fa-file-export"></i> Export Data
            </button>
        </div>

    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<style>
    .form-group label {
        font-weight: bold;
    }

</style>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            autoWidth: false,
            pageLength: 10, // Default number of records per page
            lengthMenu: [5, 10, 25, 50], // Options for 'records'
            language: {
                search: "Search:", // Search input label
                lengthMenu: " _MENU_ records ",
                zeroRecords: "No matching records found",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "No entries available",
                infoFiltered: "(filtered from _MAX_ total entries)",
            },
        });

        setTimeout(() => {
            $('.alert').fadeOut('slow');
        }, 5000);
    });

</script>
@endsection
