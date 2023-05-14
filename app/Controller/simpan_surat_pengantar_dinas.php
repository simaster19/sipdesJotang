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

    $uraian = $_POST['uraian'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

    $created_at = date('Y-m-d', time());



    $simpan = mysqli_query($koneksi, "INSERT INTO surat_pengantar_dinas (
        id_pegawai,
        id_profil_desa,
        id_surat,
        uraian,
        jumlah,
        keterangan,
        created_at) VALUES (
            '$id_user',
            '$id_profil_desa',
            '$id_surat',
            '$uraian',
            '$jumlah',
            '$keterangan',
            '$created_at')");

    header('location:../Administrator/?page=surat-menyurat&pesan=berhasil');
}
