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
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalMemberList">
                                        Cari Anggota
                                    </button>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="member_name">Nama Anggota *</label>
                                <input type="text" class="form-control" id="member_name" name="member_name" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="member_character">Sifat Anggota *</label>
                                <input type="text" class="form-control" id="member_character" name="member_character"
                                    readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="province_id">Provinsi *</label>
                                <input type="text" class="form-control" id="province_id" name="province_id" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="city_id">Kabupaten *</label>
                                <input type="text" class="form-control" id="city_id" name="city_id" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kecamatan_id">Kecamatan *</label>
                                <input type="text" class="form-control" id="kecamatan_id" name="kecamatan_id" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kelurahan_id">Kelurahan *</label>
                                <input type="text" class="form-control" id="kelurahan_id" name="kelurahan_id" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="dusun_id">Dusun *</label>
                                <input type="text" class="form-control" id="dusun_id" name="dusun_id" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="member_address">Alamat *</label>
                                <textarea class="form-control" id="member_address" name="member_address" readonly></textarea>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="saldo_pokok_old">Saldo Simp Pokok</label>
                                <input type="number" class="form-control" id="saldo_pokok_old" name="saldo_pokok_old"
                                    value="0.00" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="saldo_khusus_old">Saldo Simp Khusus</label>
                                <input type="number" class="form-control" id="saldo_khusus_old" name="saldo_khusus_old"
                                    value="0.00" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="saldo_wajib_old">Saldo Simp Wajib</label>
                                <input type="number" class="form-control" id="saldo_wajib_old" name="saldo_wajib_old"
                                    value="0.00" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="member_password">Sandi *</label>
                                <input type="text" class="form-control" id="member_password" name="member_password"
                                    readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="member_mandatory_savings">Simpanan Pokok *</label>
                                <input type="number" class="form-control" id="member_mandatory_savings"
                                    name="member_mandatory_savings" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="member_special_savings">Simpanan Khusus *</label>
                                <input type="number" class="form-control" id="member_special_savings"
                                    name="member_special_savings" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="member_principal_savings">Simpanan Wajib *</label>
                                <input type="number" class="form-control" id="member_principal_savings"
                                    name="member_principal_savings" required>
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
    <!-- Modal untuk Daftar Anggota -->
    <div class="modal fade" id="modalMemberList" tabindex="-1" aria-labelledby="modalMemberListLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalMemberListLabel">Daftar Anggota</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Member No</th>
                                <th>Member Nama</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="memberListBody">
                            <!-- Data akan diisi dengan AJAX -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
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
            $('#modalMemberList').on('show.bs.modal', function() {
                loadMemberList();
            });

            function loadMemberList() {
                $.ajax({
                    url: '/api/members',
                    method: 'GET',
                    success: function(data) {
                        let memberListBody = $('#memberListBody');
                        memberListBody.empty();
                        data.forEach(function(member, index) {
                            memberListBody.append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${member.member_no}</td>
                            <td>${member.member_name}</td>
                            <td>${member.member_address}</td>
                            <td>
                                <button
                                type="button"
                                class="btn btn-primary btn-select-member"
                                data-member-no="${member.member_no}"
                                data-member-name="${member.member_name}"
                                data-member-character="${member.member_character}"
                                data-province-id="${member.province ? member.province.province_name : ''}"
                                data-city-id="${member.city ? member.city.city_name : ''}"
                                data-kecamatan-id="${member.kecamatan ? member.kecamatan.kecamatan_name : ''}"
                                data-kelurahan-id="${member.kelurahan ? member.kelurahan.kelurahan_name : ''}"
                                data-dusun-id="${member.dusun ? member.dusun.dusun_name : ''}"
                                data-member-address="${member.member_address}"
                                data-simp-pokok="${member.simp_pokok}"
                                data-simp-khusus="${member.simp_khusus}"
                                data-simp-wajib="${member.simp_wajib}"
                                data-sandi="${member.sandi}"
                                data-simpanan-pokok="${member.simpanan_pokok}"
                                data-simpanan-khusus="${member.simpanan_khusus}"
                                data-simpanan-wajib="${member.simpanan_wajib}">
                                Select
                            </button>

                            </td>
                        </tr>
                    `);
                        });
                    },
                    error: function(error) {
                        console.error('Gagal memuat data anggota:', error);
                        alert('Terjadi kesalahan saat memuat daftar anggota.');
                    },
                });
            }
            $(document).on('click', '.btn-select-member', function() {
                const memberNo = $(this).data('member-no');
                const memberName = $(this).data('member-name');
                const memberCharacter = $(this).data('member-character');
                const provinceId = $(this).data('province-id');
                const cityId = $(this).data('city-id');
                const kecamatanId = $(this).data('kecamatan-id');
                const kelurahanId = $(this).data('kelurahan-id');
                const dusunId = $(this).data('dusun-id');
                const memberAddress = $(this).data('member-address');
                const simpPokok = $(this).data('simp-pokok');
                const simpKhusus = $(this).data('simp-khusus');
                const simpWajib = $(this).data('simp-wajib');
                const sandi = $(this).data('sandi');
                const simpananPokok = $(this).data('simpanan-pokok');
                const simpananKhusus = $(this).data('simpanan-khusus');
                const simpananWajib = $(this).data('simpanan-wajib');
                $('#member_no').val(memberNo);
                $('#member_name').val(memberName);
                $('#member_character').val(memberCharacter);
                $('#province_id').val(provinceId);
                $('#city_id').val(cityId);
                $('#kecamatan_id').val(kecamatanId);
                $('#kelurahan_id').val(kelurahanId);
                $('#dusun_id').val(dusunId);
                $('#member_address').val(memberAddress);
                $('#simp_pokok').val(simpPokok);
                $('#simp_khusus').val(simpKhusus);
                $('#simp_wajib').val(simpWajib);
                $('#sandi').val(sandi);
                $('#simpanan_pokok').val(simpananPokok);
                $('#simpanan_khusus').val(simpananKhusus);
                $('#simpanan_wajib').val(simpananWajib);
                $('#modalMemberList').modal('hide');
            });
        });
    </script>
    <script src="/js/member_form.js"></script>
@stop
