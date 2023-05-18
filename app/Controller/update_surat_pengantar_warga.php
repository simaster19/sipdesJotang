<?php

include 'koneksi.php';
session_start();
if (isset($_POST['submit'])) {


    $userLogin = $_SESSION['username'];

    $pegawai = mysqli_query($koneksi, "SELECT id FROM pegawai WHERE username = '$userLogin'");
    $data = mysqli_fetch_assoc($pegawai);

    $id_surat = $_POST['id_surat'];
    $id_user = $data['id'];
    $id_profil_desa = 1;

    $ids                = $_POST['ids'];
    $nik                = $_POST['nik'];
    $nama               = $_POST['nama'];
    $no_kk              = $_POST['no_kk'];
    $tempat_lahir       = $_POST['tempat_lahir'];
    $tanggal_lahir      = $_POST['tanggal_lahir'];
    $kewarganegaraan    = $_POST['kewarganegaraan'];
    $agama              = $_POST['agama'];
    $pekerjaan          = $_POST['pekerjaan'];
    $alamat             = $_POST['alamat'];
    $rt                 = $_POST['rt'];
    $rw                 = $_POST['rw'];
    $desa               = $_POST['desa'];
    $kecamatan          = $_POST['kecamatan'];
    $kota               = $_POST['kota'];
    $keperluan          = $_POST['keperluan'];
    $berlaku_tgl        = $_POST['berlaku_tgl'];
    $berakhir_tgl       = $_POST['berakhir_tgl'];
    $keterangan         = $_POST['keterangan'];

    $ambil = 'PENDING';
    $updated_at = date('Y-m-d', time());

    $simpan = mysqli_query($koneksi, "UPDATE surat_pengantar_warga SET 
        nik='$nik',
        nama='$nama',
        no_kk='$no_kk',
        tempat_lahir='$tempat_lahir',
        tanggal_lahir='$tanggal_lahir',
        kewarganegaraan='$kewarganegaraan',
        agama='$agama',
        pekerjaan='$pekerjaan',
        alamat='$alamat',
        rt='$rt',
        rw='$rw',
        desa='$desa',
        kecamatan='$kecamatan',
        kota='$kota',
        keperluan='$keperluan',
        berlaku_tgl='$berlaku_tgl',
        berakhir_tgl='$berakhir_tgl',
        keterangan='$keterangan',
        updated_at='$updated_at' WHERE id='$ids'");

    header('location:../Administrator/?page=surat-pengantar-warga&pesan=update');
}
