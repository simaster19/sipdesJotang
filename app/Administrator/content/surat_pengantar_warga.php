<div class="page-heading pt-4">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Kelahiran</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surat Kelahiran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="akun-judul card-title d-inline-block">Surat Kelahiran</h5>

                <?php
                if ($_GET['pesan'] == "berhasil") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Berhasil Ditambahkan!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                } elseif ($_GET['pesan'] == "update") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Berhasil Diubah!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                } elseif ($_GET['pesan'] == "hapus") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data Berhasil Dihapus!
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
                            <th>Foto</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        ?>
                        <tr>
                            <?php

                            ?>
                            <td>1</td>
                            <td>
                                <img class="img-thumbnail" src="" alt="Foto">
                            </td>
                            <td>98978776763</td>
                            <td>Master</td>
                            <td>Kades</td>
                            <td>Active</td>
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#ubahPegawai" title="Ubah Pegawai" class="btn-ubahPegawai btn btn-primary rounded-pill"><i class="bi bi-pencil-fill"></i></button>

                                <form action="#" method="POST" class="d-inline-block">
                                    <button type="submit" title="Hapus Pegawai" class="btn-hapusPegawai btn btn-danger rounded-pill"><i class="bi bi-printer-fill"></i></button>
                                </form>



                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>