<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $name = $_POST['name'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];


    if (!$name || !$nik || !$jabatan) {
        header('location:../Administrator/?page=data-pegawai&pesan=gagal');
    } else {
        $qUpdate = mysqli_query($koneksi, "UPDATE pegawai SET nik = '$nik', name= '$name', jabatan = '$jabatan', status= '$status' WHERE id = '$id'");
        header('location:../Administrator/?page=data-pegawai&pesan=update');
    }
}
