<?php
include '../Controller/queryData.php';
// echo "<pre>";
// querySuratKelahiran();
// echo "</pre>";
?>
<div class="page-heading pt-4">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Kematian</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surat Kematian</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="akun-judul card-title d-inline-block">Surat Kematian</h5>

                <?php
                if ($_GET['pesan'] == "update") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Berhasil Diubah!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                ?>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>

                            <th>No. Surat</th>
                            <th>Nama Surat</th>
                            <th>Nama KK</th>
                            <th>No. KK</th>
                            <th>Ambil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $suratKematian = querySuratKematian();
                        foreach ($suratKematian as $data) {

                            $id = $data['ids'];
                        ?>
                            <tr>

                                <td><?= $data['no_surat'] ?></td>
                                <td><?= $data['nama_surat'] ?></td>
                                <td><?= $data['nama_kk'] ?></td>
                                <td><?= $data['no_kk'] ?></td>
                                <td><?= $data['ambil'] == 'PENDING' ? '<span class="badge bg-warning">' . $data['ambil'] . '</span>' : '<span class="badge bg-success">' . $data['ambil'] . '</span>' ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#ubahSuratKematian<?= $data['ids'] ?>" title="Ubah" class="btn-ubahSuratKematian btn btn-primary rounded-pill"><i class="bi bi-pencil-fill"></i></button>


                                    <a href="content/print/surat_kematian_print.php?id=<?= $data['ids'] ?>" target="_blank"><button type="submit" title="Print" class="btn btn-danger rounded-pill"><i class="bi bi-printer-fill"></i></button></a>
                                    <a href="../Controller/konfirmasi_surat_kematian.php?id=<?= $data['ids'] ?>"><button type="submit" title="Konfirmasi Pengambilan" class="btn btn-success rounded-pill"><i class="bi bi-check"></i></button></a>



                                    <!-- Modal Ubah Surat Kematian -->
                                    <div class="modal modal-lg fade" id="ubahSuratKematian<?= $data['ids'] ?>" tabindex="-1" role="dialog" aria-labelledby="ubahSuratKematianTitle" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl" role="document">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ubahSuratKematianTitle">Ubah Surat Kematian</h5>
                                                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="card-content" id="surat_kematian">
                                                    <div class="card-body">
                                                        <form action="../Controller/update_surat_kematian.php" class="form" method="POST">
                                                            <input type="hidden" name="id_surat" value="">
                                                            <input type="hidden" name="ids" value="<?= $data['ids'] ?>">
                                                            <input type="hidden" name="id_ibu" value="<?= $data['id_ibu'] ?>">
                                                            <input type="hidden" name="id_ayah" value="<?= $data['id_ayah'] ?>">
                                                            <input type="hidden" name="id_pelapor" value="<?= $data['id_pelapor'] ?>">
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nama_kk" class="form-label">Nama Kepala Keluarga</label>
                                                                        <input type="text" id="nama_kk" class="form-control" placeholder="Nama Kepala Keluarga" name="nama_kk" data-parsley-required="true" value="<?= $data['nama_kk'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="no_kk" class="form-label">No. KK</label>
                                                                        <input type="number" id="no_kk" class="form-control" min="0" placeholder="Masukkan No. KK" name="no_kk" data-parsley-required="true" value="<?= $data['no_kk'] ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr class="divider mb-4">
                                                            <h4 class="card-title">Jenazah</h4>
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nik_jenazah" class="form-label">No. NIK</label>
                                                                        <input type="text" id="nik_jenazah" class="form-control" placeholder="NIK" name="nik_jenazah" data-parsley-required="true" value="<?= $data['nik_jenazah'] ?>" required readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nama_jenazah" class="form-label">Nama Lengkap</label>
                                                                        <input type="text" id="nama_jenazah" class="form-control" placeholder="Nama Lengkap" name="nama_jenazah" data-parsley-required="true" value="<?= $data['nama_jenazah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="jenis_kelamin_jenazah" class="form-label">Jenis Kelamin</label>
                                                                        <select name="jenis_kelamin_jenazah" id="jenis_kelamin_jenazah" class="form-select" required>
                                                                            <option value="<?= $data['jenis_kelamin_jenazah'] ?>">--Jenis Kelamin - <?= $data['jenis_kelamin_jenazah'] == 'L' ? 'Laki-Laki' : 'Perempuan'  ?>--</option>
                                                                            <option value="L">Laki-Laki</option>
                                                                            <option value="P">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="tanggal_lahir_jenazah" class="form-label">Tanggal Lahir</label>
                                                                        <input type="date" id="tanggal_lahir_jenazah" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir_jenazah" value="<?= $data['tanggal_lahir_jenazah']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="umur_jenazah" class="form-label">Umur</label>
                                                                        <input type="number" id="umur_jenazah" class="form-control" placeholder="Jam" name="umur_jenazah" value="<?= $data['umur_jenazah']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="tempat_lahir_jenazah" class="form-label">Tempat Lahir</label>
                                                                        <input type="text" id="tempat_lahir_jenazah" class="form-control" placeholder="Jenis Kelahiran" name="tempat_lahir_jenazah" value="<?= $data['tempat_lahir_jenazah']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="agama_jenazah" class="form-label">Agama</label>
                                                                        <input type="text" id="agama_jenazah" class="form-control" placeholder="Agama" name="agama_jenazah" value="<?= $data['agama_jenazah']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="pekerjaan_jenazah" class="form-label">Pekerjaan</label>
                                                                        <input type="text" id="pekerjaan_jenazah" class="form-control" placeholder="Pekerjaan" name="pekerjaan_jenazah" value="<?= $data['pekerjaan_jenazah']  ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="alamat_jenazah" class="form-label">Alamat</label>
                                                                        <textarea name="alamat_jenazah" id="alamat_jenazah" class="form-control" cols="30" rows="4" placeholder="Alamat Lengkap"><?= $data['alamat_jenazah'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rt_jenazah" class="form-label">RT</label>
                                                                        <input type="number" id="rt_jenazah" class="form-control" placeholder="002" name="rt_jenazah" value="<?= $data['rt_jenazah']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rw_jenazah" class="form-label">RW</label>
                                                                        <input type="number" id="rw_jenazah" class="form-control" placeholder="Masukkan Tempat Lahir" name="rw_jenazah" value="<?= $data['rw_jenazah']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="desa_jenazah" class="form-label">Desa</label>
                                                                        <input type="text" id="desa_jenazah" class="form-control" placeholder="Masukkan Desa" name="desa_jenazah" value="<?= $data['desa_jenazah']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kecamatan_jenazah" class="form-label">Kecamatan</label>
                                                                        <input type="text" id="kecamatan_jenazah" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_jenazah" value="<?= $data['kecamatan_jenazah']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kota_jenazah" class="form-label">Kota</label>
                                                                        <input type="text" id="kota_jenazah" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_jenazah" value="<?= $data['kota_jenazah']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="anak_ke_jenazah" class="form-label">Anak Ke</label>
                                                                        <input type="number" id="anak_ke_jenazah" class="form-control" placeholder="Anak Ke" name="anak_ke_jenazah" value="<?= $data['anak_ke_jenazah']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="tanggal_kematian" class="form-label">Tanggal Kematian</label>
                                                                        <input type="date" id="tanggal_kematian" class="form-control" placeholder="Masukkan Kab/Kota" name="tanggal_kematian" value="<?= $data['tanggal_kematian']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="jam_kematian" class="form-label">Pukul</label>
                                                                        <input type="time" id="jam_kematian" class="form-control" placeholder="Masukkan Kab/Kota" name="jam_kematian" value="<?= $data['jam_kematian']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="sebab_kematian" class="form-label">Sebab Kematian</label>
                                                                        <input type="text" id="sebab_kematian" class="form-control" placeholder="Masukkan Kab/Kota" name="sebab_kematian" value="<?= $data['sebab_kematian']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="tempat_kematian" class="form-label">Tempat Kematian</label>
                                                                        <input type="text" id="tempat_kematian" class="form-control" placeholder="Masukkan Kab/Kota" name="tempat_kematian" value="<?= $data['tempat_kematian']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="yang_menerangkan" class="form-label">Yang Menerangkan</label>
                                                                        <input type="text" id="yang_menerangkan" class="form-control" placeholder="Masukkan Kab/Kota" name="yang_menerangkan" value="<?= $data['yang_menerangkan']  ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr class="divider mb-4">
                                                            <h4 class="card-title">Data Ayah</h4>
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nik_ayah" class="form-label">NIK</label>
                                                                        <input type="number" id="nik_ayah" class="form-control" placeholder="Masukkan NIK" name="nik_ayah" data-parsley-required="true" value="<?= $data['nik_ayah'] ?>" required readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nama_ayah" class="form-label">Nama Lengkap</label>
                                                                        <input type="text" id="nama_ayah" class="form-control" placeholder="Nama Lengkap" name="nama_ayah" data-parsley-required="true" value="<?= $data['nama_ayah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="tanggal_lahir_ayah" class="form-label">Tempat Lahir</label>
                                                                        <input type="date" id="tanggal_lahir_ayah" class="form-control" placeholder="Tempat Lahir" name="tanggal_lahir_ayah" value="<?= $data['tanggal_lahir_ayah'] ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="umur_ayah" class="form-label">Umur</label>
                                                                        <input type="number" id="umur_ayah" class="form-control" placeholder="Umur" name="umur_ayah" data-parsley-required="true" value="<?= $data['umur_ayah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                                                                        <input type="text" id="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan" name="pekerjaan_ayah" value="<?= $data['pekerjaan_ayah'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="alamat_ayah" class="form-label">Alamat</label>
                                                                        <textarea name="alamat_ayah" id="alamat_ayah" cols="30" rows="4" class="form-control" placeholder="Alamat" required><?= $data['alamat_ayah'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rt_ayah" class="form-label">RT</label>
                                                                        <input type="number" id="rt_ayah" class="form-control" placeholder="002" name="rt_ayah" data-parsley-required="true" value="<?= $data['rt_ayah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rw_ayah" class="form-label">RW</label>
                                                                        <input type="number" id="rw_ayah" class="form-control" placeholder="008" name="rw_ayah" data-parsley-required="true" value="<?= $data['rw_ayah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="desa_ayah" class="form-label">Desa</label>
                                                                        <input type="text" id="desa_ayah" class="form-control" placeholder="Masukkan Desa" name="desa_ayah" data-parsley-required="true" value="<?= $data['desa_ayah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kecamatan_ayah" class="form-label">Kecamatan</label>
                                                                        <input type="text" id="kecamatan_ayah" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_ayah" value="<?= $data['kecamatan_ayah'] ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kota_ayah" class="form-label">Kota</label>
                                                                        <input type="text" id="kota_ayah" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_ayah" value="<?= $data['kota_ayah'] ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <hr class="divider mb-4">
                                                            <h4 class="card-title">Data Ibu</h4>
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nik_ibu" class="form-label">NIK</label>
                                                                        <input type="text" id="nik_ibu" class="form-control" placeholder="Masukkan NIK" name="nik_ibu" data-parsley-required="true" value="<?= $data['nik_ibu'] ?>" required readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nama_ibu" class="form-label">Nama Lengkap</label>
                                                                        <input type="text" id="nama_ibu" class="form-control" placeholder="Nama Lengkap" name="nama_ibu" data-parsley-required="true" value="<?= $data['nama_ibu'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="tanggal_lahir_ibu" class="form-label">Tanggal Lahir</label>
                                                                        <input type="date" id="tanggal_lahir_ibu" class="form-control" placeholder="Tempat Lahir" name="tanggal_lahir_ibu" data-parsley-required="true" value="<?= $data['tanggal_lahir_ibu'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="umur_ibu" class="form-label">Umur</label>
                                                                        <input type="number" id="umur_ibu" class="form-control" placeholder="Umur" name="umur_ibu" data-parsley-required="true" value="<?= $data['umur_ibu'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                                                                        <input type="text" id="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan" name="pekerjaan_ibu" value="<?= $data['pekerjaan_ibu'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="alamat_ibu" class="form-label">Alamat</label>
                                                                        <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="4" class="form-control" placeholder="Alamat" required><?= $data['alamat_ibu'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rt_ibu" class="form-label">RT</label>
                                                                        <input type="number" id="rt_ibu" class="form-control" placeholder="002" name="rt_ibu" data-parsley-required="true" value="<?= $data['rt_ibu'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rw_ibu" class="form-label">RW</label>
                                                                        <input type="number" id="rw_ibu" class="form-control" placeholder="Masukkan Tempat Lahir" name="rw_ibu" data-parsley-required="true" value="<?= $data['rw_ibu'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="desa_ibu" class="form-label">Desa</label>
                                                                        <input type="text" id="desa_ibu" class="form-control" placeholder="Masukkan Desa" name="desa_ibu" data-parsley-required="true" value="<?= $data['desa_ibu'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kecamatan_ibu" class="form-label">Kecamatan</label>
                                                                        <input type="text" id="kecamatan_ibu" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_ibu" data-parsley-required="true" value="<?= $data['kecamatan_ibu'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kota_ibu" class="form-label">Kota</label>
                                                                        <input type="text" id="kota_ibu" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_ibu" data-parsley-required="true" value="<?= $data['kota_ibu'] ?>" required>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <hr class="divider mb-4">
                                                            <h4 class="card-title">Data Pelapor</h4>
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nik_pelapor" class="form-label">NIK</label>
                                                                        <input type="number" id="nik_pelapor" class="form-control" placeholder="Masukkan NIK" name="nik_pelapor" data-parsley-required="true" value="<?= $data['nik_pelapor'] ?>" required readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nama_pelapor" class="form-label">Nama Lengkap</label>
                                                                        <input type="text" id="nama_pelapor" class="form-control" placeholder="Nama Lengkap" name="nama_pelapor" data-parsley-required="true" value="<?= $data['nama_pelapor'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="tanggal_lahir_pelapor" class="form-label">Tanggal Lahir</label>
                                                                        <input type="date" id="tanggal_lahir_pelapor" class="form-control" placeholder="Umur" name="tanggal_lahir_pelapor" value="<?= $data['tanggal_lahir_pelapor'] ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="umur_pelapor" class="form-label">Umur</label>
                                                                        <input type="number" id="umur_pelapor" class="form-control" placeholder="Umur" name="umur_pelapor" data-parsley-required="true" value="<?= $data['umur_pelapor'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="pekerjaan_pelapor" class="form-label">Pekerjaan</label>
                                                                        <input type="text" id="pekerjaan_pelapor" class="form-control" placeholder="Pekerjaan" name="pekerjaan_pelapor" value="<?= $data['pekerjaan_pelapor'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="alamat_pelapor" class="form-label">Alamat</label>
                                                                        <textarea name="alamat_pelapor" id="alamat_pelapor" cols="30" rows="4" class="form-control" placeholder="Alamat" required><?= $data['alamat_pelapor'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rt_pelapor" class="form-label">RT</label>
                                                                        <input type="number" id="rt_pelapor" class="form-control" placeholder="002" name="rt_pelapor" data-parsley-required="true" value="<?= $data['rt_pelapor'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rw_pelapor" class="form-label">RW</label>
                                                                        <input type="number" id="rw_pelapor" class="form-control" placeholder="007" name="rw_pelapor" data-parsley-required="true" value="<?= $data['rw_pelapor'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="desa_pelapor" class="form-label">Desa</label>
                                                                        <input type="text" id="desa_pelapor" class="form-control" placeholder="Masukkan Desa" name="desa_pelapor" data-parsley-required="true" value="<?= $data['desa_pelapor'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kecamatan_pelapor" class="form-label">Kecamatan</label>
                                                                        <input type="text" id="kecamatan_pelapor" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_pelapor" data-parsley-required="true" value="<?= $data['kecamatan_pelapor'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kota_pelapor" class="form-label">Kota</label>
                                                                        <input type="text" id="kota_pelapor" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_pelapor" data-parsley-required="true" value="<?= $data['kota_pelapor'] ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <?php

                                                            $sqlSaksi = mysqli_query($koneksi, "SELECT * FROM saksi WHERE id_data_surat = '$id'");
                                                            while ($dataSaksi = mysqli_fetch_assoc($sqlSaksi)) {
                                                            ?>
                                                                <hr class="divider mb-4">
                                                                <h4 class="card-title">Data Saksi <?= $dataSaksi['type_saksi'] ?></h4>
                                                                <div class="row">
                                                                    <input type="hidden" name="id_saksi<?= $dataSaksi['type_saksi'] ?>" value="<?= $dataSaksi['id'] ?>">
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="nik_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">NIK</label>
                                                                            <input type="number" id="nik_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-control" placeholder="Masukkan NIK" name="nik_saksi<?= $dataSaksi['type_saksi'] ?>" value="<?= $dataSaksi['nik_saksi'] ?>" data-parsley-required="true" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="nama_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">Nama Lengkap</label>
                                                                            <input type="text" id="nama_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-control" placeholder="Nama Lengkap" name="nama_saksi<?= $dataSaksi['type_saksi'] ?>" value="<?= $dataSaksi['nama_saksi'] ?>" data-parsley-required="true" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="tanggal_lahir_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">Tanggal Lahir</label>
                                                                            <input type="date" id="tanggal_lahir_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-control" placeholder="Umur" name="tanggal_lahir_saksi<?= $dataSaksi['type_saksi'] ?>" value="<?= $dataSaksi['tanggal_lahir_saksi'] ?>" data-parsley-required="true" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="umur_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">Umur</label>
                                                                            <input type="number" id="umur_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-control" placeholder="Umur" name="umur_saksi<?= $dataSaksi['type_saksi'] ?>" value="<?= $dataSaksi['umur_saksi'] ?>" data-parsley-required="true" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="pekerjaan_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">Pekerjaan</label>
                                                                            <input type="text" id="pekerjaan_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-control" placeholder="Pekerjaan" name="pekerjaan_saksi<?= $dataSaksi['type_saksi'] ?>" value="<?= $dataSaksi['pekerjaan_saksi'] ?>" data-parsley-required="true">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="alamat_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">Alamat</label>
                                                                            <textarea name="alamat_saksi<?= $dataSaksi['type_saksi'] ?>" id="alamat_saksi<?= $dataSaksi['type_saksi'] ?>" cols="30" rows="4" class="form-control" placeholder="Alamat" required><?= $dataSaksi['alamat_saksi'] ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="rt_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">RT</label>
                                                                            <input type="number" id="rt_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-control" placeholder="002" name="rt_saksi<?= $dataSaksi['type_saksi'] ?>" data-parsley-required="true" value="<?= $dataSaksi['rt_saksi'] ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="rw_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">RW</label>
                                                                            <input type="number" id="rw_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-control" placeholder="004" name="rw_saksi<?= $dataSaksi['type_saksi'] ?>" data-parsley-required="true" required value="<?= $dataSaksi['rw_saksi'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="desa_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">Desa</label>
                                                                            <input type="text" id="desa_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-control" placeholder="Masukkan Desa" name="desa_saksi<?= $dataSaksi['type_saksi'] ?>" data-parsley-required="true" value="<?= $dataSaksi['desa_saksi'] ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="kecamatan_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">Kecamatan</label>
                                                                            <input type="text" id="kecamatan_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_saksi<?= $dataSaksi['type_saksi'] ?>" data-parsley-required="true" value="<?= $dataSaksi['kecamatan_saksi'] ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group mandatory">
                                                                            <label for="kota_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-label">Kota</label>
                                                                            <input type="text" id="kota_saksi<?= $dataSaksi['type_saksi'] ?>" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_saksi<?= $dataSaksi['type_saksi'] ?>" data-parsley-required="true" value="<?= $dataSaksi['kota_saksi'] ?>" required>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                                                <button name="submit" type="button" class=" btn btn-secondary ml-1" data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block"> Close</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal EndUbah Surat Kematian -->

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>