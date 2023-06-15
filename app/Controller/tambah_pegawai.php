<?php

include 'koneksi.php';
if (isset($_POST['submit'])) {
    $namaFoto = $_FILES['foto']['name'];
    $tmpFoto = $_FILES['foto']['tmp_name'];
    $sizeFoto = $_FILES['foto']['size'];

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jabatan = strtoupper($_POST['jabatan']);

    if (isset($_POST['role']) == true) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = 'ADMIN';
    } else {
        $username = '';
        $password = '';
        $role = '';
    }
    $status = 1;

    $splitFileImage = explode('.', $namaFoto);
    $extension = strtolower(end($splitFileImage));
    $typeExtension = ['jpg', 'jpeg', 'png'];

    if (in_array($extension, $typeExtension)) {
        if ($sizeFoto < 10000000) {
            $finalNamaFoto = sha1($namaFoto) . rand(40, 99999) . "." . $extension;
            $targetUpload = '../../assets/images/foto/' . $finalNamaFoto;

            move_uploaded_file($tmpFoto, $targetUpload);
        }
    }



    $qSimpan = mysqli_query($koneksi, "INSERT INTO pegawai (
        nik, 
        nama, 
        foto, 
        jabatan, 
        status, 
        role, 
        username, 
        password) VALUES (
            '$nik',
            '$nama',
            '$finalNamaFoto',
            '$jabatan',
            '$status',
            '$role',
            '$username',
            '$password')");


    header('location:../Administrator/?page=data-pegawai&pesan=berhasil');
}
