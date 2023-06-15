<?php
include "../../../Controller/koneksi.php";
include "../../../Controller/queryData.php";
$id = $_GET['id'];

$datas = printSuratPengantarDinas($id);



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
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            margin-top: 1.2rem;
        }

        .tembusan {
            margin-top: 20rem;
            margin-left: 3rem;
            text-align: left;
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
                <th>PEMERINTAH <?= $data['kota'] ?></th>
            </tr>
            <tr>
                <th>KECAMATAN <?= $data['kecamatan'] ?></th>
            </tr>
            <tr>
                <th>KELURAHAN <?= $data['nama_desa'] ?></th>
            </tr>
            <tr class="sub-header">
                <td>Gang Janur No.02 RT.02/RW.01 Jotang</td>
            </tr>
        </table>
        <p class="kode-pos">Kode Pos : 7666</p>
        <hr class="hr-bold">
        <hr class="hr-no-bold">

        <div class="tanggal-surat">
            <p>Kendal, <?= date('D-M-Y', time()) ?></p>
            <br>
            <p>Kepada Yth;</p>
            <p>CAMAT KENDAL</p>
            <p>di - <strong>KENDAL</strong></p>
        </div>

        <h4 style="text-decoration: underline; text-align: center; margin-top:130px;">SURAT PENGANTAR DINAS</h4>
        <p style="text-align: center;">Nomor : 02030/ /JTG</p>

        <table class="content-surat" style="padding: 10px;" border="1px">
            <tr>
                <th>NO</th>
                <th>URAIAN</th>
                <th>JUMLAH</th>
                <th>KETERANGAN</th>
            </tr>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $data['uraian'] ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td><?= $data['keterangan'] ?></td>
            </tr>
        </table>
        <div class="tanggal-end-surat">
            <p>LURAH JOTANG</p>
            <br>
            <br>
            <br>
            <?php
            $sqlDesa = mysqli_query($koneksi, "SELECT nama,jabatan,status FROM pegawai WHERE jabatan='KEPDES' AND status=1");
            $dataKepdes = mysqli_fetch_assoc($sqlDesa);

            ?>
            <p style="text-decoration: underline; font-weight:bold; text-align:center;"><?= $dataKepdes['nama'] ?></p>
            <p style="text-align:center;">Penata Tingkat 1</p>
            <p style="text-align:center;">NIP: 1938474788747 / 987</p>

        </div>

        <div class="tembusan">
            <p><strong>Tembusan,</strong> disampaikan kepada Yth:</p>
            <p>1. Arsip</p>
        </div>
    <?php
    }
    ?>
</body>
<script>
    window.print();
</script>

</html>