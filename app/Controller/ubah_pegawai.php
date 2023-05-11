<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];

    $namaFoto = $_FILES['foto']['name'];

    $tmpFoto = $_FILES['foto']['tmp_name'];
    $sizeFoto = $_FILES['foto']['size'];

    $splitFileImage = explode('.', $namaFoto);
    $extension = strtolower(end($splitFileImage));
    $typeExtension = ['jpg', 'jpeg', 'png'];

    $queryFoto = mysqli_query($koneksi, "SELECT foto,password FROM pegawai WHERE id = '$id'");
    $dataFoto = mysqli_fetch_assoc($queryFoto);

    if ($_POST['hakakses'] == '') {
        if ($namaFoto == '') {
            $finalNamaFoto = $dataFoto['foto'];
        } elseif ($namaFoto !== '') {

            if (in_array($extension, $typeExtension)) {
                if ($sizeFoto < 10000000) {
                    $finalNamaFoto = sha1($namaFoto)  . rand(40, 99999) .  "." . $extension;
                    $targetUpload = '../../assets/images/foto/' . $finalNamaFoto;

                    move_uploaded_file($tmpFoto, $targetUpload);
                    unlink('../../assets/images/foto/' . $dataFoto['foto']);
                }
            }
        }

        $qSimpan = mysqli_query($koneksi, "UPDATE pegawai SET
            nik='$nik', 
            nama='$nama', 
            foto='$finalNamaFoto', 
            jabatan='$jabatan', 
            status='$status' WHERE id = '$id'");
    } elseif ($_POST['hakakses'] == 'ADMIN') {
        if ($namaFoto == '') {
            $finalNamaFoto = $dataFoto['foto'];
        } elseif ($namaFoto !== '') {

            if (in_array($extension, $typeExtension)) {
                if ($sizeFoto < 10000000) {
                    $finalNamaFoto = sha1($namaFoto)  . rand(40, 99999) .  "." . $extension;
                    $targetUpload = '../../assets/images/foto/' . $finalNamaFoto;

                    move_uploaded_file($tmpFoto, $targetUpload);
                    unlink('../../assets/images/foto/' . $dataFoto['foto']);
                }
            }
        }

        if (isset($_POST['role']) == true) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($password == '') {
                $password = $dataFoto['password'];
            }

            $role = 'ADMIN';
        } else {
            $username = '';
            $password = '';
            $role = '';
        }

        $qSimpan = mysqli_query($koneksi, "UPDATE pegawai SET
            nik='$nik', 
            nama='$nama', 
            foto='$finalNamaFoto', 
            jabatan='$jabatan', 
            status='$status', 
            role='$role', 
            username='$username', 
            password='$password' WHERE id='$id'");
    }


    if ($qSimpan) {
        header('location:../Administrator/?page=data-pegawai&pesan=berhasil');
    }
}
