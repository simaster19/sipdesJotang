<?php

include './../../Controller/koneksi.php';

$kepdes = 'KEPDES';
$sekretaris = 'SEKRETARIS LURAH';
$kasiPemerintahan = 'KASI PEMERINTAHAN DAN YANUM';
$kasiPemberdayaan = 'KASI PEMBERDAYAAN MASYARAKAT';
$kasiTrantib = 'KASI TRANTIB';
$staff = 'STAFF';

$array = [];
$sql = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE role != 'ADMIN'");

while ($data = mysqli_fetch_assoc($sql)) {
    $array[] = $data;
}



print_r(json_encode($array));
