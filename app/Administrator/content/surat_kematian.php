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
                            <th>No</th>
                            <th>No. Surat</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Surat</th>
                            <th>Status Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $suratKematian = querySuratKematian();
                        $i = 1;
                        foreach ($suratKematian as $data) {
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data['no_surat'] ?></td>
                                <td><?= $data['nik'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['jenis_kelamin'] ?></td>
                                <td><?= $data['tanggal_surat'] ?></td>
                                <td><?= $data['status_surat'] ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#ubahSuratKematian<?= $data['ids'] ?>" title="Ubah Pegawai" class="btn-ubahSuratKematian btn btn-primary rounded-pill"><i class="bi bi-pencil-fill"></i></button>


                                    <a href=""><button type="submit" title="Print" class="btn btn-danger rounded-pill"><i class="bi bi-printer-fill"></i></button></a>


                                    <!-- Modal Ubah Surat Kematian -->
                                    <div class="modal modal-lg fade" id="ubahSuratKematian<?= $data['ids'] ?>" tabindex="-1" role="dialog" aria-labelledby="ubahSuratKelahiranTitle" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <form action="../Controller/" method="POST" class="form" data-parsley-validate>
                                                    <input type="hidden" name="id" value="<?= $data['ids'] ?>">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ubahSuratKelahiranTitle">Ubah Surat <?= $data['nama'] ?> - <?= $data['nik'] ?></h5>
                                                        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="nik" class="form-label">NIK</label>
                                                                    <input type="text" id="nik" class="form-control" placeholder="NIK" name="nik" value="<?= $data['nik'] ?>" data-parsley-required="true" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                                                    <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= $data['nama'] ?>" data-parsley-required="true">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                                                    <input type="text" id="nama_ibu" class="form-control" placeholder="Nama Lengkap" name="nama_ibu" value="<?= $data['nama_ibu'] ?>" data-parsley-required="true">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="nama_anak" class="form-label">Nama Anak</label>
                                                                    <input type="text" id="nama_anak" class="form-control" placeholder="Nama Lengkap" name="nama_anak" value="<?= $data['nama_anak'] ?>" data-parsley-required="true">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="anak_ke" class="form-label">Anak Ke</label>
                                                                    <input type="text" id="anak_ke" class="form-control" placeholder="Nama Lengkap" name="anak_ke" value="<?= $data['anak_ke'] ?>" data-parsley-required="true">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="alamat" class="form-label">Alamat</label>

                                                                    <textarea class="form-control" id="alamat" name="alamat" id="" cols="30" rows="5" readonly><?= $data['alamat'] ?></textarea>
                                                                </div>
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