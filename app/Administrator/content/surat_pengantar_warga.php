<?php
include '../Controller/queryData.php';

?>
<div class="page-heading pt-4">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Pengantar Warga</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surat Pengantar Warga</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="akun-judul card-title d-inline-block">Surat Pengantar Warga</h5>

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
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Keperluan</th>
                            <th>Ambil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $suratPengantarWarga = querySuratPengantarWarga();

                        foreach ($suratPengantarWarga as $data) {


                        ?>
                            <tr>

                                <td><?= $data['no_surat'] ?></td>
                                <td><?= $data['nama_surat'] ?></td>
                                <td><?= $data['nama_lengkap'] ?></td>
                                <td>
                                    <?= $data['nik'] ?>
                                </td>
                                <td><?= $data['keperluan'] ?></td>
                                <td><?= $data['ambil'] ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#ubahSuratPengantarWarga<?= $data['ids'] ?>" title="Ubah" class="btn-ubahPegawai btn btn-primary rounded-pill"><i class="bi bi-pencil-fill"></i></button>
                                    <a href=""><button type="submit" title="Print" class="btn btn-danger rounded-pill"><i class="bi bi-printer-fill"></i></button></a>
                                    <a href="../Controller/konfirmasi_surat_pengantar_warga.php?id=<?= $data['ids'] ?>"><button type="submit" title="Konfirmasi Pengambilan" class="btn btn-success rounded-pill"><i class="bi bi-check"></i></button></a>



                                    <!-- Modal Ubah Surat Pengantar Warga -->
                                    <div class="modal modal-lg fade" id="ubahSuratPengantarWarga<?= $data['ids'] ?>" tabindex="-1" role="dialog" aria-labelledby="ubahSuratPengantarWargaTitle" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl" role="document">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ubahSuratPengantarWargaTitle">Ubah Surat Pengantar Warga</h5>
                                                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="card-content" id="surat_pengantar_warga">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Data Diri</h4>
                                                        <form action="../Controller/update_surat_pengantar_warga.php" class="form" method="POST">
                                                            <input type="hidden" name="id_surat" value="">
                                                            <input type="hidden" name="ids" value="<?= $data['ids'] ?>">
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nik" class="form-label">NIK</label>
                                                                        <input type="number" id="nik" class="form-control" placeholder="Masukkan NIK" name="nik" data-parsley-required="true" value="<?= $data['nik'] ?>" required readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="no_kk" class="form-label">No. KK</label>
                                                                        <input type="number" id="no_kk" class="form-control" placeholder="Masukkan No. KK" name="no_kk" value="<?= $data['no_kk'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                                                        <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama" name="nama" data-parsley-required="true" value="<?= $data['nama_lengkap'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                                        <input type="text" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                                        <input type="date" id="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                                                        <input type="text" id="kewarganegaraan" class="form-control" placeholder="WNI" name="kewarganegaraan" value="<?= $data['kewarganegaraan'] ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="agama" class="form-label">Agama</label>
                                                                        <input type="text" id="agama" class="form-control" placeholder="Masukkan Agama" name="agama" value="<?= $data['agama'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                                        <input type="text" id="pekerjaan" class="form-control" placeholder="Masukkan Tempat Lahir" name="pekerjaan" value="<?= $data['pekerjaan'] ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="alamat" class="form-label">Alamat</label>
                                                                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" cols="30" rows="4" required><?= $data['alamat'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rt" class="form-label">RT</label>
                                                                        <input type="number" id="rt" class="form-control" placeholder="002" name="rt" value="<?= $data['rt'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rw" class="form-label">RW</label>
                                                                        <input type="number" id="rw" class="form-control" placeholder="Masukkan Tempat Lahir" name="rw" value="<?= $data['rw'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="desa" class="form-label">Desa</label>
                                                                        <input type="text" id="desa" class="form-control" placeholder="Masukkan Desa" name="desa" value="<?= $data['desa'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                                                        <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan" value="<?= $data['kecamatan'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kota" class="form-label">Kota</label>
                                                                        <input type="text" id="kota" class="form-control" placeholder="Masukkan Kab/Kota" name="kota" value="<?= $data['kota'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="keperluan" class="form-label">Keperluan</label>
                                                                        <input type="text" id="keperluan" class="form-control" placeholder="Keperluan" name="keperluan" value="<?= $data['keperluan'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="berlaku_tgl" class="form-label">Berlaku Tanggal</label>
                                                                        <input type="date" id="berlaku_tgl" class="form-control" placeholder="Masukkan Dusun" name="berlaku_tgl" value="<?= $data['berlaku_tgl'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="berakhir_tgl" class="form-label">Berakhir Tanggal</label>
                                                                        <input type="date" id="berakhir_tgl" class="form-control" placeholder="Masukkan Dusun" name="berakhir_tgl" value="<?= $data['berakhir_tgl'] ?>" data-parsley-required="true">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="keterangan" class="form-label">Keterangan</label>
                                                                        <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control" placeholder="Keterangan"><?= $data['keterangan'] ?></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
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
                                    <!-- Modal EndUbah Surat Pengantar Warga -->
                                </td>
                            </tr>
                        <?php

                        } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>