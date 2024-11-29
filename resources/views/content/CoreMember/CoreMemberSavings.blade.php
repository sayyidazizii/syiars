@extends('adminlte::page')

@section('title', 'Edit Anggota | AdminLTE')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('core_member.index') }}">Daftar Anggota</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Anggota</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header bg-success text-white">
            Form Edit
        </div>
        <div class="card-body">
            <form action="{{ route('core_member.store') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="member_no">No. Anggota *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="member_no" name="member_no" readonly>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#anggotaModal">
                                    Cari Anggota
                                </button>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="member_name">Nama Anggota *</label>
                            <input type="text" class="form-control" id="member_name" name="member_name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="member_character">Sifat Anggota *</label>
                            <select class="form-control" id="member_character" name="member_character" required>
                                <option value="">-- Pilih Salah Satu --</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="province_id">Provinsi *</label>
                            <select class="form-control" id="province_id" name="province_id" required>
                                <option value="">-- Pilih Salah Satu --</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="city_id">Kabupaten *</label>
                            <select class="form-control" id="city_id" name="city_id" required>
                                <option value="">-- Pilih Salah Satu --</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="kecamatan_id">Kecamatan *</label>
                            <select class="form-control" id="kecamatan_id" name="kecamatan_id" required>
                                <option value="">-- Pilih Salah Satu --</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="kelurahan_id">Kelurahan *</label>
                            <select class="form-control" id="kelurahan_id" name="kelurahan_id" required>
                                <option value="">-- Pilih Salah Satu --</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dusun_id">Dusun *</label>
                            <select class="form-control" id="dusun_id" name="dusun_id" required>
                                <option value="">-- Pilih Salah Satu --</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="member_address">Alamat *</label>
                            <textarea class="form-control" id="member_address" name="member_address" required></textarea>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="simp_pokok">Saldo Simp Pokok</label>
                            <input type="number" class="form-control" id="simp_pokok" name="simp_pokok" value="0.00" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simp_khusus">Saldo Simp Khusus</label>
                            <input type="number" class="form-control" id="simp_khusus" name="simp_khusus" value="0.00" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simp_wajib">Saldo Simp Wajib</label>
                            <input type="number" class="form-control" id="simp_wajib" name="simp_wajib" value="0.00" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="sandi">Sandi *</label>
                            <select class="form-control" id="sandi" name="sandi" required>
                                <option value="">-- Pilih Salah Satu --</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpanan_pokok">Simpanan Pokok *</label>
                            <input type="number" class="form-control" id="simpanan_pokok" name="simpanan_pokok" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpanan_khusus">Simpanan Khusus *</label>
                            <input type="number" class="form-control" id="simpanan_khusus" name="simpanan_khusus" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="simpanan_wajib">Simpanan Wajib *</label>
                            <input type="number" class="form-control" id="simpanan_wajib" name="simpanan_wajib" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('core_member.index') }}" class="btn btn-danger me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

     <!-- Modal -->

<div class="modal fade" id="anggotaModal" tabindex="-1" aria-labelledby="anggotaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="anggotaModalLabel">Daftar Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Member No</th>
                            <th>Member Nama</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="anggotaTableBody">
                        <!-- Data anggota akan dimuat di sini melalui AJAX -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
   $(document).ready(function () {
    $("#openModalButton").on("click", function () {
        // Tampilkan modal
        $("#anggotaModal").modal("show");

        // Ambil data anggota melalui AJAX
        $.ajax({
            url: "/core-member/data", // URL dari route yang ditambahkan
            method: "GET",
            success: function (response) {
                let rows = "";
                response.data.forEach((anggota, index) => {
                    rows += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${anggota.member_no}</td>
                            <td>${anggota.member_name}</td>
                            <td>${anggota.member_address}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="pilihAnggota('${anggota.member_no}')">Pilih</button>
                            </td>
                        </tr>
                    `;
                });
                $("#anggotaTableBody").html(rows);
            },
            error: function () {
                alert("Gagal memuat data anggota.");
            },
        });
    });
});


// Fungsi untuk menangani tombol "Pilih"
function pilihAnggota(memberNo) {
    // Misalnya, masukkan Member No ke dalam input di form utama
    $("#memberNoInput").val(memberNo);
    $("#anggotaModal").modal("hide"); // Tutup modal
}


</script>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin.custom.css">
@stop

@section('js')
    <script src="/js/member_form.js"></script>
@stop
