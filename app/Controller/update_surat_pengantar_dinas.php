<?php

include 'koneksi.php';
session_start();
if (isset($_POST['submit'])) {


    $userLogin = $_SESSION['username'];

    $pegawai = mysqli_query($koneksi, "SELECT id FROM pegawai WHERE username = '$userLogin'");
    $data = mysqli_fetch_assoc($pegawai);

    $id_surat = $_POST['id_surat'];
    $id_user = $data['id'];
    $id_profil_desa = 1;

    $ids = $_POST['ids'];

    $uraian = $_POST['uraian'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

    $updated_at = date('Y-m-d', time());



    $simpan = mysqli_query($koneksi, "UPDATE surat_pengantar_dinas SET
        uraian='$uraian',
        jumlah='$jumlah',
        keterangan='$keterangan',
        updated_at='$updated_at' WHERE id='$ids'");

    header('location:../Administrator/?page=surat-pengantar-dinas&pesan=update');
}
