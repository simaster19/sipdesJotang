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

    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $dusun = $_POST['dusun'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $jalan = $_POST['jalan'];

    $keperluan = $_POST['keperluan'];
    $masa_berlaku = $_POST['masa_berlaku'];
    $ambil = 'PENDING';
    $created_at = date('Y-m-d H:i:s', time());

    $simpan = mysqli_query($koneksi, "INSERT INTO surat_pengantar_warga (id_pegawai,id_profil_desa,id_surat,nik,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,jalan,dusun,rt,rw,desa,kecamatan,kota,keperluan,masa_berlaku,ambil,created_at) VALUES ('$id_user','$id_profil_desa','$id_surat','$nik','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$jalan','$dusun','$rt','$rw','$desa','$kecamatan','$kota','$keperluan','$masa_berlaku','$ambil','$created_at')");

    header('location:../Administrator/?page=surat-menyurat&pesan=berhasil');
}
