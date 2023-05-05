<?php
include '../Controller/queryData.php';

?>
<div class="page-heading pt-4">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Menyurat</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surat Menyurat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="akun-judul card-title d-inline-block">Surat Menyurat</h5>
        </div>
        <div class="card-body">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <select name="surats" id="surats" class="form-select surats">
                            <option value="" selected disabled>--Pilih Surat--</option>
                            <?php
                            $surats = querySurats();
                            foreach ($surats as $surat) {
                            ?>
                                <option value="<?= $surat['id'] ?>"><?= $surat['nama_surat']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Surat Kelahiran Start -->
                        <div class="card-content" id="surat_kelahiran">
                            <div class="card-body">
                                <form action="../Controller/simpan_surat_kelahiran.php" class="form" method="POST">
                                    <input type="hidden" name="id_surat" value="">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama_kk" class="form-label">Nama Kepala Keluarga</label>
                                                <input type="text" id="nama_kk" class="form-control" placeholder="Nama Kepala Keluarga" name="nama_kk" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="no_kk" class="form-label">No. KK</label>
                                                <input type="number" id="no_kk" class="form-control" min="0" placeholder="Masukkan No. KK" name="no_kk" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Bayi / Anak</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama_anak" class="form-label">Nama Anak</label>
                                                <input type="text" id="nama_anak" class="form-control" placeholder="Nama Anak" name="nama_anak" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jenis_kelamin_anak" class="form-label">Jenis Kelamin</label>
                                                <select name="jenis_kelamin_anak" id="jenis_kelamin_anak" class="form-select" required>
                                                    <option value="" selected disabled>--Jenis Kelamin--</option>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_dilahirkan" class="form-label">Tempat Dilahirkan</label>
                                                <input type="text" id="tempat_dilahirkan" class="form-control" placeholder="Tempat Dilahirkan" name="tempat_dilahirkan" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_kelahiran" class="form-label">Tempat Kelahiran</label>
                                                <input type="text" id="tempat_kelahiran" class="form-control" placeholder="Tempat Kelahiran" name="tempat_kelahiran" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="hari" class="form-label">Hari</label>
                                                <select name="hari" id="hari" class="form-select" required>
                                                    <option value="" selected disabled>--Hari--</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jumat">Jumat</option>
                                                    <option value="Sabtu">Sabtu</option>
                                                    <option value="Minggu">Minggu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jam" class="form-label">Pukul</label>
                                                <input type="time" id="jam" class="form-control" placeholder="Jam" name="jam" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jenis_kelahiran" class="form-label">Jenis Kelahiran</label>
                                                <input type="text" id="jenis_kelahiran" class="form-control" placeholder="Jenis Kelahiran" name="jenis_kelahiran" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kelahiran_ke" class="form-label">Kelahiran Ke</label>
                                                <input type="number" id="kelahiran_ke" class="form-control" placeholder="Kelahiran Ke" name="kelahiran_ke" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="penolong_kelahiran" class="form-label">Penolong Kelahiran</label>
                                                <input type="text" id="penolong_kelahiran" class="form-control" placeholder="Penolong Kelahiran" name="penolong_kelahiran" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="berat_bayi" class="form-label">Berat Bayi</label>
                                                <input type="number" id="berat_bayi" class="form-control" placeholder="Berat Bayi / Anak" name="berat_bayi" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="panjang_bayi" class="form-label">Panjang Bayi</label>
                                                <input type="number" id="panjang_bayi" class="form-control" placeholder="Panjang Bayi / Anak" name="panjang_bayi" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Ibu</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_ibu" class="form-label">NIK</label>
                                                <input type="text" id="nik_ibu" class="form-control" placeholder="Masukkan NIK" name="nik_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama_ibu" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="nama_ibu" class="form-control" placeholder="Nama Lengkap" name="nama_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir_ibu" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir_ibu" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_ibu" class="form-label">Umur</label>
                                                <input type="number" id="umur_ibu" class="form-control" placeholder="Umur" name="umur_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan" name="pekerjaan_ibu" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_ibu" class="form-label">Alamat</label>
                                                <input type="text" id="alamat_ibu" class="form-control" placeholder="Masukkan Nama Anak" name="alamat_ibu" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_ibu" class="form-label">RT</label>
                                                <input type="number" id="rt_ibu" class="form-control" placeholder="002" name="rt_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_ibu" class="form-label">RW</label>
                                                <input type="number" id="rw_ibu" class="form-control" placeholder="Masukkan Tempat Lahir" name="rw_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_ibu" class="form-label">Desa</label>
                                                <input type="text" id="desa_ibu" class="form-control" placeholder="Masukkan Desa" name="desa_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_ibu" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_ibu" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota_ibu" class="form-label">Kota</label>
                                                <input type="text" id="kota_ibu" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kewarganegaraan_ibu" class="form-label">Kewarganegaraan</label>
                                                <input type="text" id="kewarganegaraan_ibu" class="form-control" placeholder="Masukkan Kab/Kota" name="kewarganegaraan_ibu" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kebangsaan_ibu" class="form-label">Kebangsaan</label>
                                                <input type="text" id="kebangsaan_ibu" class="form-control" placeholder="Masukkan Kab/Kota" name="kebangsaan_ibu" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_pencatatan_perkawinan_ibu" class="form-label">Tanggal Pencatatan Perkawinan</label>
                                                <input type="date" id="tanggal_pencatatan_perkawinan_ibu" class="form-control" placeholder="Masukkan Kab/Kota" name="tanggal_pencatatan_perkawinan_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Ayah</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_ayah" class="form-label">NIK</label>
                                                <input type="number" id="nik_ayah" class="form-control" placeholder="Masukkan NIK" name="nik_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama_ayah" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="nama_ayah" class="form-control" placeholder="Nama Lengkap" name="nama_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir_ayah" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir_ayah" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_ayah" class="form-label">Umur</label>
                                                <input type="number" id="umur_ayah" class="form-control" placeholder="Umur" name="umur_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan" name="pekerjaan_ayah" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_ayah" class="form-label">Alamat</label>
                                                <input type="text" id="alamat_ayah" class="form-control" placeholder="Alamat" name="alamat_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_ayah" class="form-label">RT</label>
                                                <input type="number" id="rt_ayah" class="form-control" placeholder="002" name="rt_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_ayah" class="form-label">RW</label>
                                                <input type="number" id="rw_ayah" class="form-control" placeholder="Masukkan Tempat Lahir" name="rw_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_ayah" class="form-label">Desa</label>
                                                <input type="text" id="desa_ayah" class="form-control" placeholder="Masukkan Desa" name="desa_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_ayah" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_ayah" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota_ayah" class="form-label">Kota</label>
                                                <input type="text" id="kota_ayah" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kewarganegaraan_ayah" class="form-label">Kewarganegaraan</label>
                                                <input type="text" id="kewarganegaraan_ayah" class="form-control" placeholder="WNI" name="kewarganegaraan_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kebangsaan_ayah" class="form-label">Kebangsaan</label>
                                                <input type="text" id="kebangsaan_ayah" class="form-control" placeholder="Kebangsaan" name="kebangsaan_ayah" data-parsley-required="true">
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Pelapor</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_pelapor" class="form-label">NIK</label>
                                                <input type="number" id="nik_pelapor" class="form-control" placeholder="Masukkan NIK" name="nik_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama_pelapor" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="nama_pelapor" class="form-control" placeholder="Nama Lengkap" name="nama_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir_pelapor" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir_pelapor" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_pelapor" class="form-label">Umur</label>
                                                <input type="number" id="umur_pelapor" class="form-control" placeholder="Umur" name="umur_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="pekerjaan_pelapor" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_pelapor" class="form-control" placeholder="Pekerjaan" name="pekerjaan_pelapor" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_pelapor" class="form-label">Alamat</label>
                                                <input type="text" id="alamat_pelapor" class="form-control" placeholder="Alamat" name="alamat_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_pelapor" class="form-label">RT</label>
                                                <input type="number" id="rt_pelapor" class="form-control" placeholder="002" name="rt_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_pelapor" class="form-label">RW</label>
                                                <input type="number" id="rw_pelapor" class="form-control" placeholder="007" name="rw_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_pelapor" class="form-label">Desa</label>
                                                <input type="text" id="desa_pelapor" class="form-control" placeholder="Masukkan Desa" name="desa_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_pelapor" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_pelapor" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota_pelapor" class="form-label">Kota</label>
                                                <input type="text" id="kota_pelapor" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Saksi 1</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_saksi1" class="form-label">NIK</label>
                                                <input type="number" id="nik_saksi1" class="form-control" placeholder="Masukkan NIK" name="nik_saksi1" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama_saksi1" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="nama_saksi1" class="form-control" placeholder="Nama Lengkap" name="nama_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir_saksi1" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir_saksi1" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_saksi1" class="form-label">Umur</label>
                                                <input type="number" id="umur_saksi1" class="form-control" placeholder="Umur" name="umur_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="pekerjaan_saksi1" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_saksi1" class="form-control" placeholder="Pekerjaan" name="pekerjaan_saksi1" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_saksi1" class="form-label">Alamat</label>
                                                <input type="text" id="alamat_saksi1" class="form-control" placeholder="Alamat" name="alamat_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_saksi1" class="form-label">RT</label>
                                                <input type="number" id="rt_saksi1" class="form-control" placeholder="002" name="rt_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_saksi1" class="form-label">RW</label>
                                                <input type="number" id="rw_saksi1" class="form-control" placeholder="004" name="rw_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_saksi1" class="form-label">Desa</label>
                                                <input type="text" id="desa_saksi1" class="form-control" placeholder="Masukkan Desa" name="desa_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_saksi1" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_saksi1" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota_saksi1" class="form-label">Kota</label>
                                                <input type="text" id="kota_saksi1" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Saksi 2</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_saksi2" class="form-label">NIK</label>
                                                <input type="number" id="nik_saksi2" class="form-control" placeholder="Masukkan NIK" name="nik_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama_saksi2" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="nama_saksi2" class="form-control" placeholder="Nama Lengkap" name="nama_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir_saksi2" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir_saksi2" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_saksi2" class="form-label">Umur</label>
                                                <input type="number" id="umur_saksi2" class="form-control" placeholder="Umur" name="umur_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="pekerjaan_saksi2" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_saksi2" class="form-control" placeholder="Pekerjaan" name="pekerjaan_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_saksi2" class="form-label">Alamat</label>
                                                <input type="text" id="alamat_saksi2" class="form-control" placeholder="Alamat" name="alamat_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_saksi2" class="form-label">RT</label>
                                                <input type="number" id="rt_saksi2" class="form-control" placeholder="002" name="rt_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_saksi2" class="form-label">RW</label>
                                                <input type="number" id="rw_saksi2" class="form-control" placeholder="007" name="rw_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_saksi2" class="form-label">Desa</label>
                                                <input type="text" id="desa_saksi2" class="form-control" placeholder="Masukkan Desa" name="desa_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_saksi2" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_saksi2" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota_saksi2" class="form-label">Kota</label>
                                                <input type="text" id="kota_saksi2" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Surat Kelahiran End -->


                        <!-- Surat Kematian Start -->
                        <div class="card-content" id="surat_kematian" style="display:none;">
                            <div class="card-body">
                                <h4 class="card-title">Data Pribadi</h4>
                                <form action="../Controller/simpan_surat_kematian.php" class="form" method="POST">
                                    <input type="hidden" name="id_surat" value="">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama" name="nama" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="number" id="nik" class="form-control" placeholder="Masukkan NIK" name="nik" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <select class="form-control" name="jenis_kelamin" id="">
                                                    <option value="" selected disabled>--Pilih--</option>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="agama" class="form-label">Agama</label>
                                                <input type="text" id="agama" class="form-control" placeholder="Masukkan Agama" name="agama" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="dusun" class="form-label">Dusun</label>
                                                <input type="text" id="dusun" class="form-control" placeholder="Masukkan Dusun" name="dusun" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt" class="form-label">RT</label>
                                                <input type="number" id="rt" class="form-control" placeholder="002" name="rt" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="number" id="rw" class="form-control" placeholder="Masukkan Tempat Lahir" name="rw" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa" class="form-label">Desa</label>
                                                <input type="text" id="desa" class="form-control" placeholder="Masukkan Desa" name="desa" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota" class="form-label">Kota</label>
                                                <input type="text" id="kota" class="form-control" placeholder="Masukkan Kab/Kota" name="kota" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jalan" class="form-label">Jalan</label>
                                                <textarea class="form-control" name="jalan" id="" cols="10" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Surat</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_meninggal" class="form-label">Tanggal Meninggal</label>
                                                <input type="date" id="tanggal_meninggal" class="form-control" placeholder="Keperluan" name="tanggal_meninggal" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jam_meninggal" class="form-label">Jam Meninggal</label>
                                                <input type="time" id="jam_meninggal" class="form-control" placeholder="Nama Ibu" name="jam_meninggal" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mandatory">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <textarea name="keterangan" class="form-control" id="keterangan" cols="50" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- Surat Kematian End -->

                        <!-- Surat Pengantar Warga Start -->
                        <div class="card-content" id="surat_pengantar_warga" style="display:none;">
                            <div class="card-body">
                                <h4 class="card-title">Data Pribadi</h4>
                                <form action="../Controller/simpan_surat_pengantar_warga.php" class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama" name="nama" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="number" id="nik" class="form-control" placeholder="Masukkan NIK" name="nik" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <select class="form-control" name="jenis_kelamin" id="">
                                                    <option value="" selected disabled>--Pilih--</option>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="agama" class="form-label">Agama</label>
                                                <input type="text" id="agama" class="form-control" placeholder="Masukkan Agama" name="agama" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="dusun" class="form-label">Dusun</label>
                                                <input type="text" id="dusun" class="form-control" placeholder="Masukkan Dusun" name="dusun" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt" class="form-label">RT</label>
                                                <input type="number" id="rt" class="form-control" placeholder="002" name="rt" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="number" id="rw" class="form-control" placeholder="Masukkan Tempat Lahir" name="rw" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa" class="form-label">Desa</label>
                                                <input type="text" id="desa" class="form-control" placeholder="Masukkan Desa" name="desa" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota" class="form-label">Kota</label>
                                                <input type="text" id="kota" class="form-control" placeholder="Masukkan Kab/Kota" name="kota" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jalan" class="form-label">Jalan</label>
                                                <textarea class="form-control" name="jalan" id="" cols="10" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Surat</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="keperluan" class="form-label">Keperluan</label>
                                                <input type="text" id="keperluan" class="form-control" placeholder="Keperluan" name="keperluan" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="masa_berlaku" class="form-label">Masa Berlaku</label>
                                                <input type="date" id="masa_berlaku" class="form-control" placeholder="Nama Ibu" name="masa_berlaku" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- Surat Pengantar Warga End -->

                        <!-- Surat Pengantar Dinas Start -->
                        <div class="card-content" id="surat_pengantar_dinas" style="display:none;">
                            <div class="card-body">
                                <h4 class="card-title">Data Pribadi</h4>
                                <form action="../Controller/simpan_surat_pengantar_dinas.php" class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama" name="nama" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="number" id="nik" class="form-control" placeholder="Masukkan NIK" name="nik" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <select class="form-control" name="jenis_kelamin" id="">
                                                    <option value="" selected disabled>--Pilih--</option>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="agama" class="form-label">Agama</label>
                                                <input type="text" id="agama" class="form-control" placeholder="Masukkan Agama" name="agama" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="dusun" class="form-label">Dusun</label>
                                                <input type="text" id="dusun" class="form-control" placeholder="Masukkan Dusun" name="dusun" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt" class="form-label">RT</label>
                                                <input type="number" id="rt" class="form-control" placeholder="002" name="rt" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="number" id="rw" class="form-control" placeholder="Masukkan Tempat Lahir" name="rw" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa" class="form-label">Desa</label>
                                                <input type="text" id="desa" class="form-control" placeholder="Masukkan Desa" name="desa" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota" class="form-label">Kota</label>
                                                <input type="text" id="kota" class="form-control" placeholder="Masukkan Kab/Kota" name="kota" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jalan" class="form-label">Jalan</label>
                                                <textarea class="form-control" name="jalan" id="" cols="10" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Surat</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="keperluan" class="form-label">Keperluan</label>
                                                <input type="text" id="keperluan" class="form-control" placeholder="Keperluan" name="keperluan" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="masa_berlaku" class="form-label">Masa Berlaku</label>
                                                <input type="date" id="masa_berlaku" class="form-control" placeholder="Nama Ibu" name="masa_berlaku" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- Surat Pengantar Dinas End -->

                        <!-- Surat Pindah Start -->
                        <div class="card-content" id="surat_pindah" style="display:none;">
                            <div class="card-body">
                                <h4 class="card-title">Data Pribadi</h4>
                                <form action="../Controller/simpan_surat_pindah.php" class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama" name="nama" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="number" id="nik" class="form-control" placeholder="Masukkan NIK" name="nik" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <select class="form-control" name="jenis_kelamin" id="">
                                                    <option value="" selected disabled>--Pilih--</option>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="agama" class="form-label">Agama</label>
                                                <input type="text" id="agama" class="form-control" placeholder="Masukkan Agama" name="agama" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="dusun" class="form-label">Dusun</label>
                                                <input type="text" id="dusun" class="form-control" placeholder="Masukkan Dusun" name="dusun" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt" class="form-label">RT</label>
                                                <input type="number" id="rt" class="form-control" placeholder="002" name="rt" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="number" id="rw" class="form-control" placeholder="Masukkan Tempat Lahir" name="rw" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa" class="form-label">Desa</label>
                                                <input type="text" id="desa" class="form-control" placeholder="Masukkan Desa" name="desa" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota" class="form-label">Kota</label>
                                                <input type="text" id="kota" class="form-control" placeholder="Masukkan Kab/Kota" name="kota" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jalan" class="form-label">Jalan</label>
                                                <textarea class="form-control" name="jalan" id="" cols="10" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Surat</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="keperluan" class="form-label">Keperluan</label>
                                                <input type="text" id="keperluan" class="form-control" placeholder="Keperluan" name="keperluan" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="no_kk" class="form-label">No KK</label>
                                                <input type="text" id="no_kk" class="form-control" placeholder="Keperluan" name="no_kk" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama_kk" class="form-label">Nama KK</label>
                                                <input type="text" id="nama_kk" class="form-control" placeholder="Keperluan" name="nama_kk" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_sekarang" class="form-label">Alamat Sekarang</label>
                                                <textarea name="alamat_sekarang" id="alamat_sekarang" cols="50" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_tujuan" class="form-label">Alamat Tujuan</label>
                                                <textarea name="alamat_tujuan" id="alamat_tujuan" cols="50" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <textarea name="keterangan" id="keterangan" cols="50" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- Surat Pindah End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>