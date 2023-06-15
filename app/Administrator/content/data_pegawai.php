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
                            <form action="../Controller/tambah_pegawai.php" class="form" id="formTambah" method="POST" enctype="multipart/form-data" data-parsley-validate>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahPegawaiTitle">Tambah Pegawai</h5>
                                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="foto" class="form-label">Foto</label>
                                                <input type="file" id="foto" class="form-control" name="foto" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="number" id="nik" class="form-control" placeholder="NIK" name="nik" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" name="nama" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="jabatan" class="form-label">Jabatan</label>
                                                <input type="text" id="jabatan" class="form-control" placeholder="Jabatan" name="jabatan" data-parsley-required="true" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="role" class="form-label">Hak Akses</label>
                                                <input type="checkbox" id="role" name="role" class="form-check-input">
                                                <label for="role">ADMIN</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 akun" style="display:none;">
                                            <div class="form-group mandatory">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" id="username" class="form-control" placeholder="Username" name="username" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 akun" style="display:none;">
                                            <div class="form-group mandatory">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="text" id="password" class="form-control" placeholder="Password" name="password" data-parsley-required="true">
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
                            <th>Foto</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Hak Akses</th>
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
                                <td>
                                    <img src="../../assets/images/foto/<?= $pegawai['foto'] ?>" alt="Foto" class="img-thumbnail rounded" width="80px" height="80px">
                                </td>
                                <td><?= $pegawai['nik'] ?></td>
                                <td><?= $pegawai['nama'] ?></td>
                                <td><?= $pegawai['jabatan'] ?></td>
                                <td><?= $pegawai['status'] == 1 ? '<span class="badge bg-success">Active</span>' :  '<span class="badge bg-danger">Non-Active</span>' ?></td>
                                <?php
                                if ($pegawai['role'] == 'ADMIN') {
                                    echo '<td><span class="badge bg-info">' . $pegawai['role'] . '</span></td>';
                                } else {
                                    echo '<td><span class="badge bg-warning">' . $pegawai['role'] . '</span></td>';
                                }
                                ?>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#ubahPegawai<?= $pegawai['id'] ?>" title="Ubah Pegawai" class="btn-ubahPegawai btn btn-primary rounded-pill"><i class="bi bi-pencil-fill"></i></button>

                                    <button data-bs-toggle="modal" data-bs-target="#detailPegawai<?= $pegawai['id'] ?>" title="Detail Pegawai" class="btn-detailPegawai btn btn-warning rounded-pill"><i class="bi bi-eye"></i></button>

                                    <form action="../Controller/hapus_pegawai.php" method="POST" class="d-inline-block">
                                        <input type="hidden" name="id" value="<?= $pegawai['id'] ?>">
                                        <button type="submit" title="Hapus Pegawai" class="btn-hapusPegawai btn btn-danger rounded-pill" onclick="return confirm('Apakah Anda yakin?')"><i class="bi bi-trash"></i></button>
                                    </form>



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
                                                                <td colspan="3" align="center">
                                                                    <img src="../../assets/images/foto/<?= $pegawai['foto'] ?>" alt="" class="rounded" width="200px" height="200px">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>NIK</th>
                                                                <td>:</td>
                                                                <td><?= $pegawai['nik'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <td>:</td>
                                                                <td><?= $pegawai['nama'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>jabatan</th>
                                                                <td>:</td>
                                                                <td><?= $pegawai['jabatan'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status</td>
                                                                <td>:</td>

                                                                <td><?= $pegawai['status'] == 1 ? '<span class="badge bg-success">Active</span>' :  '<span class="badge bg-danger">Non-Active</span>' ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            if ($pegawai['role'] == 'ADMIN') {
                                                            ?>
                                                                <tr>
                                                                    <td>Hak Akses</td>
                                                                    <td>:</td>
                                                                    <td><span class="badge bg-info"><?= $pegawai['role'] ?></span></td>
                                                                </tr>
                                                            <?php }
                                                            ?>
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
                                                <form action="../Controller/ubah_pegawai.php" method="POST" class="form" id="formUbah" enctype="multipart/form-data" data-parsley-validate>
                                                    <input type="hidden" name="id" value="<?= $pegawai['id'] ?>">
                                                    <input type="hidden" name="hakakses" value="<?= $pegawai['role'] ?>">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ubahPegawaiTitle">Ubah Pegawai</h5>
                                                        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="foto" class="form-label">Foto</label>
                                                                    <input type="file" id="foto" class="form-control" name="foto" data-parsley-required="true">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="nik" class="form-label">NIK</label>
                                                                    <input type="number" id="nik" class="form-control" placeholder="NIK" name="nik" data-parsley-required="true" value="<?= $pegawai['nik'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="nama" class="form-label">Nama</label>
                                                                    <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" name="nama" data-parsley-required="true" value="<?= $pegawai['nama'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="jabatan" class="form-label">Jabatan</label>
                                                                    <input type="text" id="jabatan" class="form-control" placeholder="Jabatan" name="jabatan" data-parsley-required="true" value="<?= $pegawai['jabatan'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select name="status" id="status" class="form-select">
                                                                        <option value="1" <?= $pegawai['status'] == 1 ? 'selected' : '' ?>>Active</option>
                                                                        <option value="0" <?= $pegawai['status'] == 0 ? 'selected' : '' ?>>Non Active</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="role" class="form-label">Hak Akses</label>
                                                                    <input type="checkbox" id="role" name="role" class="form-check-input" <?= $pegawai['role'] == 'ADMIN' ? 'checked' : '' ?>>
                                                                    <label for="role">ADMIN</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12 akun" <?= $pegawai['role'] !== 'ADMIN' ? 'style="display:none;"' : '' ?>>
                                                                <div class="form-group mandatory">
                                                                    <label for="username" class="form-label">Username</label>
                                                                    <input type="text" id="username" class="form-control" placeholder="Username" name="username" data-parsley-required="true" value="<?= $pegawai['username'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12 akun" <?= $pegawai['role'] !== 'ADMIN' ? 'style="display:none;"' : '' ?>>
                                                                <div class="form-group mandatory">
                                                                    <label for="password" class="form-label">Password</label>
                                                                    <input type="text" id="password" class="form-control" placeholder="Password" name="password" data-parsley-required="true">
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