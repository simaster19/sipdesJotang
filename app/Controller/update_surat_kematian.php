<?php

include 'koneksi.php';
session_start();
if (isset($_POST['submit'])) {


    $userLogin = $_SESSION['username'];

    $pegawai = mysqli_query($koneksi, "SELECT id FROM pegawai WHERE username = '$userLogin'");
    $data = mysqli_fetch_assoc($pegawai);

    $ids = $_POST['ids'];
    $id_ibu = $_POST['id_ibu'];
    $id_ayah = $_POST['id_ayah'];
    $id_pelapor = $_POST['id_pelapor'];
    $id_user = $data['id'];
    $id_profil_desa = 1;


    $nama_kk                = $_POST['nama_kk'];
    $no_kk                  = $_POST['no_kk'];
    $nik_jenazah            = $_POST['nik_jenazah'];
    $nama_jenazah           = $_POST['nama_jenazah'];
    $tanggal_lahir_jenazah  = $_POST['tanggal_lahir_jenazah'];
    $umur_jenazah           = $_POST['umur_jenazah'];
    $tempat_lahir_jenazah   = $_POST['tempat_lahir_jenazah'];
    $agama_jenazah          = $_POST['agama_jenazah'];
    $pekerjaan_jenazah      = $_POST['pekerjaan_jenazah'];
    $jenis_kelamin_jenazah  = $_POST['jenis_kelamin_jenazah'];
    $alamat_jenazah         = $_POST['alamat_jenazah'];
    $rt_jenazah             = $_POST['rt_jenazah'];
    $rw_jenazah             = $_POST['rw_jenazah'];
    $desa_jenazah           = $_POST['desa_jenazah'];
    $kecamatan_jenazah      = $_POST['kecamatan_jenazah'];
    $kota_jenazah           = $_POST['kota_jenazah'];
    $anak_ke_jenazah        = $_POST['anak_ke_jenazah'];
    $tanggal_kematian       = $_POST['tanggal_kematian'];
    $jam_kematian           = $_POST['jam_kematian'];
    $sebab_kematian         = $_POST['sebab_kematian'];
    $tempat_kematian        = $_POST['tempat_kematian'];
    $yang_menerangkan       = $_POST['yang_menerangkan'];

    $ambil = 'PENDING';
    $updated_at = date('Y-m-d', time());


    $nik_ibu                = $_POST['nik_ibu'];
    $nama_ibu               = $_POST['nama_ibu'];
    $tanggal_lahir_ibu      = $_POST['tanggal_lahir_ibu'];
    $umur_ibu               = $_POST['umur_ibu'];
    $pekerjaan_ibu          = $_POST['pekerjaan_ibu'];
    $alamat_ibu             = $_POST['alamat_ibu'];
    $rt_ibu                 = $_POST['rt_ibu'];
    $rw_ibu                 = $_POST['rw_ibu'];
    $desa_ibu               = $_POST['desa_ibu'];
    $kecamatan_ibu          = $_POST['kecamatan_ibu'];
    $kota_ibu               = $_POST['kota_ibu'];

    //Insert Ibu
    $sqlIbu = mysqli_query($koneksi, "UPDATE ibu SET 
    nik_ibu='$nik_ibu',
    nama_ibu ='$nama_ibu',
    tanggal_lahir_ibu='$tanggal_lahir_ibu',
    umur_ibu='$umur_ibu',
    pekerjaan_ibu='$pekerjaan_ibu',
    alamat_ibu='$alamat_ibu',
    rt_ibu='$rt_ibu',
    rw_ibu='$rw_ibu',
    desa_ibu='$desa_ibu',
    kecamatan_ibu='$kecamatan_ibu',
    kota_ibu='$kota_ibu' WHERE id_ibu='$id_ibu'");


    $nik_ayah                = $_POST['nik_ayah'];
    $nama_ayah               = $_POST['nama_ayah'];
    $tanggal_lahir_ayah      = $_POST['tanggal_lahir_ayah'];
    $umur_ayah               = $_POST['umur_ayah'];
    $pekerjaan_ayah          = $_POST['pekerjaan_ayah'];
    $alamat_ayah             = $_POST['alamat_ayah'];
    $rt_ayah                 = $_POST['rt_ayah'];
    $rw_ayah                 = $_POST['rw_ayah'];
    $desa_ayah               = $_POST['desa_ayah'];
    $kecamatan_ayah          = $_POST['kecamatan_ayah'];
    $kota_ayah               = $_POST['kota_ayah'];

    //Insert Ayah
    $sqlAyah = mysqli_query($koneksi, "UPDATE ayah SET 
    nik_ayah='$nik_ayah',
    nama_ayah ='$nama_ayah',
    tanggal_lahir_ayah='$tanggal_lahir_ayah',
    umur_ayah='$umur_ayah',
    pekerjaan_ayah='$pekerjaan_ayah',
    alamat_ayah='$alamat_ayah',
    rt_ayah='$rt_ayah',
    rw_ayah='$rw_ayah',
    desa_ayah='$desa_ayah',
    kecamatan_ayah='$kecamatan_ayah',
    kota_ayah='$kota_ayah' WHERE id_ayah='$id_ayah'");

    $nik_pelapor                = $_POST['nik_pelapor'];
    $nama_pelapor               = $_POST['nama_pelapor'];
    $tanggal_lahir_pelapor      = $_POST['tanggal_lahir_pelapor'];
    $umur_pelapor               = $_POST['umur_pelapor'];
    $pekerjaan_pelapor          = $_POST['pekerjaan_pelapor'];
    $alamat_pelapor             = $_POST['alamat_pelapor'];
    $rt_pelapor                 = $_POST['rt_pelapor'];
    $rw_pelapor                 = $_POST['rw_pelapor'];
    $desa_pelapor               = $_POST['desa_pelapor'];
    $kecamatan_pelapor          = $_POST['kecamatan_pelapor'];
    $kota_pelapor               = $_POST['kota_pelapor'];

    //Insert Pelapor
    $sqlPelapor = mysqli_query($koneksi, "UPDATE pelapor SET 
    nik_pelapor='$nik_pelapor',
    nama_pelapor ='$nama_pelapor',
    tanggal_lahir_pelapor='$tanggal_lahir_pelapor',
    umur_pelapor='$umur_pelapor',
    pekerjaan_pelapor='$pekerjaan_pelapor',
    alamat_pelapor='$alamat_pelapor',
    rt_pelapor='$rt_pelapor',
    rw_pelapor='$rw_pelapor',
    desa_pelapor='$desa_pelapor',
    kecamatan_pelapor='$kecamatan_pelapor',
    kota_pelapor='$kota_pelapor' WHERE id_pelapor='$id_pelapor'");



    $id_saksi1                 = $_POST['id_saksi1'];
    $nik_saksi1                = $_POST['nik_saksi1'];
    $nama_saksi1               = $_POST['nama_saksi1'];
    $tanggal_lahir_saksi1      = $_POST['tanggal_lahir_saksi1'];
    $umur_saksi1               = $_POST['umur_saksi1'];
    $pekerjaan_saksi1          = $_POST['pekerjaan_saksi1'];
    $alamat_saksi1             = $_POST['alamat_saksi1'];
    $rt_saksi1                 = $_POST['rt_saksi1'];
    $rw_saksi1                 = $_POST['rw_saksi1'];
    $desa_saksi1               = $_POST['desa_saksi1'];
    $kecamatan_saksi1          = $_POST['kecamatan_saksi1'];
    $kota_saksi1               = $_POST['kota_saksi1'];


    $id_saksi2                 = $_POST['id_saksi2'];
    $nik_saksi2                = $_POST['nik_saksi2'];
    $nama_saksi2               = $_POST['nama_saksi2'];
    $tanggal_lahir_saksi2      = $_POST['tanggal_lahir_saksi2'];
    $umur_saksi2               = $_POST['umur_saksi2'];
    $pekerjaan_saksi2          = $_POST['pekerjaan_saksi2'];
    $alamat_saksi2             = $_POST['alamat_saksi2'];
    $rt_saksi2                 = $_POST['rt_saksi2'];
    $rw_saksi2                 = $_POST['rw_saksi2'];
    $desa_saksi2               = $_POST['desa_saksi2'];
    $kecamatan_saksi2          = $_POST['kecamatan_saksi2'];
    $kota_saksi2               = $_POST['kota_saksi2'];







    //Insert Surat kelahiran
    $simpan = mysqli_query($koneksi, "UPDATE surat_kematian SET 
    id_pegawai='$id_user',
    id_profil_desa='$id_profil_desa',
    nama_kk='$nama_kk',
    no_kk='$no_kk',
    nik_jenazah='$nik_jenazah',
    nama_jenazah='$nama_jenazah',
    tanggal_lahir_jenazah='$tanggal_lahir_jenazah',
    umur_jenazah='$umur_jenazah',
    tempat_lahir_jenazah='$tempat_lahir_jenazah',
    agama_jenazah='$agama_jenazah',
    pekerjaan_jenazah='$pekerjaan_jenazah',
    jenis_kelamin_jenazah='$jenis_kelamin_jenazah',
    alamat_jenazah='$alamat_jenazah',
    rt_jenazah='$rt_jenazah',
    rw_jenazah='$rw_jenazah',
    desa_jenazah='$desa_jenazah',
    kecamatan_jenazah='$kecamatan_jenazah',
    kota_jenazah='$kota_jenazah',
    anak_ke_jenazah='$anak_ke_jenazah',
    tanggal_kematian='$tanggal_kematian',
    jam_kematian='$jam_kematian',
    sebab_kematian='$sebab_kematian',
    tempat_kematian='$tempat_kematian',
    yang_menerangkan='$yang_menerangkan',
    updated_at='$updated_at' WHERE id = '$ids'");


    if ($nik_saksi1 !== '' || $nama_saksi1 !== '') {
        //Insert Saksi1
        $sqlSaksi1 = mysqli_query($koneksi, "UPDATE saksi SET 
        nik_saksi='$nik_saksi1',
        nama_saksi='$nama_saksi1',
        tanggal_lahir_saksi='$tanggal_lahir_saksi1',
        umur_saksi='$umur_saksi1',
        pekerjaan_saksi='$pekerjaan_saksi1',
        alamat_saksi='$alamat_saksi1',
        rt_saksi='$rt_saksi1',
        rw_saksi='$rw_saksi1',
        desa_saksi='$desa_saksi1',
        kecamatan_saksi='$kecamatan_saksi1',
        kota_saksi='$kota_saksi1' WHERE (id = '$id_saksi1' AND id_data_surat = '$ids')");
    }

    if ($nik_saksi2 !== '' || $nama_saksi2 !== '') {
        //Insert Saksi2
        $sqlSaksi2 = mysqli_query($koneksi, "UPDATE saksi SET 
        nik_saksi='$nik_saksi2',
        nama_saksi='$nama_saksi2',
        tanggal_lahir_saksi='$tanggal_lahir_saksi2',
        umur_saksi='$umur_saksi2',
        pekerjaan_saksi='$pekerjaan_saksi2',
        alamat_saksi='$alamat_saksi2',
        rt_saksi='$rt_saksi2',
        rw_saksi='$rw_saksi2',
        desa_saksi='$desa_saksi2',
        kecamatan_saksi='$kecamatan_saksi2',
        kota_saksi='$kota_saksi2' WHERE id = '$id_saksi2' AND id_data_surat = '$ids'");
    }





    header('location:../Administrator/?page=surat-kematian&pesan=update');
}
