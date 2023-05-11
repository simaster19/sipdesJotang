<?php
session_start();
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $userLogin = $_SESSION['username'];
    $queryPegawai = mysqli_query($koneksi, "SELECT id FROM pegawai WHERE username ='$userLogin'");
    $dataPegawai = mysqli_fetch_assoc($queryPegawai);
    $id_pegawai = $dataPegawai['id'];

    $namaFoto = $_FILES['foto']['name'];
    $tmpFoto = $_FILES['foto']['tmp_name'];
    $sizeFoto = $_FILES['foto']['size'];

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $dusun = $_POST['dusun'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];

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



    $qSimpan = mysqli_query($koneksi, "INSERT INTO perangkat_rt_rw (
        id_pegawai,
        nik, 
        nama, 
        foto,
        dusun,
        rt,
        rw,
        desa,
        kecamatan,
        kota, 
        jabatan, 
        status
) VALUES (
            '$id_pegawai',
            '$nik',
            '$nama',
            '$finalNamaFoto',
            '$dusun',
            '$rt',
            '$rw',
            '$desa',
            '$kecamatan',
            '$kota',
            'RT',
            '$status'
        )");


    header('location:../Administrator/?page=data-rt&pesan=berhasil');
}
