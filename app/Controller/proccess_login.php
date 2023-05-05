<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username'");
$cek = mysqli_num_rows($query);
if ($cek > 0) {
    $login  = mysqli_fetch_assoc($query);

    if ($login['role'] == "ADMIN") {
        $_SESSION['username'] = $username;
        $_SESSION['lvl'] = "Administrator";

        header("location:../Administrator");
    }
} else {
    header("location:../../index.php?pesan=gagal");
}
