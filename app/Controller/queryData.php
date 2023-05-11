<?php
include 'koneksi.php';

//Query Pegawai
function queryPegawai()
{
    global $koneksi;

    $qTampil = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY id DESC");
    while ($data = mysqli_fetch_assoc($qTampil)) {
        $rows[] = $data;
    }

    return $rows;
}

//Query RT
function queryRt()
{
    global $koneksi;

    $qTampil = mysqli_query($koneksi, "SELECT * FROM perangkat_rt_rw WHERE jabatan='RT' ORDER BY id DESC");
    while ($data = mysqli_fetch_assoc($qTampil)) {
        $rows[] = $data;
    }

    return $rows;
}

//Query RW
function queryRw()
{
    global $koneksi;

    $qTampil = mysqli_query($koneksi, "SELECT * FROM perangkat_rt_rw WHERE jabatan='RW' ORDER BY id DESC");
    while ($data = mysqli_fetch_assoc($qTampil)) {
        $rows[] = $data;
    }

    return $rows;
}


function querySurats()
{
    global $koneksi;
    $qTampil = mysqli_query($koneksi, "SELECT * FROM surats");
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


    $qTampil = mysqli_query($koneksi, "SELECT surat_kematian.id as ids, surat_kematian.*, surats.*, desa.*, pegawai.* FROM surat_kematian LEFT JOIN surats ON surat_kematian.id_surat = surats.id LEFT JOIN desa ON surat_kematian.id_profil_desa = desa.id LEFT JOIN pegawai ON surat_kematian.id_pegawai = pegawai.id ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}

function querySuratPengantarWarga()
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_pengantar_warga.id as ids, surat_pengantar_warga.*, surats.*, desa.*, pegawai.* FROM surat_pengantar_warga LEFT JOIN surats ON surat_pengantar_warga.id_surat = surats.id LEFT JOIN desa ON surat_pengantar_warga.id_profil_desa = desa.id LEFT JOIN pegawai ON surat_pengantar_warga.id_pegawai = pegawai.id ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}

function querySuratPengantarDinas()
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_pengantar_dinas.id as ids, surat_pengantar_dinas.*, surats.*, desa.*, pegawai.* FROM surat_pengantar_dinas LEFT JOIN surats ON surat_pengantar_dinas.id_surat = surats.id LEFT JOIN desa ON surat_pengantar_dinas.id_profil_desa = desa.id LEFT JOIN pegawai ON surat_pengantar_dinas.id_pegawai = pegawai.id ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}
