<?php

$page = $_GET['page'];

if ($page == NULL) {
    include 'content/index.php';
} elseif ($page == 'data-pegawai') {
    include 'content/data_pegawai.php';
    $_POST['title'] = "Data Pegawai";
} elseif ($page == 'surat-kelahiran') {
    include 'content/surat_kelahiran.php';
} elseif ($page == 'surat-kematian') {
    include 'content/surat_kematian.php';
} elseif ($page == 'surat-pengantar-warga') {
    include 'content/surat_pengantar_warga.php';
} elseif ($page == 'surat-pengantar-dinas') {
    include 'content/surat_pengantar_dinas.php';
} elseif ($page == 'surat-pindah') {
    include 'content/surat_pindah.php';
} elseif ($page == 'surat-menyurat') {
    include 'content/surat_menyurat.php';
} elseif ($page == 'data-organisasi') {
    include 'content/data_organisasi.php';
} elseif ($page == 'data-rt') {
    include 'content/data_rt.php';
} elseif ($page == 'data-rw') {
    include 'content/data_rw.php';
}
