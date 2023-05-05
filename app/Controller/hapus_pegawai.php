<?php

include 'koneksi.php';

$id = $_GET['id'];

$sql = mysqli_query($koneksi, "DELETE FROM pegawai where id='$id'");
header('location:../Administrator/?page=data-pegawai&pesan=hapus');
