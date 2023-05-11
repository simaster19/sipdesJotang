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
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#ubahPegawai" title="Ubah Pegawai" class="btn-ubahPegawai btn btn-primary rounded-pill"><i class="bi bi-pencil-fill"></i></button>

                                    <form action="#" method="POST" class="d-inline-block">
                                        <button type="submit" title="Hapus Pegawai" class="btn-hapusPegawai btn btn-danger rounded-pill"><i class="bi bi-printer-fill"></i></button>
                                    </form>



                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>