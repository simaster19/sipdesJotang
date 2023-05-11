<?php

include 'koneksi.php';

$id = $_POST['id'];

$rt = mysqli_query($koneksi, "SELECT foto FROM perangkat_rt_rw WHERE id='$id'");
$dataFoto = mysqli_fetch_assoc($rt);

$sql = mysqli_query($koneksi, "DELETE FROM perangkat_rt_rw where id='$id'");

if ($sql) {
    unlink('../../assets/images/foto/' . $dataFoto['foto']);
}
header('location:../Administrator/?page=data-rt&pesan=hapus');
