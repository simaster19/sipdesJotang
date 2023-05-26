<?php
include '../Controller/queryData.php';

?>
<div class="page-heading pt-4">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Pengantar Dinas</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surat Pengantar Dinas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="akun-judul card-title d-inline-block">Surat Pengantar Dinas</h5>

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
                            <th>Uraian</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Dibuat Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $suratPengantarDinas = querySuratPengantarDinas();
                        $i = 1;
                        foreach ($suratPengantarDinas as $data) {
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td>
                                    <?= $data['uraian'] ?>
                                </td>
                                <td><?= $data['jumlah'] ?></td>
                                <td><?= $data['keterangan'] ?></td>
                                <td><?= $data['created_at'] ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#ubahSuratPengantarDinas<?= $data['ids'] ?>" title="Ubah Surat Pengantar Dinas" class=" btn btn-primary rounded-pill"><i class="bi bi-pencil-fill"></i></button>

                                    <a href="content/print/surat_pengantar_dinas_print.php?id=<?= $data['ids'] ?>"><button type="submit" title="Print" class="btn btn-danger rounded-pill"><i class="bi bi-printer-fill"></i></button></a>


                                    <!-- Modal Ubah Surat Pengantar Dinas -->
                                    <div class="modal modal-lg fade" id="ubahSuratPengantarDinas<?= $data['ids'] ?>" tabindex="-1" role="dialog" aria-labelledby="ubahSuratPengantarDinasTitle" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl" role="document">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ubahSuratPengantarDinasTitle">Ubah Surat Pengantar Dinas</h5>
                                                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="card-content" id="surat_pengantar_dinas">
                                                    <div class="card-body">

                                                        <form action="../Controller/update_surat_pengantar_dinas.php" class="form" method="POST">
                                                            <input type="hidden" name="id_surat" value="">
                                                            <input type="hidden" name="ids" value="<?= $data['ids'] ?>">
                                                            <div class="row">
                                                                <div class="col-md-12 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="uraian" class="form-label">Uraian</label>
                                                                        <textarea name="uraian" id="uraian" class="form-control" cols="30" rows="7" placeholder="Uraian" required><?= $data['uraian'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="jumlah" class="form-label">Jumlah</label>
                                                                        <input type="text" id="jumlah" class="form-control" placeholder="1 Bendel" name="jumlah" data-parsley-required="true" value="<?= $data['jumlah'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="keterangan" class="form-label">Keterangan</label>
                                                                        <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="7" placeholder="Keterangan" required><?= $data['keterangan'] ?></textarea>
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
                                    <!-- Modal EndUbah Surat Pengantar Dinas -->



                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>