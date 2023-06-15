<?php
include "../../../Controller/koneksi.php";
include "../../../Controller/queryData.php";
$id = $_GET['id'];

$datas = printSuratPengantarWarga($id);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar Warga</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }



        .logo {
            float: left;
            position: absolute;
            margin-left: 5px;
            width: 90px;
            height: 90px;
        }

        .header {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            font-weight: bold;
        }

        .header .sub-header {
            font-weight: 300;
        }

        .hr-bold {
            height: 0;
            border: 0.1rem solid black;
        }

        .hr-no-bold {
            margin-top: 1px;
        }

        .kode-pos {
            text-align: right;
            font-weight: bold;
            margin: 3px 5px 5px 0;
        }

        .tanggal-surat {
            width: 200px;
            position: absolute;
            right: 0;
        }

        .tanggal-surat p {
            text-align: left;
        }

        .tanggal-end-surat {
            width: 220px;
            margin-top: 2rem;
            position: absolute;
            right: 0;
        }

        .tanggal-end-surat p {
            text-align: center;
        }

        .content-surat {
            padding: 100px;
            border-collapse: collapse;
            width: 90%;
            text-align: left;
            margin-left: auto;
            margin-right: auto;
            margin-top: 1.2rem;
        }

        .tembusan {
            margin-top: 20rem;
            margin-left: 3rem;
            text-align: left;
        }

        .judul {
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            border-collapse: collapse;
        }

        .footer {
            margin-left: auto;
            margin-right: auto;
            width: 90%;
            border-collapse: collapse;
            text-align: center;
        }

        .underline {
            border-bottom: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    $i = 1;
    foreach ($datas as $data) {
    ?>
        <img src="./../../../../assets/images/logo/logo2.png" class="logo" alt="">
        <table class="header">

            <tr>
                <th>PEMERINTAH <?= strtoupper($data['kota']) ?></th>
            </tr>
            <tr>
                <th>KECAMATAN <?= strtoupper($data['kecamatan']) ?></th>
            </tr>
            <tr>
                <th>KELURAHAN <?= strtoupper($data['nama_desa']) ?></th>
            </tr>
            <tr class="sub-header">
                <td>Gang Janur No.02 RT.02/RW.01 Jotang</td>
            </tr>
        </table>
        <p class="kode-pos">Kode Pos : 51316</p>
        <hr class="hr-bold">
        <hr class="hr-no-bold">
        <h4>KODE WILAYAH : 33.234434.454</h4>
        <table class="judul">
            <tr>
                <th rowspan="2">SURAT</th>
                <th class="underline">KETERANGAN</th>
            </tr>
            <tr>
                <th>PENGANTAR</th>
            </tr>
        </table>

        <p style="text-align: center;">Nomor : 02030/ /JTG</p>
        <p style="text-align: center;">Yang bertanda tangan dibawah ini. menerangkan bahwa :</p>

        <table class="content-surat" style="padding: 10px; border-collapse:collapse;">
            <tr>
                <td>1.</td>
                <td>Nama</td>
                <td>:</td>
                <td><?= $data['nama'] ?></td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Tempat dan Tanggal Lahir</td>
                <td>:</td>
                <td><?= $data['tempat_lahir'] ?> / <?= $data['tanggal_lahir'] ?></td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Kewarganegaraan dan Agama</td>
                <td>:</td>
                <td><?= $data['kewarganegaraan'] ?> / <?= $data['agama'] ?></td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?= $data['pekerjaan'] ?></td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Alamat Tempat Tinggal</td>
                <td>:</td>
                <td><?= $data['alamat'] ?> , RT:<?= $data['rt'] ?> , RW:<?= $data['rw'] ?> , Desa:<?= $data['desa'] ?> , Kecamatan:<?= $data['kecamatan'] ?>, Kota:<?= $data['kota'] ?></td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Surat Bukti Diri (KTP/KK)</td>
                <td>:</td>
                <td><?= $data['nik'] ?></td>
            </tr>
            <tr>
                <td>7.</td>
                <td>Keperluan</td>
                <td>:</td>
                <td><?= $data['keperluan'] ?></td>
            </tr>
            <tr>
                <td>8.</td>
                <td>Berlaku Mulai</td>
                <td>:</td>
                <td><?= $data['berlaku_tgl'] ?> - <?= $data['berakhir_tgl'] ?></td>
            </tr>
            <tr>
                <td>9.</td>
                <td>Keterangan lain-lain</td>
                <td>:</td>
                <td><?= $data['keterangan'] ?></td>
            </tr>
        </table>

        <p style="text-align: center; margin-top:1rem;">Demikian untuk menjadikan maklum bagi yang berkepentingan</p>
        <p style="text-align: center;">Nomor :..................................................</p>
        <p style="text-align: center;">Tanggal :..................................................</p>
        <p style="text-align: right; margin-top:2rem;">JOTANG, <?= $data['created_at'] ?></p>
        <p style="text-align: center; margin-bottom:2rem;">Mengetahui,</p>


        <table class="footer">
            <tr>
                <td>Tanda Tangan Pemegang <br> <br> <br> <br> <br> <br> </td>
                <td>LURAH JOTANG <br><br><br> <br><br> <br></td>
            </tr>
            <tr>

                <td class="space-ttd"><?= $data['nama'] ?></td>
                <?php
                $sqlDesa = mysqli_query($koneksi, "SELECT nama,jabatan,status FROM pegawai WHERE jabatan='KEPDES' AND status=1");
                $dataKepdes = mysqli_fetch_assoc($sqlDesa);

                ?>
                <td class="space-ttd"><?= $dataKepdes['nama'] ?><br>Penata Tingkat 1 <br>NIP:989898</td>
            </tr>

        </table>
    <?php
    }
    ?>
</body>
<script>
    window.print();
</script>

</html>