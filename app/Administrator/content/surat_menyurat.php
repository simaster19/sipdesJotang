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
            <?php
            if ($_GET['pesan'] == "berhasil") {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Permintaan Surat Berhasil Dibuat!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
            ?>
        </div>
        <div class="card-body">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-8">
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
                        <div class="card-content" id="surat_kelahiran" style="display:none;">
                            <div class="card-body">
                                <h4>Form Surat Kelahiran</h4>
                                <hr class="divider mb-5">
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
                                                <input type="number" id="kelahiran_ke" min="1" class="form-control" placeholder="Kelahiran Ke" name="kelahiran_ke" data-parsley-required="true" required>
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
                                                <input type="number" id="berat_bayi" min="0" class="form-control" placeholder="Berat Bayi / Anak" name="berat_bayi" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="panjang_bayi" class="form-label">Panjang Bayi</label>
                                                <input type="number" id="panjang_bayi" min="0" class="form-control" placeholder="Panjang Bayi / Anak" name="panjang_bayi" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Ibu</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_ibu" class="form-label">NIK</label>
                                                <input type="number" id="nik_ibu" class="form-control" placeholder="Masukkan NIK" name="nik_ibu" data-parsley-required="true" required>
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
                                                <label for="tanggal_lahir_ibu" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_ibu" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_ibu" class="form-label">Umur</label>
                                                <input type="number" id="umur_ibu" min="1" class="form-control" placeholder="Umur" name="umur_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan" name="pekerjaan_ibu" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_ibu" class="form-label">Alamat</label>
                                                <textarea name="alamat_ibu" id="alamat_ibu" class="form-control" cols="30" rows="4" placeholder="Alamat Lengkap"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_ibu" class="form-label">RT</label>
                                                <input type="number" id="rt_ibu" class="form-control" min="1" placeholder="002" name="rt_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_ibu" class="form-label">RW</label>
                                                <input type="number" id="rw_ibu" class="form-control" placeholder="005" name="rw_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_ibu" class="form-label">Desa</label>
                                                <input type="text" id="desa_ibu" class="form-control" placeholder="Masukkan Desa" name="desa_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_ibu" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_ibu" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota_ibu" class="form-label">Kota</label>
                                                <input type="text" id="kota_ibu" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kewarganegaraan_ibu" class="form-label">Kewarganegaraan</label>
                                                <input type="text" id="kewarganegaraan_ibu" class="form-control" placeholder="WNI" name="kewarganegaraan_ibu" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kebangsaan_ibu" class="form-label">Kebangsaan</label>
                                                <input type="text" id="kebangsaan_ibu" class="form-control" placeholder="Indonesia" name="kebangsaan_ibu" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_perkawinan_ibu" class="form-label">Tanggal Perkawinan</label>
                                                <input type="date" id="tanggal_perkawinan_ibu" class="form-control" placeholder="Tanggal" name="tanggal_perkawinan_ibu" data-parsley-required="true" required>
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
                                                <label for="tanggal_lahir_ayah" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_ayah" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_ayah" class="form-label">Umur</label>
                                                <input type="number" id="umur_ayah" class="form-control" placeholder="Umur" name="umur_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan" name="pekerjaan_ayah" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_ayah" class="form-label">Alamat</label>
                                                <textarea name="alamat_ayah" id="alamat_ayah" cols="30" rows="4" class="form-control" placeholder="Alamat" required></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_ayah" class="form-label">RT</label>
                                                <input type="number" id="rt_ayah" class="form-control" placeholder="002" name="rt_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_ayah" class="form-label">RW</label>
                                                <input type="number" id="rw_ayah" class="form-control" placeholder="008" name="rw_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_ayah" class="form-label">Desa</label>
                                                <input type="text" id="desa_ayah" class="form-control" placeholder="Masukkan Desa" name="desa_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_ayah" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_ayah" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
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
                                                <input type="text" id="kebangsaan_ayah" class="form-control" placeholder="Indonesia" name="kebangsaan_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Pelapor</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_pelapor" class="form-label">NIK</label>
                                                <input type="number" id="nik_pelapor" min="1" class="form-control" placeholder="Masukkan NIK" name="nik_pelapor" data-parsley-required="true" required>
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
                                                <label for="tanggal_lahir_pelapor" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_pelapor" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_pelapor" class="form-label">Umur</label>
                                                <input type="number" id="umur_pelapor" min="1" class="form-control" placeholder="Umur" name="umur_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_pelapor" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_pelapor" class="form-control" placeholder="Pekerjaan" name="pekerjaan_pelapor" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_pelapor" class="form-label">Alamat</label>
                                                <textarea name="alamat_pelapor" id="alamat_pelapor" cols="30" rows="4" class="form-control" placeholder="Alamat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_pelapor" class="form-label">RT</label>
                                                <input type="number" id="rt_pelapor" class="form-control" placeholder="002" name="rt_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_pelapor" class="form-label">RW</label>
                                                <input type="number" id="rw_pelapor" class="form-control" placeholder="007" name="rw_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_pelapor" class="form-label">Desa</label>
                                                <input type="text" id="desa_pelapor" class="form-control" placeholder="Masukkan Desa" name="desa_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_pelapor" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_pelapor" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
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
                                                <input type="number" id="nik_saksi1" min="1" class="form-control" placeholder="Masukkan NIK" name="nik_saksi1" data-parsley-required="true" required>
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
                                                <label for="tanggal_lahir_saksi1" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_saksi1" class="form-control" placeholder="Umur" name="tanggal_lahir_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_saksi1" class="form-label">Umur</label>
                                                <input type="number" id="umur_saksi1" min="1" class="form-control" placeholder="Umur" name="umur_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_saksi1" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_saksi1" class="form-control" placeholder="Pekerjaan" name="pekerjaan_saksi1" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_saksi1" class="form-label">Alamat</label>
                                                <textarea name="alamat_saksi1" id="alamat_saksi1" cols="30" rows="4" class="form-control" placeholder="Alamat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_saksi1" class="form-label">RT</label>
                                                <input type="number" id="rt_saksi1" min="1" class="form-control" placeholder="002" name="rt_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_saksi1" class="form-label">RW</label>
                                                <input type="number" id="rw_saksi1" min="1" class="form-control" placeholder="004" name="rw_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_saksi1" class="form-label">Desa</label>
                                                <input type="text" id="desa_saksi1" class="form-control" placeholder="Masukkan Desa" name="desa_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_saksi1" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_saksi1" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
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
                                            <div class="form-group">
                                                <label for="nik_saksi2" class="form-label">NIK</label>
                                                <input type="number" id="nik_saksi2" class="form-control" placeholder="Masukkan NIK" name="nik_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_saksi2" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="nama_saksi2" class="form-control" placeholder="Nama Lengkap" name="nama_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_lahir_saksi2" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_saksi2" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur_saksi2" class="form-label">Umur</label>
                                                <input type="number" id="umur_saksi2" min="1" class="form-control" placeholder="Umur" name="umur_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_saksi2" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_saksi2" class="form-control" placeholder="Pekerjaan" name="pekerjaan_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="alamat_saksi2" class="form-label">Alamat</label>
                                                <textarea name="alamat_saksi2" id="alamat_saksi2" cols="30" rows="4" class="form-control" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="rt_saksi2" class="form-label">RT</label>
                                                <input type="number" min="1" id="rt_saksi2" class="form-control" placeholder="002" name="rt_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="rw_saksi2" class="form-label">RW</label>
                                                <input type="number" min="1" id="rw_saksi2" class="form-control" placeholder="007" name="rw_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="desa_saksi2" class="form-label">Desa</label>
                                                <input type="text" id="desa_saksi2" class="form-control" placeholder="Masukkan Desa" name="desa_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="kecamatan_saksi2" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_saksi2" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="kota_saksi2" class="form-label">Kota</label>
                                                <input type="text" id="kota_saksi2" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Surat Kelahiran End -->


                        <!-- Surat Kematian Start -->
                        <div class="card-content" id="surat_kematian" style="display:none;">
                            <div class=" card-body">
                                <h4>Form Surat Kematian</h4>
                                <hr class="divider mb-5">
                                <form action="../Controller/simpan_surat_kematian.php" class="form" method="POST">
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
                                    <h4 class="card-title">Jenazah</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_jenazah" class="form-label">No. NIK</label>
                                                <input type="text" min="1" id="nik_jenazah" class="form-control" placeholder="Masukkan NIK" name="nik_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama_jenazah" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="nama_jenazah" class="form-control" placeholder="Nama Lengkap" name="nama_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jenis_kelamin_jenazah" class="form-label">Jenis Kelamin</label>
                                                <select name="jenis_kelamin_jenazah" id="jenis_kelamin_jenazah" class="form-select" required>
                                                    <option value="" selected disabled>--Jenis Kelamin--</option>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_lahir_jenazah" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_jenazah" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_jenazah" class="form-label">Umur</label>
                                                <input type="number" id="umur_jenazah" min="1" class="form-control" placeholder="Umur" name="umur_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir_jenazah" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir_jenazah" class="form-control" placeholder="Tempat Kelahiran" name="tempat_lahir_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="agama_jenazah" class="form-label">Agama</label>
                                                <input type="text" id="agama_jenazah" class="form-control" placeholder="Agama" name="agama_jenazah" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_jenazah" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_jenazah" class="form-control" placeholder="Pekerjaan" name="pekerjaan_jenazah" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_jenazah" class="form-label">Alamat</label>
                                                <textarea name="alamat_jenazah" id="alamat_jenazah" cols="30" rows="4" class="form-control" placeholder="Alamat" required></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_jenazah" class="form-label">RT</label>
                                                <input type="number" min="1" id="rt_jenazah" class="form-control" placeholder="002" name="rt_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_jenazah" class="form-label">RW</label>
                                                <input type="number" min="1" id="rw_jenazah" class="form-control" placeholder="008" name="rw_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_jenazah" class="form-label">Desa</label>
                                                <input type="text" id="desa_jenazah" class="form-control" placeholder="Masukkan Desa" name="desa_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_jenazah" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_jenazah" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota_jenazah" class="form-label">Kota</label>
                                                <input type="text" id="kota_jenazah" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="anak_ke_jenazah" class="form-label">Anak Ke</label>
                                                <input type="number" id="anak_ke_jenazah" class="form-control" placeholder="Anak Ke" name="anak_ke_jenazah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_kematian" class="form-label">Tanggal Kematian</label>
                                                <input type="date" id="tanggal_kematian" class="form-control" placeholder="Masukkan Kab/Kota" name="tanggal_kematian" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jam_kematian" class="form-label">Pukul</label>
                                                <input type="time" id="jam_kematian" class="form-control" placeholder="Masukkan Kab/Kota" name="jam_kematian" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="sebab_kematian" class="form-label">Sebab Kematian</label>
                                                <input type="text" id="sebab_kematian" class="form-control" placeholder="Masukkan Kab/Kota" name="sebab_kematian" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_kematian" class="form-label">Tempat Kematian</label>
                                                <input type="text" id="tempat_kematian" class="form-control" placeholder="Masukkan Kab/Kota" name="tempat_kematian" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="yang_menerangkan" class="form-label">Yang Menerangkan</label>
                                                <input type="text" id="yang_menerangkan" class="form-control" placeholder="Masukkan Kab/Kota" name="yang_menerangkan" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Ayah</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_pelapor" class="form-label">NIK</label>
                                                <input type="number" id="nik_pelapor" min="1" class="form-control" placeholder="Masukkan NIK" name="nik_pelapor" data-parsley-required="true" required>
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
                                                <label for="tanggal_lahir_ayah" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_ayah" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_ayah" class="form-label">Umur</label>
                                                <input type="number" id="umur_ayah" min="1" class="form-control" placeholder="Umur" name="umur_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan" name="pekerjaan_ayah" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_ayah" class="form-label">Alamat</label>
                                                <textarea name="alamat_ayah" id="alamat_ayah" cols="30" rows="4" class="form-control" placeholder="Alamat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_ayah" class="form-label">RT</label>
                                                <input type="number" id="rt_ayah" class="form-control" placeholder="002" name="rt_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_ayah" class="form-label">RW</label>
                                                <input type="number" id="rw_ayah" class="form-control" placeholder="007" name="rw_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_ayah" class="form-label">Desa</label>
                                                <input type="text" id="desa_ayah" class="form-control" placeholder="Masukkan Desa" name="desa_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_ayah" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_ayah" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota_ayah" class="form-label">Kota</label>
                                                <input type="text" id="kota_ayah" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_ayah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Ibu</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_ibu" class="form-label">NIK</label>
                                                <input type="number" id="nik_ibu" min="1" class="form-control" placeholder="Masukkan NIK" name="nik_ibu" data-parsley-required="true" required>
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
                                                <label for="tanggal_lahir_ibu" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_ibu" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_ibu" class="form-label">Umur</label>
                                                <input type="number" id="umur_ibu" min="1" class="form-control" placeholder="Umur" name="umur_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan" name="pekerjaan_ibu" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_ibu" class="form-label">Alamat</label>
                                                <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="4" class="form-control" placeholder="Alamat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_ibu" class="form-label">RT</label>
                                                <input type="number" id="rt_ibu" class="form-control" placeholder="002" name="rt_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_ibu" class="form-label">RW</label>
                                                <input type="number" id="rw_ibu" class="form-control" placeholder="007" name="rw_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_ibu" class="form-label">Desa</label>
                                                <input type="text" id="desa_ibu" class="form-control" placeholder="Masukkan Desa" name="desa_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_ibu" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_ibu" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota_ibu" class="form-label">Kota</label>
                                                <input type="text" id="kota_ibu" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_ibu" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Data Pelapor</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_pelapor" class="form-label">NIK</label>
                                                <input type="number" id="nik_pelapor" min="1" class="form-control" placeholder="Masukkan NIK" name="nik_pelapor" data-parsley-required="true" required>
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
                                                <label for="tanggal_lahir_pelapor" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_pelapor" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_pelapor" class="form-label">Umur</label>
                                                <input type="number" id="umur_pelapor" min="1" class="form-control" placeholder="Umur" name="umur_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_pelapor" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_pelapor" class="form-control" placeholder="Pekerjaan" name="pekerjaan_pelapor" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_pelapor" class="form-label">Alamat</label>
                                                <textarea name="alamat_pelapor" id="alamat_pelapor" cols="30" rows="4" class="form-control" placeholder="Alamat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_pelapor" class="form-label">RT</label>
                                                <input type="number" id="rt_pelapor" class="form-control" placeholder="002" name="rt_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_pelapor" class="form-label">RW</label>
                                                <input type="number" id="rw_pelapor" class="form-control" placeholder="007" name="rw_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_pelapor" class="form-label">Desa</label>
                                                <input type="text" id="desa_pelapor" class="form-control" placeholder="Masukkan Desa" name="desa_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_pelapor" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_pelapor" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_pelapor" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
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
                                                <input type="number" id="nik_saksi1" min="1" class="form-control" placeholder="Masukkan NIK" name="nik_saksi1" data-parsley-required="true" required>
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
                                                <label for="tanggal_lahir_saksi1" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_saksi1" class="form-control" placeholder="Umur" name="tanggal_lahir_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="umur_saksi1" class="form-label">Umur</label>
                                                <input type="number" id="umur_saksi1" min="1" class="form-control" placeholder="Umur" name="umur_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_saksi1" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_saksi1" class="form-control" placeholder="Pekerjaan" name="pekerjaan_saksi1" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_saksi1" class="form-label">Alamat</label>
                                                <textarea name="alamat_saksi1" id="alamat_saksi1" cols="30" rows="4" class="form-control" placeholder="Alamat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_saksi1" class="form-label">RT</label>
                                                <input type="number" id="rt_saksi1" min="1" class="form-control" placeholder="002" name="rt_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_saksi1" class="form-label">RW</label>
                                                <input type="number" id="rw_saksi1" min="1" class="form-control" placeholder="004" name="rw_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_saksi1" class="form-label">Desa</label>
                                                <input type="text" id="desa_saksi1" class="form-control" placeholder="Masukkan Desa" name="desa_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_saksi1" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_saksi1" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_saksi1" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
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
                                            <div class="form-group">
                                                <label for="nik_saksi2" class="form-label">NIK</label>
                                                <input type="number" id="nik_saksi2" class="form-control" placeholder="Masukkan NIK" name="nik_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_saksi2" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="nama_saksi2" class="form-control" placeholder="Nama Lengkap" name="nama_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_lahir_saksi2" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir_saksi2" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur_saksi2" class="form-label">Umur</label>
                                                <input type="number" id="umur_saksi2" min="1" class="form-control" placeholder="Umur" name="umur_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan_saksi2" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_saksi2" class="form-control" placeholder="Pekerjaan" name="pekerjaan_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="alamat_saksi2" class="form-label">Alamat</label>
                                                <textarea name="alamat_saksi2" id="alamat_saksi2" cols="30" rows="4" class="form-control" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="rt_saksi2" class="form-label">RT</label>
                                                <input type="number" min="1" id="rt_saksi2" class="form-control" placeholder="002" name="rt_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="rw_saksi2" class="form-label">RW</label>
                                                <input type="number" min="1" id="rw_saksi2" class="form-control" placeholder="007" name="rw_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="desa_saksi2" class="form-label">Desa</label>
                                                <input type="text" id="desa_saksi2" class="form-control" placeholder="Masukkan Desa" name="desa_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="kecamatan_saksi2" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_saksi2" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="kota_saksi2" class="form-label">Kota</label>
                                                <input type="text" id="kota_saksi2" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_saksi2" data-parsley-required="true">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Surat Kematian End -->

                        <!-- Surat Pengantar Warga Start -->
                        <div class="card-content" id="surat_pengantar_warga" style="display:none;">
                            <div class="card-body">
                                <h4>Form Surat Pengantar Warga</h4>
                                <hr class="divider mb-5">

                                <form action="../Controller/simpan_surat_pengantar_warga.php" class="form" method="POST">
                                    <input type="hidden" name="id_surat" value="">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="number" id="nik" min="1" class="form-control" placeholder="Masukkan NIK" name="nik" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="no_kk" class="form-label">No. KK</label>
                                                <input type="number" id="no_kk" min="1" class="form-control" placeholder="Masukkan No. KK" name="no_kk" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama" name="nama" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                                <input type="text" id="kewarganegaraan" class="form-control" placeholder="WNI" name="kewarganegaraan" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="agama" class="form-label">Agama</label>
                                                <input type="text" id="agama" class="form-control" placeholder="Masukkan Agama" name="agama" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                <input type="text" id="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan" name="pekerjaan" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" cols="30" rows="4" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt" class="form-label">RT</label>
                                                <input type="number" id="rt" min="1" class="form-control" placeholder="002" name="rt" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="number" id="rw" class="form-control" placeholder="008" name="rw" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa" class="form-label">Desa</label>
                                                <input type="text" id="desa" class="form-control" placeholder="Masukkan Desa" name="desa" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota" class="form-label">Kota</label>
                                                <input type="text" id="kota" class="form-control" placeholder="Masukkan Kab/Kota" name="kota" data-parsley-required="true" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="keperluan" class="form-label">Keperluan</label>
                                                <input type="text" id="keperluan" class="form-control" placeholder="Keperluan name=" keperluan" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="berlaku_tgl" class="form-label">Berlaku Tanggal</label>
                                                <input type="date" id="berlaku_tgl" class="form-control" placeholder="Tanggal Berlaku" name="berlaku_tgl" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="berakhir_tgl" class="form-label">Berakhir Tanggal</label>
                                                <input type="date" id="berakhir_tgl" class="form-control" placeholder="Tanggal Berakhir" name="berakhir_tgl" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control" placeholder="Keterangan"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Surat Pengantar Warga End -->

                        <!-- Surat Pengantar Dinas Start -->
                        <div class="card-content" id="surat_pengantar_dinas" style="display:none;">
                            <div class="card-body">
                                <h4>Form Surat Pengantar Dinas</h4>
                                <hr class="divider mb-5">
                                <form action="../Controller/simpan_surat_pengantar_dinas.php" class="form" method="POST">
                                    <input type="hidden" name="id_surat" value="">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mandatory">
                                                <label for="uraian" class="form-label">Uraian</label>
                                                <textarea name="uraian" id="uraian" class="form-control" cols="30" rows="7" placeholder="Uraian" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jumlah" class="form-label">Jumlah</label>
                                                <input type="text" id="jumlah" class="form-control" placeholder="1 Bendel" name="jumlah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mandatory">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="7" placeholder="Keterangan" required></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- Surat Pengantar Dinas End -->

                        <!-- Surat Pindah Start -->
                        <div class="card-content" id="surat_pindah" style="display:none;">
                            <div class="card-body">
                                <h4 class="card-title">Form Surat Perpindahan Penduduk</h4>
                                <hr class="divider mb-5">
                                <form action="../Controller/simpan_surat_pindah.php" class="form" method="POST">
                                    <input type="hidden" name="id_surat" value="">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="no_kk" class="form-label">No. KK</label>
                                                <input type="number" min="1" id="no_kk" class="form-control" placeholder="Masukkan No KK" name="no_kk" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama_pemohon" class="form-label">Nama Lengkap Pemohon</label>
                                                <input type="text" id="nama_pemohon" class="form-control" placeholder="Nama Lengkap" name="nama_pemohon" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik_pemohon" class="form-label">NIK</label>
                                                <input type="number" id="nik_pemohon" class="form-control" placeholder="Masukkan NIK" name="nik_pemohon" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jenis_permohonan" class="form-label">Jenis Permohonan</label>
                                                <select name="jenis_permohonan" id="jenis_permohonan" class="form-select" required>
                                                    <option value="" selected disabled>--Pilih--</option>
                                                    <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                                                    <option value="Surat Keterangan Pindah Luar Negeri">Surat Keterangan Pindah Luar Negeri</option>
                                                    <option value="Surat Keterangan Tempat Tinggal">Surat Keterangan Tempat Tinggal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt" class="form-label">RT</label>
                                                <input type="number" id="rt" min="1" class="form-control" placeholder="002" name="rt" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="number" min="1" id="rw" class="form-control" placeholder="005" name="rw" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa" class="form-label">Desa</label>
                                                <input type="text" id="desa" class="form-control" placeholder="Masukkan Desa" name="desa" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota" class="form-label">Kota</label>
                                                <input type="text" id="kota" class="form-control" placeholder="Masukkan Kab/Kota" name="kota" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kode_pos" class="form-label">Kode Pos</label>
                                                <input type="number" min="1" id="kode_pos" class="form-control" placeholder="Masukkan Kode POS" name="kode_pos" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <hr class="divider mb-2">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alamat_lengkap_pindah" class="form-label">Alamat Pindah</label>
                                                <textarea name="alamat_lengkap_pindah" id="alamat_lengkap_pindah" cols="30" rows="4" class="form-control" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt_pindah" class="form-label">RT</label>
                                                <input type="number" min="1" id="rt_pindah" class="form-control" placeholder="002" name="rt_pindah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw_pindah" class="form-label">RW</label>
                                                <input type="number" min="1" id="rw_pindah" class="form-control" placeholder="008" name="rw_pindah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa_pindah" class="form-label">Desa</label>
                                                <input type="text" id="desa_pindah" class="form-control" placeholder="Masukkan Desa" name="desa_pindah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan_pindah" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan_pindah" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_pindah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota_pindah" class="form-label">Kota</label>
                                                <input type="text" id="kota_pindah" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_pindah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kode_pos_pindah" class="form-label">Kode Pos</label>
                                                <input type="number" id="kode_pos_pindah" class="form-control" placeholder="Masukkan Kab/Kota" name="kode_pos_pindah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="alasan_pindah" class="form-label">Alasan Pindah</label>
                                                <input type="text" id="alasan_pindah" class="form-control" placeholder="Alasan" name="alasan_pindah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jenis_kepindahan" class="form-label">Jenis Kepindahan</label>
                                                <input type="text" id="jenis_kepindahan" class="form-control" placeholder="Pekerjaan" name="jenis_kepindahan" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="anggota_keluarga_tidak_pindah" class="form-label">Anggota Keluarga Tidak Pindah</label>
                                                <input type="text" id="anggota_keluarga_tidak_pindah" class="form-control" placeholder="Masukkan Isian" name="anggota_keluarga_tidak_pindah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="anggota_keluarga_yang_pindah" class="form-label">Anggota Keluarga Yang Pindah</label>
                                                <input type="text" id="anggota_keluarga_yang_pindah" class="form-control" placeholder="Masukkan Isian" name="anggota_keluarga_yang_pindah" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mandatory">
                                                <label for="daftar_anggota_keluagra_pindah" class="form-label">Daftar Anggota Keluarga Pindah</label>
                                                <button type="button" class="btn btn-success btn-sm rounded-pill tambah-anggota" title="Tambah Anggota"><i class="bi bi-plus"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm rounded-pill d-inline-block hapus-anggota" title="Hapus Anggota"><i class="bi bi-dash"></i></button>
                                            </div>
                                        </div>
                                        <div class="input-anggota">

                                        </div>
                                    </div>
                                    <hr class="divider mb-4">
                                    <h4 class="card-title">Form Surat Untuk Orang Asing</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_sponsor" class="form-label">Nama Sponsor</label>
                                                <input type="text" id="nama_sponsor" class="form-control" placeholder="Sponsor" name="nama_sponsor" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="type_sponsor" class="form-label">Type Sponsor</label>
                                                <input type="text" id="type_sponsor" class="form-control" placeholder="Type Sponsor" name="type_sponsor" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="alamat_sponsor" class="form-label">Alamat</label>
                                                <textarea name="alamat_sponsor" id="alamat_sponsor" class="form-control" cols="30" rows="4" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_itas" class="form-label">No ITAS</label>
                                                <input type="number" id="no_itas" class="form-control" placeholder="No ITAS - ITAP" name="no_itas" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_itas" class="form-label">Tanggal ITAS</label>
                                                <input type="date" id="tanggal_itas" class="form-control" placeholder="No KK" name="tanggal_itas" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="negara_tujuan" class="form-label">Negara Tujuan</label>
                                                <input type="text" id="negara_tujuan" class="form-control" placeholder="Negara Tujuan" name="negara_tujuan" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kode_negara" class="form-label">Kode Negara</label>
                                                <input type="text" id="kode_negara" class="form-control" placeholder="Kode Negara" name="kode_negara" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="alamat_tujuan" class="form-label">Alamat Tujuan</label>
                                                <textarea name="alamat_tujuan" id="alamat_tujuan" class="form-control" cols="30" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
                                                <input type="text" id="penanggung_jawab" class="form-control" placeholder="Penanggung Jawab" name="penanggung_jawab" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="rencana_pindah_tanggal" class="form-label">Rencana Pindah</label>
                                                <input type="date" id="rencana_pindah_tanggal" class="form-control" placeholder="Rencana Pindah" name="rencana_pindah_tanggal" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_hp" class="form-label">No. Handphone</label>
                                                <input type="number" id="no_hp" class="form-control" placeholder="Nomor Handphone" name="no_hp" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="alamat_email" class="form-label">Email</label>
                                                <input type="email" id="alamat_email" class="form-control" placeholder="email@email.com" name="alamat_email" data-parsley-required="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
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