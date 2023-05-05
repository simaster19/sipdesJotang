<?php

include 'koneksi.php';
if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $name = $_POST['name'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];

    $qSimpan = mysqli_query($koneksi, "INSERT INTO pegawai (nik, name, jabatan, status ) VALUES ('$nik','$name','$jabatan','$status')");

    header('location:../Administrator/?page=data-pegawai&pesan=berhasil');
}
