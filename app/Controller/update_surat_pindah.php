<?php

include 'koneksi.php';
session_start();
if (isset($_POST['submit'])) {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // die();

    $id = $_POST['id'];
    $userLogin = $_SESSION['username'];

    $pegawai = mysqli_query($koneksi, "SELECT id FROM pegawai WHERE username = '$userLogin'");
    $data = mysqli_fetch_assoc($pegawai);

    $id_surat = $_POST['id_surat'];
    $id_user = $data['id'];
    $id_profil_desa = 1;

    $no_kk                          = $_POST['no_kk'];
    $nik                            = $_POST['nik_pemohon'];
    $nama_pemohon                   = $_POST['nama_pemohon'];
    $jenis_permohonan               = $_POST['jenis_permohonan'];
    $alamat                         = $_POST['alamat'];
    $rt                             = $_POST['rt'];
    $rw                             = $_POST['rw'];
    $desa                           = $_POST['desa'];
    $kecamatan                      = $_POST['kecamatan'];
    $kota                           = $_POST['kota'];
    $kode_pos                       = $_POST['kode_pos'];
    $alamat_pindah                  = $_POST['alamat_lengkap_pindah'];
    $rt_pindah                      = $_POST['rt_pindah'];
    $rw_pindah                      = $_POST['rw_pindah'];
    $desa_pindah                    = $_POST['desa_pindah'];
    $kecamatan_pindah               = $_POST['kecamatan_pindah'];
    $kota_pindah                    = $_POST['kota_pindah'];
    $kode_pos_pindah                = $_POST['kode_pos_pindah'];
    $alasan_pindah                  = $_POST['alasan_pindah'];
    $jenis_kepindahan               = $_POST['jenis_kepindahan'];
    $anggota_keluarga_tidak_pindah  = $_POST['anggota_keluarga_tidak_pindah'];
    $anggota_keluarga_yang_pindah   = $_POST['anggota_keluarga_yang_pindah'];

    $nama_sponsor                   = $_POST['nama_sponsor'];
    $type_sponsor                   = $_POST['type_sponsor'];
    $alamat_sponsor                 = $_POST['alamat_sponsor'];
    $nomor_itas                     = $_POST['no_itas'];
    $masa_berlaku_itas              = $_POST['tanggal_itas'];
    $negara_tujuan                  = $_POST['negara_tujuan'];
    $alamat_tujuan                  = $_POST['alamat_tujuan'];
    $kode_negara                    = $_POST['kode_negara'];
    $penanggung_jawab               = $_POST['penanggung_jawab'];
    $rencana_pindah_tanggal         = $_POST['rencana_pindah_tanggal'];
    $no_hp                          = $_POST['no_hp'];
    $email                          = $_POST['alamat_email'];

    $ambil = 'PENDING';
    $updated_at = date('Y-m-d H:i:s', time());

    $simpan = mysqli_query($koneksi, "UPDATE surat_pindah SET 
    no_kk='$no_kk',
    nik='$nik',
    nama_pemohon='$nama_pemohon',
    jenis_permohonan='$jenis_permohonan',
    alamat='$alamat',
    rt='$rt',
    rw='$rw',
    desa='$desa',
    kecamatan='$kecamatan',
    kota='$kota',
    kode_pos='$kode_pos',
    alamat_pindah='$alamat_pindah',
    rt_pindah='$rt_pindah',
    rw_pindah='$rw_pindah',
    desa_pindah='$desa_pindah',
    kecamatan_pindah='$kecamatan_pindah',
    kota_pindah='$kota_pindah',
    kode_pos_pindah='$kode_pos_pindah',
    alasan_pindah='$alasan_pindah',
    jenis_kepindahan='$jenis_kepindahan',
    anggota_keluarga_tidak_pindah='$anggota_keluarga_tidak_pindah',
    anggota_keluarga_yang_pindah='$anggota_keluarga_yang_pindah',
    nama_sponsor='$nama_sponsor',
    type_sponsor='$type_sponsor',
    alamat_sponsor='$alamat_sponsor',
    nomor_itas='$nomor_itas',
    masa_berlaku_itas='$masa_berlaku_itas',
    negara_tujuan='$negara_tujuan',
    alamat_tujuan='$alamat_tujuan',
    kode_negara='$kode_negara',
    penanggung_jawab='$penanggung_jawab',
    rencana_pindah_tanggal='$rencana_pindah_tanggal',
    no_hp='$no_hp',
    email='$email',
    updated_at='$updated_at' WHERE id='$id'");

    $querySuratPindah = mysqli_query($koneksi, "SELECT id FROM surat_pindah WHERE nik = '$nik'");
    $dataSurat = mysqli_fetch_assoc($querySuratPindah);

    $dataId = $dataSurat['id'];

    //Array
    $id_anggota                     = $_POST['id_anggota'];
    $nik_anggota                    = $_POST['nik_anggota'];
    $nama_anggota                   = $_POST['nama_anggota'];




    for ($i = 0; $i < count($nik_anggota); $i++) {
        $y = $nik_anggota[$i];
        $n = $nama_anggota[$i];
        $idAnggota = $id_anggota[$i];

        $sqlSimpan = mysqli_query($koneksi, "UPDATE anggota_keluarga SET nik_anggota='$y',nama_anggota='$n' WHERE id='$idAnggota'");
    }

    header('location:../Administrator/?page=surat-pindah&pesan=update');
}
