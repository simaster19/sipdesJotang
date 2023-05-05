<?php
include 'koneksi.php';

function querySurats()
{
    global $koneksi;
    $qTampil = mysqli_query($koneksi, "SELECT * FROM surats");
    while ($data = mysqli_fetch_assoc($qTampil)) {
        $rows[] = $data;
    }
    return $rows;
}

function queryPegawai()
{
    global $koneksi;

    $qTampil = mysqli_query($koneksi, "SELECT * FROM pegawai");
    while ($data = mysqli_fetch_assoc($qTampil)) {
        $rows[] = $data;
    }

    return $rows;
}

function querySuratKelahiran()
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_kelahiran.id as ids, surat_kelahiran.*, surats.*, desa.*, pegawai.* FROM surat_kelahiran LEFT JOIN surats ON surat_kelahiran.id_surat = surats.id LEFT JOIN desa ON surat_kelahiran.id_profil_desa = desa.id LEFT JOIN pegawai ON surat_kelahiran.id_pegawai = pegawai.id ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}


function querySuratKematian()
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_kematian.id as ids, surat_kematian.*, surats.*, desa.*, pegawai.* FROM surat_kematian LEFT JOIN surats ON surat_kematian.id_surat = surats.id LEFT JOIN desa ON surat_kematian.id_profil_desa = desa.id LEFT JOIN users ON surat_kematian.id_pegawai = pegawai.id ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}
