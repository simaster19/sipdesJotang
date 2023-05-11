<?php

include 'koneksi.php';

$id = $_POST['id'];

$pegawai = mysqli_query($koneksi, "SELECT foto FROM pegawai WHERE id='$id'");
$dataFoto = mysqli_fetch_assoc($pegawai);

$sql = mysqli_query($koneksi, "DELETE FROM pegawai where id='$id'");

if ($sql) {
    unlink('../../assets/images/foto/' . $dataFoto['foto']);
}
header('location:../Administrator/?page=data-pegawai&pesan=hapus');
