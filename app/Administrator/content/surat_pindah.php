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
                <h3>Surat Pindah</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surat Pindah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="akun-judul card-title d-inline-block">Surat Pindah</h5>

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
                            <th>NIK</th>
                            <th>Nama Pemohon</th>
                            <th>Jenis Permohonan</th>
                            <th>No. KK</th>
                            <th>Ambil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $suratPindah = querySuratPindah();
                        foreach ($suratPindah as $data) {
                            // echo "<pre>";
                            // var_dump($data);
                            // echo "</pre>";
                            $id = $data['ids'];
                        ?>
                            <tr>
                                <td><?= $data['no_surat'] ?></td>
                                <td><?= $data['nik'] ?></td>
                                <td><?= $data['nama_pemohon'] ?></td>
                                <td><?= $data['jenis_permohonan'] ?></td>
                                <td><?= $data['no_kk'] ?></td>
                                <td><?= $data['ambil'] == 'PENDING' ? '<span class="badge bg-warning">' . $data['ambil'] . '</span>' : '<span class="badge bg-success">' . $data['ambil'] . '</span>' ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#ubahSuratPindah<?= $data['ids'] ?>" title="Ubah" class="btn-ubahSuratPindah btn btn-primary rounded-pill"><i class="bi bi-pencil-fill"></i></button>

                                    <a href="content/print/surat_pindah_print.php?id=<?= $data['ids'] ?>" target="_blank"><button type="submit" title="Print" class="btn btn-danger rounded-pill"><i class="bi bi-printer-fill"></i></button></a>
                                    <a href="../Controller/konfirmasi_surat_pindah.php?id=<?= $data['ids'] ?>"><button type="submit" title="Konfirmasi Pengambilan" class="btn btn-success rounded-pill"><i class="bi bi-check"></i></button></a>



                                    <!-- Modal Ubah Surat Pindah -->
                                    <div class="modal modal-lg fade" id="ubahSuratPindah<?= $data['ids'] ?>" tabindex="-1" role="dialog" aria-labelledby="ubahSuratPindahTitle" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl" role="document">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ubahSuratPindahTitle">Ubah Surat Pindah</h5>
                                                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="card-content" id="surat_pindah">
                                                    <div class="card-body">
                                                        <form action="../Controller/update_surat_pindah.php" class="form" method="POST">
                                                            <input type="hidden" name="id_surat" value="">
                                                            <input type="hidden" name="id" value="<?= $data['ids'] ?>">

                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="no_kk" class="form-label">No. KK</label>
                                                                        <input type="number" min="1" id="no_kk" class="form-control" placeholder="Masukkan No KK" name="no_kk" data-parsley-required="true" value="<?= $data['no_kk'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nama_pemohon" class="form-label">Nama Lengkap Pemohon</label>
                                                                        <input type="text" id="nama_pemohon" class="form-control" placeholder="Nama Lengkap" name="nama_pemohon" data-parsley-required="true" value="<?= $data['nama_pemohon'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="nik_pemohon" class="form-label">NIK</label>
                                                                        <input type="number" id="nik_pemohon" class="form-control" placeholder="Masukkan NIK" name="nik_pemohon" data-parsley-required="true" value="<?= $data['nik'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="jenis_permohonan" class="form-label">Jenis Permohonan</label>
                                                                        <select name="jenis_permohonan" id="jenis_permohonan" class="form-select" required>
                                                                            <option value="<?= $data['jenis_permohonan'] ?>">--Jangan Diubah - <?= $data['jenis_permohonan'] ?></option>
                                                                            <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                                                                            <option value="Surat Keterangan Pindah Luar Negeri">Surat Keterangan Pindah Luar Negeri</option>
                                                                            <option value="Surat Keterangan Tempat Tinggal">Surat Keterangan Tempat Tinggal</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="alamat" class="form-label">Alamat</label>
                                                                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" required><?= $data['alamat'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rt" class="form-label">RT</label>
                                                                        <input type="number" id="rt" min="1" class="form-control" placeholder="002" name="rt" data-parsley-required="true" value="<?= $data['rt'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rw" class="form-label">RW</label>
                                                                        <input type="number" min="1" id="rw" class="form-control" placeholder="005" name="rw" data-parsley-required="true" value="<?= $data['rw'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="desa" class="form-label">Desa</label>
                                                                        <input type="text" id="desa" class="form-control" placeholder="Masukkan Desa" name="desa" data-parsley-required="true" value="<?= $data['desa'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                                                        <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan" data-parsley-required="true" value="<?= $data['kecamatan'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kota" class="form-label">Kota</label>
                                                                        <input type="text" id="kota" class="form-control" placeholder="Masukkan Kab/Kota" name="kota" data-parsley-required="true" value="<?= $data['kota'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kode_pos" class="form-label">Kode Pos</label>
                                                                        <input type="number" min="1" id="kode_pos" class="form-control" placeholder="Masukkan Kode POS" name="kode_pos" data-parsley-required="true" value="<?= $data['kode_pos'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <hr class="divider mb-2">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="alamat_lengkap_pindah" class="form-label">Alamat Pindah</label>
                                                                        <textarea name="alamat_lengkap_pindah" id="alamat_lengkap_pindah" cols="30" rows="4" class="form-control" required><?= $data['alamat_pindah'] ?></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rt_pindah" class="form-label">RT</label>
                                                                        <input type="number" min="1" id="rt_pindah" class="form-control" placeholder="002" name="rt_pindah" data-parsley-required="true" value="<?= $data['rt_pindah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="rw_pindah" class="form-label">RW</label>
                                                                        <input type="number" min="1" id="rw_pindah" class="form-control" placeholder="008" name="rw_pindah" data-parsley-required="true" value="<?= $data['rw_pindah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="desa_pindah" class="form-label">Desa</label>
                                                                        <input type="text" id="desa_pindah" class="form-control" placeholder="Masukkan Desa" name="desa_pindah" data-parsley-required="true" value="<?= $data['desa_pindah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kecamatan_pindah" class="form-label">Kecamatan</label>
                                                                        <input type="text" id="kecamatan_pindah" class="form-control" placeholder="Masukkan Kecamatan" name="kecamatan_pindah" data-parsley-required="true" value="<?= $data['kecamatan_pindah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kota_pindah" class="form-label">Kota</label>
                                                                        <input type="text" id="kota_pindah" class="form-control" placeholder="Masukkan Kab/Kota" name="kota_pindah" data-parsley-required="true" value="<?= $data['kota_pindah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="kode_pos_pindah" class="form-label">Kode Pos</label>
                                                                        <input type="number" id="kode_pos_pindah" class="form-control" placeholder="Masukkan Kab/Kota" name="kode_pos_pindah" data-parsley-required="true" value="<?= $data['kode_pos_pindah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="alasan_pindah" class="form-label">Alasan Pindah</label>
                                                                        <input type="text" id="alasan_pindah" class="form-control" placeholder="Alasan" name="alasan_pindah" data-parsley-required="true" value="<?= $data['alasan_pindah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="jenis_kepindahan" class="form-label">Jenis Kepindahan</label>
                                                                        <input type="text" id="jenis_kepindahan" class="form-control" placeholder="Pekerjaan" name="jenis_kepindahan" data-parsley-required="true" value="<?= $data['jenis_kepindahan'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="anggota_keluarga_tidak_pindah" class="form-label">Anggota Keluarga Tidak Pindah</label>
                                                                        <input type="text" id="anggota_keluarga_tidak_pindah" class="form-control" placeholder="Masukkan Isian" name="anggota_keluarga_tidak_pindah" data-parsley-required="true" value="<?= $data['anggota_keluarga_tidak_pindah'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="anggota_keluarga_yang_pindah" class="form-label">Anggota Keluarga Yang Pindah</label>
                                                                        <input type="text" id="anggota_keluarga_yang_pindah" class="form-control" placeholder="Masukkan Isian" name="anggota_keluarga_yang_pindah" value="<?= $data['anggota_keluarga_yang_pindah'] ?>" data-parsley-required="true" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-12">
                                                                    <div class="form-group mandatory">
                                                                        <label for="daftar_anggota_keluagra_pindah" class="form-label">Daftar Anggota Keluarga Pindah</label>

                                                                    </div>
                                                                </div>
                                                                <div class="input-anggota">
                                                                    <div class="row" id="hapusx">
                                                                        <?php
                                                                        $sqlAnggota = mysqli_query($koneksi, "SELECT id,nik_anggota,nama_anggota FROM anggota_keluarga WHERE id_surat_pindah='$id'");
                                                                        while ($dataAnggota = mysqli_fetch_assoc($sqlAnggota)) {
                                                                        ?>
                                                                            <input type="hidden" name="id_anggota[]" value="<?= $dataAnggota['id'] ?>">
                                                                            <div class="col-md-5 col-12">
                                                                                <div class="form-group">
                                                                                    <input type="number" min="1" id="nik_anggota" class="form-control" placeholder="NIK" name="nik_anggota[]" data-parsley-required="true" value="<?= $dataAnggota['nik_anggota'] ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-5 col-12">
                                                                                <div class="form-group">
                                                                                    <input type="text" id="nama_anggota" class="form-control" placeholder="Nama Lengkap" name="nama_anggota[]" data-parsley-required="true" value="<?= $dataAnggota['nama_anggota'] ?>">
                                                                                </div>
                                                                            </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr class="divider mb-4">
                                                            <h4 class="card-title">Form Surat Untuk Orang Asing</h4>
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama_sponsor" class="form-label">Nama Sponsor</label>
                                                                        <input type="text" id="nama_sponsor" class="form-control" placeholder="Sponsor" name="nama_sponsor" data-parsley-required="true" value="<?= $data['nama_sponsor'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="type_sponsor" class="form-label">Type Sponsor</label>
                                                                        <input type="text" id="type_sponsor" class="form-control" placeholder="Type Sponsor" name="type_sponsor" data-parsley-required="true" value="<?= $data['type_sponsor'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="alamat_sponsor" class="form-label">Alamat</label>
                                                                        <textarea name="alamat_sponsor" id="alamat_sponsor" class="form-control" cols="30" rows="4" placeholder="Alamat"><?= $data['alamat_sponsor'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="no_itas" class="form-label">No ITAS</label>
                                                                        <input type="number" id="no_itas" class="form-control" placeholder="No ITAS - ITAP" name="no_itas" data-parsley-required="true" value="<?= $data['nomor_itas'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="tanggal_itas" class="form-label">Tanggal ITAS</label>
                                                                        <input type="date" id="tanggal_itas" class="form-control" placeholder="No KK" name="tanggal_itas" data-parsley-required="true" value="<?= $data['masa_berlaku_itas'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="negara_tujuan" class="form-label">Negara Tujuan</label>
                                                                        <input type="text" id="negara_tujuan" class="form-control" placeholder="Negara Tujuan" name="negara_tujuan" data-parsley-required="true" value="<?= $data['negara_tujuan'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="kode_negara" class="form-label">Kode Negara</label>
                                                                        <input type="text" id="kode_negara" class="form-control" placeholder="Kode Negara" name="kode_negara" data-parsley-required="true" value="<?= $data['kode_negara'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="alamat_tujuan" class="form-label">Alamat Tujuan</label>
                                                                        <textarea name="alamat_tujuan" id="alamat_tujuan" class="form-control" cols="30" rows="4"><?= $data['alamat_tujuan'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
                                                                        <input type="text" id="penanggung_jawab" class="form-control" placeholder="Penanggung Jawab" name="penanggung_jawab" data-parsley-required="true" value="<?= $data['penanggung_jawab'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="rencana_pindah_tanggal" class="form-label">Rencana Pindah</label>
                                                                        <input type="date" id="rencana_pindah_tanggal" class="form-control" placeholder="Rencana Pindah" name="rencana_pindah_tanggal" data-parsley-required="true" value="<?= $data['rencana_pindah_tanggal'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="no_hp" class="form-label">No. Handphone</label>
                                                                        <input type="number" id="no_hp" class="form-control" placeholder="Nomor Handphone" name="no_hp" data-parsley-required="true" value="<?= $data['no_hp'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="alamat_email" class="form-label">Email</label>
                                                                        <input type="email" id="alamat_email" class="form-control" placeholder="email@email.com" name="alamat_email" data-parsley-required="true" value="<?= $data['email'] ?>">
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
                                    <!-- Modal EndUbah Surat Pindah -->

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>