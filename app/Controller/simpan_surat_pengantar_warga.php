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

    $nik                = $_POST['nik'];
    $nama               = $_POST['nama'];
    $no_kk              = $_POST['no_kk'];
    $tempat_lahir       = $_POST['tempat_lahir'];
    $tanggal_lahir      = $_POST['tanggal_lahir'];
    $kewarganegaraan    = $_POST['kewarganegaraan'];
    $agama              = $_POST['agama'];
    $pekerjaan          = $_POST['pekerjaan'];
    $alamat             = $_POST['alamat'];
    $rt                 = $_POST['rt'];
    $rw                 = $_POST['rw'];
    $desa               = $_POST['desa'];
    $kecamatan          = $_POST['kecamatan'];
    $kota               = $_POST['kota'];
    $keperluan          = $_POST['keperluan'];
    $berlaku_tgl        = $_POST['berlaku_tgl'];
    $berakhir_tgl       = $_POST['berakhir_tgl'];
    $keterangan         = $_POST['keterangan'];

    $ambil = 'PENDING';

    $simpan = mysqli_query($koneksi, "INSERT INTO surat_pengantar_warga (
        id_pegawai,
        id_profil_desa,
        id_surat,
        nik,
        nama,
        no_kk,
        tempat_lahir,
        tanggal_lahir,
        kewarganegaraan,
        agama,
        pekerjaan,
        alamat,
        rt,
        rw,
        desa,
        kecamatan,
        kota,
        keperluan,
        berlaku_tgl,
        berakhir_tgl,
        keterangan,
        ambil) VALUES (
            '$id_user',
            '$id_profil_desa',
            '$id_surat',
            '$nik',
            '$nama',
            '$no_kk',
            '$tempat_lahir',
            '$tanggal_lahir',
            '$kewarganegaraan',
            '$agama',
            '$pekerjaan',
            '$alamat',
            '$rt',
            '$rw',
            '$desa',
            '$kecamatan',
            '$kota',
            '$keperluan',
            '$berlaku_tgl',
            '$berakhir_tgl',
            '$keterangan',
            '$ambil')");

    header('location:../Administrator/?page=surat-menyurat&pesan=berhasil');
}
