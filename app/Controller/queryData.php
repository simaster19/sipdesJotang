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

function printSuratKelahiran($id)
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_kelahiran.id as ids, surat_kelahiran.*, surats.*, desa.*, pegawai.id, pegawai.nama,pegawai.jabatan, ayah.*, ibu.*, pelapor.* FROM surat_kelahiran 
    LEFT JOIN surats ON surat_kelahiran.id_surat = surats.id 
    LEFT JOIN desa ON surat_kelahiran.id_profil_desa = desa.id 
    LEFT JOIN pegawai ON surat_kelahiran.id_pegawai = pegawai.id
    LEFT JOIN ayah ON surat_kelahiran.id_ayah = ayah.id_ayah 
    LEFT JOIN ibu ON surat_kelahiran.id_ibu = ibu.id_ibu
    LEFT JOIN pelapor ON surat_kelahiran.id_pelapor = pelapor.id_pelapor WHERE surat_kelahiran.id = '$id'
    ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}

function printSuratKematian($id)
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_kematian.id as ids, surat_kematian.*, surats.*, desa.*, pegawai.id, pegawai.nama,pegawai.jabatan, ayah.*, ibu.*, pelapor.* FROM surat_kematian 
    LEFT JOIN surats ON surat_kematian.id_surat = surats.id 
    LEFT JOIN desa ON surat_kematian.id_profil_desa = desa.id 
    LEFT JOIN pegawai ON surat_kematian.id_pegawai = pegawai.id
    LEFT JOIN ayah ON surat_kematian.id_ayah = ayah.id_ayah 
    LEFT JOIN ibu ON surat_kematian.id_ibu = ibu.id_ibu
    LEFT JOIN pelapor ON surat_kematian.id_pelapor = pelapor.id_pelapor WHERE surat_kematian.id = '$id'
    ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}

function printSuratPengantarWarga($id)
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_pengantar_warga.*, surat_pengantar_warga.id as ids, surat_pengantar_warga.nama as nama_lengkap, surats.id, desa.*, surats.nama_surat, surats.no_surat FROM surat_pengantar_warga 
    LEFT JOIN surats ON surat_pengantar_warga.id_surat = surats.id 
    LEFT JOIN desa ON surat_pengantar_warga.id_profil_desa = desa.id WHERE surat_pengantar_warga.id='$id'
    ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}

function printSuratPengantarDinas($id)
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_pengantar_dinas.*, surat_pengantar_dinas.id as ids, surats.id, desa.*, surats.nama_surat, surats.no_surat FROM surat_pengantar_dinas 
    LEFT JOIN surats ON surat_pengantar_dinas.id_surat = surats.id 
    LEFT JOIN desa ON surat_pengantar_dinas.id_profil_desa = desa.id WHERE surat_pengantar_dinas.id='$id'
    ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}

function printSuratPindah($id)
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_pindah.*, surat_pindah.id as ids, surats.id, desa.*, surats.nama_surat, surats.no_surat FROM surat_pindah 
    LEFT JOIN surats ON surat_pindah.id_surat = surats.id 
    LEFT JOIN desa ON surat_pindah.id_profil_desa = desa.id WHERE surat_pindah.id='$id'
    ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}


function querySuratKelahiran()
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_kelahiran.id as ids, surat_kelahiran.*, surats.*, desa.*, pegawai.id, pegawai.nama, ayah.*, ibu.*, pelapor.* FROM surat_kelahiran 
    LEFT JOIN surats ON surat_kelahiran.id_surat = surats.id 
    LEFT JOIN desa ON surat_kelahiran.id_profil_desa = desa.id 
    LEFT JOIN pegawai ON surat_kelahiran.id_pegawai = pegawai.id
    LEFT JOIN ayah ON surat_kelahiran.id_ayah = ayah.id_ayah
    LEFT JOIN ibu ON surat_kelahiran.id_ibu = ibu.id_ibu
    LEFT JOIN pelapor ON surat_kelahiran.id_pelapor = pelapor.id_pelapor
    ");

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


    $qTampil = mysqli_query($koneksi, "SELECT surat_kematian.id as ids, surat_kematian.*, surats.*, desa.*, pegawai.id, pegawai.nama, ayah.*, ibu.*, pelapor.* FROM surat_kematian 
    LEFT JOIN surats ON surat_kematian.id_surat = surats.id 
    LEFT JOIN desa ON surat_kematian.id_profil_desa = desa.id 
    LEFT JOIN pegawai ON surat_kematian.id_pegawai = pegawai.id
    LEFT JOIN ayah ON surat_kematian.id_ayah = ayah.id_ayah
    LEFT JOIN ibu ON surat_kematian.id_ibu = ibu.id_ibu
    LEFT JOIN pelapor ON surat_kematian.id_pelapor = pelapor.id_pelapor
    ");

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


    $qTampil = mysqli_query($koneksi, "SELECT surat_pengantar_warga.*, surat_pengantar_warga.id as ids, surat_pengantar_warga.nama as nama_lengkap, surats.id, surats.nama_surat, surats.no_surat FROM surat_pengantar_warga 
    LEFT JOIN surats ON surat_pengantar_warga.id_surat = surats.id 
    ");

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


    $qTampil = mysqli_query($koneksi, "SELECT surat_pengantar_dinas.id as ids, surat_pengantar_dinas.*, surats.* FROM surat_pengantar_dinas 
    LEFT JOIN surats ON surat_pengantar_dinas.id_surat = surats.id 
    ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}

function querySuratPindah()
{
    global $koneksi;


    $qTampil = mysqli_query($koneksi, "SELECT surat_pindah.id as ids, surat_pindah.*, surats.* FROM surat_pindah 
    LEFT JOIN surats ON surat_pindah.id_surat = surats.id 

    ");

    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}


//Dashboard
function countDataPegawai()
{
    global $koneksi;
    $qTampil = mysqli_query($koneksi, "SELECT * FROM pegawai");

    $rows = [];

    foreach ($qTampil as $data) {
        $rows[] = $data;
    }


    return $rows;
}

function countDataSurat()
{
    global $koneksi;

    $qTampil = mysqli_query($koneksi, "SELECT surats.id as ids ,surat_kelahiran.*,surat_kematian.*,surat_pengantar_dinas.*, surat_pengantar_warga.*, surat_pindah.* FROM surats
    LEFT JOIN surat_kelahiran ON surats.id = surat_kelahiran.id_surat
    LEFT JOIN surat_kematian ON surats.id = surat_kematian.id_surat
    LEFT JOIN surat_pengantar_dinas ON surats.id = surat_pengantar_dinas.id_surat
    LEFT JOIN surat_pengantar_warga ON surats.id = surat_pengantar_warga.id_surat
    LEFT JOIN surat_pindah ON surats.id = surat_pindah.id_surat");


    $rows = [];
    if ($qTampil->num_rows > 0) {
        foreach ($qTampil as $data) {
            $rows[] = $data;
        }
    }

    return $rows;
}
