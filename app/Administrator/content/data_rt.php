<?php
include '../Controller/queryData.php';
?>
<div class="page-heading pt-4">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data RT</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data RT</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="akun-judul card-title d-inline-block">Data RT</h5>
                <button data-bs-toggle="modal" data-bs-target="#tambahRT" class="btnAddAkun btn btn-success  " title="Tambah RT">
                    <i class="bi bi-person-plus"></i>
                </button>
                <!-- Modal Tambah RT -->
                <div class="modal modal-lg fade" id="tambahRT" tabindex="-1" role="dialog" aria-labelledby="tambahRTTitle" data-bs-backdrop="false" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <form action="../Controller/tambah_rt.php" class="form" id="formTambah" method="POST" enctype="multipart/form-data" data-parsley-validate>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahRTTitle">Tambah RT</h5>
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
                                                <input type="text" id="nik" class="form-control" placeholder="NIK" name="nik" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" name="nama" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="dusun" class="form-label">Dusun</label>
                                                <input type="text" id="dusun" class="form-control" placeholder="Dusun" name="dusun" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rt" class="form-label">RT</label>
                                                <input type="text" id="rt" class="form-control" placeholder="001" name="rt" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mandatory">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="text" id="rw" class="form-control" placeholder="008" name="rw" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="desa" class="form-label">Desa</label>
                                                <input type="text" id="desa" class="form-control" placeholder="Desa" name="desa" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan" class="form-control" placeholder="Kecamatan" name="kecamatan" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kota" class="form-label">Kota</label>
                                                <input type="text" id="kota" class="form-control" placeholder="Kota" name="kota" data-parsley-required="true">
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
                <!-- Modal EndTambah RT -->
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
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rts = queryRt();

                        $i = 1;
                        foreach ($rts as $rt) {


                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td>
                                    <img src="../../assets/images/foto/<?= $rt['foto'] ?>" alt="Foto" class="img-thumbnail rounded" width="80px" height="80px">
                                </td>
                                <td><?= $rt['nik'] ?></td>
                                <td><?= $rt['nama'] ?></td>
                                <td><?= $rt['status'] == 1 ? 'Active' : 'Non-Active' ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#ubahRT<?= $rt['id'] ?>" title="Ubah RT" class="btn-ubahRT btn btn-primary rounded-pill"><i class="bi bi-pencil-fill"></i></button>

                                    <button data-bs-toggle="modal" data-bs-target="#detailRT<?= $rt['id'] ?>" title="Detail RT" class="btn-detailRT btn btn-warning rounded-pill"><i class="bi bi-eye"></i></button>

                                    <form action="../Controller/hapus_rt.php" method="POST" class="d-inline-block">
                                        <input type="hidden" name="id" value="<?= $rt['id'] ?>">
                                        <button type="submit" title="Hapus RT" class=" btn btn-danger rounded-pill" onclick="return confirm('Apakah Anda yakin?')"><i class="bi bi-trash"></i></button>
                                    </form>



                                    <!--Modal Detail RT -->
                                    <div class="modal modal-lg fade" id="detailRT<?= $rt['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailRTTitle" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <form action="" class="form" data-parsley-validate>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailRTTitle">Detail RT</h5>
                                                        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-responsive table-striped">
                                                            <tr>
                                                                <td colspan="3" align="center">
                                                                    <img src="../../assets/images/foto/<?= $rt['foto'] ?>" alt="" class="rounded" width="200px" height="200px">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>NIK</th>
                                                                <td>:</td>
                                                                <td><?= $rt['nik'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <td>:</td>
                                                                <td><?= $rt['nama'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Alamat</th>
                                                                <td>:</td>
                                                                <td><?= $rt['dusun'] . " RT-" . $rt['rt'] . " RW-" . $rt['rw'] . ", Desa " . $rt['desa'] . ", Kecamatan " . $rt['kecamatan'] . ", Kota " . $rt['kota'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status</td>
                                                                <td>:</td>
                                                                <td><?= $rt['status'] == 1 ? 'Active' : 'Non-Aktif' ?></td>
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
                                    <!-- Modal End Detail RT -->

                                    <!-- Modal Ubah RT -->
                                    <div class="modal modal-lg fade" id="ubahRT<?= $rt['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ubahRTTitle" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <form action="../Controller/ubah_rt.php" method="POST" class="form" id="formUbah" enctype="multipart/form-data" data-parsley-validate>
                                                    <input type="hidden" name="id" value="<?= $rt['id'] ?>">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ubahRTTitle">Ubah RT</h5>
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
                                                                    <input type="text" id="nik" class="form-control" placeholder="NIK" name="nik" data-parsley-required="true" value="<?= $rt['nik'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="nama" class="form-label">Nama</label>
                                                                    <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" name="nama" data-parsley-required="true" value="<?= $rt['nama'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="dusun" class="form-label">Dusun</label>
                                                                    <input type="text" id="dusun" class="form-control" placeholder="Dusun" name="dusun" data-parsley-required="true" value="<?= $rt['dusun'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="rt" class="form-label">RT</label>
                                                                    <input type="text" id="rt" class="form-control" placeholder="001" name="rt" data-parsley-required="true" value="<?= $rt['rt'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="rw" class="form-label">RW</label>
                                                                    <input type="text" id="rw" class="form-control" placeholder="008" name="rw" data-parsley-required="true" value="<?= $rt['rw'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="desa" class="form-label">Desa</label>
                                                                    <input type="text" id="desa" class="form-control" placeholder="Desa" name="desa" data-parsley-required="true" value="<?= $rt['desa'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                                                    <input type="text" id="kecamatan" class="form-control" placeholder="Kecamatan" name="kecamatan" data-parsley-required="true" value="<?= $rt['kecamatan'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="kota" class="form-label">Kota</label>
                                                                    <input type="text" id="kota" class="form-control" placeholder="Kota" name="kota" data-parsley-required="true" value="<?= $rt['kota'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select name="status" id="status" class="form-select">
                                                                        <option value="1" <?= $rt['status'] == 1 ? 'selected' : '' ?>>Active</option>
                                                                        <option value="0" <?= $rt['status'] == 0 ? 'selected' : '' ?>>Non Active</option>
                                                                    </select>
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
                                    <!-- Modal EndUbah RT -->

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