<?php
include '../Controller/queryData.php';
?>
<div class="page-heading pt-4">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pegawai</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="akun-judul card-title d-inline-block">Data Pegawai</h5>
                <button data-bs-toggle="modal" data-bs-target="#tambahPegawai" class="btnAddAkun btn btn-success  " title="Tambah Pegawai">
                    <i class="bi bi-person-plus"></i>
                </button>
                <!-- Modal Tambah Pegawai -->
                <div class="modal modal-lg fade" id="tambahPegawai" tabindex="-1" role="dialog" aria-labelledby="tambahPegawaiTitle" data-bs-backdrop="false" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <form action="../Controller/tambah_pegawai.php" class="form" method="POST" data-parsley-validate>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahPegawaiTitle">Tambah Pegawai</h5>
                                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-responsive table-striped">
                                        <tr>
                                            <th>NIK</th>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="nik" id="nik" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>jabatan</th>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="jabatan" id="jabatan" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>
                                                <select name="status" id="status" class="form-select">
                                                    <option value="1">Active</option>
                                                    <option value="0">Non-Active</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Akses</td>
                                            <td>:</td>
                                            <td>
                                                <input type="checkbox" name="role" id="role" class="form-check">
                                                <label for="role">ADMIN</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Username dan Password</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                                                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                            </td>
                                        </tr>
                                    </table>
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
                <!-- Modal EndTambah Pegawai -->
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
                } elseif ($_REQUEST['pesan'] == "hapus") {
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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Pegawais = queryPegawai();

                        $i = 1;
                        foreach ($Pegawais as $pegawai) {


                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $pegawai['nik'] ?></td>
                                <td><?= $pegawai['name'] ?></td>
                                <td><?= $pegawai['jabatan'] ?></td>
                                <td><?= $pegawai['status'] == 1 ? 'Active' : 'Non-Active' ?></td>

                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#ubahPegawai<?= $pegawai['id'] ?>" title="Ubah Pegawai" class="btn-ubahPegawai btn btn-primary rounded-pill"><i class="bi bi-pencil-fill"></i></button>

                                    <button data-bs-toggle="modal" data-bs-target="#detailPegawai<?= $pegawai['id'] ?>" title="Detail Pegawai" class="btn-detailPegawai btn btn-warning rounded-pill"><i class="bi bi-eye"></i></button>


                                    <a href="../Controller/hapus_pegawai.php?id=<?= $pegawai['id'] ?>"><button type="button" title="Hapus Pegawai" class="btn-hapusPegawai btn btn-danger rounded-pill" onclick="return confirm('Apakah Anda yakin?')"><i class="bi bi-trash"></i></button>

                                    </a>


                                    <!--Modal Detail Pegawai -->
                                    <div class="modal modal-lg fade" id="detailPegawai<?= $pegawai['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailPegawaiTitle" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <form action="" class="form" data-parsley-validate>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailPegawaiTitle">Detail Pegawai</h5>
                                                        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-responsive table-striped">
                                                            <tr>
                                                                <th>NIK</th>
                                                                <td>:</td>
                                                                <td><?= $pegawai['nik'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <td>:</td>
                                                                <td><?= $pegawai['name'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>jabatan</th>
                                                                <td>:</td>
                                                                <td><?= $pegawai['jabatan'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status</td>
                                                                <td>:</td>
                                                                <td><?= $pegawai['status'] == 1 ? 'Active' : 'Non-Aktif' ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button name="submit" type="button" class=" btn btn-secondary ml-1" data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block"> Close</span>

                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Modal End Detail Pegawai -->

                                    <!-- Modal Ubah Pegawai -->
                                    <div class="modal modal-lg fade" id="ubahPegawai<?= $pegawai['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ubahPegawaiTitle" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <form action="../Controller/ubah_pegawai.php" method="POST" class="form" data-parsley-validate>
                                                    <input type="hidden" name="id" value="<?= $pegawai['id'] ?>">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ubahPegawaiTitle">Ubah Pegawai</h5>
                                                        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-responsive table-striped">
                                                            <tr>
                                                                <th>NIK</th>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" name="nik" id="nik" class="form-control" value="<?= $pegawai['nik'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" name="name" id="name" class="form-control" value="<?= $pegawai['name'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>jabatan</th>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= $pegawai['jabatan'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <select name="status" id="status" class="form-select">
                                                                        <option value="1" <?= $pegawai['status'] == 1 ? 'selected' : '' ?>>Active</option>
                                                                        <option value="0" <?= $pegawai['status'] == 0 ? 'selected' : '' ?>>Non-Active</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </table>
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
                                    <!-- Modal EndUbah Pegawai -->

                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>