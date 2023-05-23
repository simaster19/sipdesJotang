<?php
include 'koneksi.php';

$id = $_GET['id'];
$updated_at = date('Y-m-d H:i:s', time());
$sqlUpdate = mysqli_query($koneksi, "UPDATE surat_pengantar_warga SET ambil='SELESAI',updated_at='$updated_at' WHERE id='$id'");

header('location:../Administrator/?page=surat-pengantar-warga&pesan=update');
