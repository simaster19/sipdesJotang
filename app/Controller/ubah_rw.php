<?php
session_start();
include 'koneksi.php';
if (isset($_POST['submit'])) {

    $id = $_POST['id'];

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

    $status = $_POST['status'];

    $queryFoto = mysqli_query($koneksi, "SELECT foto FROM perangkat_rt_rw WHERE id = '$id'");
    $dataFoto = mysqli_fetch_assoc($queryFoto);

    $splitFileImage = explode('.', $namaFoto);
    $extension = strtolower(end($splitFileImage));
    $typeExtension = ['jpg', 'jpeg', 'png'];
    if ($namaFoto == '') {
        $finalNamaFoto = $dataFoto['foto'];
    } elseif ($namaFoto !== '') {
        if (in_array($extension, $typeExtension)) {
            if ($sizeFoto < 10000000) {
                $finalNamaFoto = sha1($namaFoto) . rand(40, 99999) . "." . $extension;
                $targetUpload = '../../assets/images/foto/' . $finalNamaFoto;

                move_uploaded_file($tmpFoto, $targetUpload);
                unlink('../../assets/images/foto/' . $dataFoto['foto']);
            }
        }
    }



    $qSimpan = mysqli_query($koneksi, "UPDATE perangkat_rt_rw  SET
        nik='$nik', 
        nama='$nama', 
        foto='$finalNamaFoto',
        dusun='$dusun',
        rt='$rt',
        rw='$rw',
        desa='$desa',
        kecamatan='$kecamatan',
        kota='$kota',  
        status='$status' WHERE id='$id'
            
        ");


    header('location:../Administrator/?page=data-rw&pesan=update');
}
