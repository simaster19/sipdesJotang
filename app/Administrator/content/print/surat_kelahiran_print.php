<?php
include "../../../Controller/koneksi.php";
include "../../../Controller/queryData.php";
$id = $_GET['id'];

$datas = printSuratKelahiran($id);





?>
<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        #customers {
            width: 40%;
            font-size: 11pt;
            text-align: left;
        }

        #customers2 {
            border-collapse: collapse;
            width: 100%;
            font-size: 11pt;
            text-align: left;
        }

        #customers3 {
            border-collapse: collapse;
            width: 95%;
            font-size: 11pt;

        }

        h3 {
            text-align: center;
            font-weight: bold;
        }

        .sub-title {
            padding-top: 0.7rem;
        }
    </style>
</head>

<body>
    <table id="customers">
        <?php
        foreach ($datas as $data) {
        ?>
            <tr>
                <th>Pemerintah Desa/kelurahan</th>
                <th>:</th>
                <td><?= $data['nama_desa'] ?></td>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <th>:</th>
                <td><?= $data['kecamatan'] ?></td>
            </tr>
            </tr>
            <tr>
                <th>Kota</th>
                <th>:</th>
                <td><?= $data['kota'] ?></td>
            </tr>
            <tr>
                <th>Kode Wilayah</th>
                <th>:</th>
                <td>45674</td>
            </tr>
    </table>

    <h3 class="sub-title">SURAT KETERANGAN KELAHIRAN</h3>
    <table id="customers">
        <tr>
            <th>Nama Kepala Keluarga</th>
            <th>:</th>
            <td><?= $data['nama_kk'] ?></td>
        </tr>
        <tr>
            <th>Nama Kartu Keluarga</th>
            <th>:</th>
            <td><?= $data['no_kk'] ?></td>
        </tr>
    </table>
    <table id="customers2">
        <tr>
            <th colspan="3" class="sub-title">BAYI / ANAK</th>
        </tr>
        <tr>
            <th>1.</th>
            <th>Nama</th>
            <th>:</th>
            <td><?= $data['nama_anak'] ?></td>
        </tr>
        <tr>
            <th>2.</th>
            <th>Jenis Kelamin</th>
            <th>:</th>
            <td><?= $data['jenis_kelamin_anak'] ?></td>
        </tr>
        <tr>
            <th>3.</th>
            <th>Tempat Dilahirkan</th>
            <th>:</th>
            <td><?= $data['tempat_dilahirkan'] ?></td>
        </tr>
        <tr>
            <th>4.</th>
            <th>Tempat Kelahiran</th>
            <th>:</th>
            <td><?= $data['tempat_kelahiran'] ?></td>
        </tr>
        <tr>
            <th>5.</th>
            <th>Hari dan Tanggal Lahir</th>
            <th>:</th>
            <td><?= $data['hari'] . ' dan ' . $data['tanggal_lahir'] ?></td>
        </tr>
        <tr>
            <th>6.</th>
            <th>Pukul</th>
            <th>:</th>
            <td><?= $data['jam'] ?></td>
        </tr>
        <tr>
            <th>7.</th>
            <th>Jenis Kelahiran</th>
            <th>:</th>
            <td><?= $data['jenis_kelahiran'] ?></td>
        </tr>
        <tr>
            <th>8.</th>
            <th>Kelahiran Ke</th>
            <th>:</th>
            <td><?= $data['kelahiran_ke'] ?></td>
        </tr>
        <tr>
            <th>9.</th>
            <th>Penolong Kelahiran</th>
            <th>:</th>
            <td><?= $data['penolong_kelahiran'] ?></td>
        </tr>
        <tr>
            <th>10.</th>
            <th>Berat Bayi</th>
            <th>:</th>
            <td><?= $data['berat_bayi'] . ' Kg' ?></td>
        </tr>
        <tr>
            <th>11.</th>
            <th>Panjang Bayi</th>
            <th>:</th>
            <td><?= $data['panjang_bayi'] . ' cm' ?></td>
        </tr>
        <tr>
            <th colspan="3" class="sub-title">IBU</th>
        </tr>
        <tr>
            <th>1.</th>
            <th>NIK</th>
            <th>:</th>
            <td><?= $data['nik_ibu'] ?></td>
        </tr>
        <tr>
            <th>2.</th>
            <th>Nama Lengkap</th>
            <th>:</th>
            <td><?= $data['nama_ibu'] ?></td>
        </tr>
        <tr>
            <th>3.</th>
            <th>Tanggal Lahir / Umur</th>
            <th>:</th>
            <td><?= $data['tanggal_lahir_ibu'] ?></td>
        </tr>
        <tr>
            <th>4.</th>
            <th>Pekerjaan</th>
            <th>:</th>
            <td><?= $data['pekerjaan_ibu'] ?></td>
        </tr>
        <tr>
            <th>5.</th>
            <th>Alamat</th>
            <th>:</th>
            <td><?= $data['alamat_ibu'] ?> , RT/RW: <?= $data['rt_ibu'] ?>/<?= $data['rw_ibu'] ?> , Desa: <?= $data['desa_ibu'] ?> , Kec: <?= $data['kecamatan_ibu'] ?> , Kota: <?= $data['kota_ibu'] ?></td>
        </tr>
        <tr>
            <th>6.</th>
            <th>Kewarganegaraan</th>
            <th>:</th>
            <td><?= $data['kewarganegaraan_ibu'] ?></td>
        </tr>
        <tr>
            <th>7.</th>
            <th>Kebangsaan</th>
            <th>:</th>
            <td><?= $data['kebangsaan_ibu'] ?></td>
        </tr>
        <tr>
            <th>8.</th>
            <th>Tanggal Pencatatan Perkawinan</th>
            <th>:</th>
            <td><?= $data['tanggal_pencatatan_perkawinan'] ?></td>
        </tr>
        <tr>
            <th colspan="3" class="sub-title">AYAH</th>
        </tr>
        <tr>
            <th>1.</th>
            <th>NIK</th>
            <th>:</th>
            <td><?= $data['nik_ayah'] ?></td>
        </tr>
        <tr>
            <th>2.</th>
            <th>Nama Lengkap</th>
            <th>:</th>
            <td><?= $data['nama_ayah'] ?></td>
        </tr>
        <tr>
            <th>3.</th>
            <th>Tanggal Lahir / Umur</th>
            <th>:</th>
            <td><?= $data['tanggal_lahir_ayah'] ?> / <?= $data['umur_ayah'] ?></td>
        </tr>
        <tr>
            <th>4.</th>
            <th>Pekerjaan</th>
            <th>:</th>
            <td><?= $data['pekerjaan_ayah'] ?></td>
        </tr>
        <tr>
            <th>5.</th>
            <th>Alamat</th>
            <th>:</th>
            <td><?= $data['alamat_ayah'] ?> , RT/RW: <?= $data['rt_ayah'] ?>/<?= $data['rw_ayah'] ?> , Desa: <?= $data['desa_ayah'] ?> , Kec: <?= $data['kecamatan_ayah'] ?> , Kota: <?= $data['kota_ayah'] ?></td>
        </tr>
        <tr>
            <th>6.</th>
            <th>Kewarganegaraan</th>
            <th>:</th>
            <td><?= $data['kewarganegaraan_ayah'] ?></td>
        </tr>
        <tr>
            <th>7.</th>
            <th>Kebangsaan</th>
            <th>:</th>
            <td><?= $data['kebangsaan_ayah'] ?></td>
        </tr>
        <tr>
            <th colspan="3" class="sub-title">PELAPOR</th>
        </tr>
        <tr>
            <th>1.</th>
            <th>NIK</th>
            <th>:</th>
            <td><?= $data['nik_pelapor'] ?></td>
        </tr>
        <tr>
            <th>2.</th>
            <th>Nama Lengkap</th>
            <th>:</th>
            <td><?= $data['nama_pelapor'] ?></td>
        </tr>
        <tr>
            <th>3.</th>
            <th>Tanggal Lahir / Umur</th>
            <th>:</th>
            <td><?= $data['tanggal_lahir_pelapor'] ?> / <?= $data['umur_pelapor'] ?></td>
        </tr>
        <tr>
            <th>4.</th>
            <th>Pekerjaan</th>
            <th>:</th>
            <td><?= $data['pekerjaan_pelapor'] ?></td>
        </tr>
        <tr>
            <th>5.</th>
            <th>Alamat</th>
            <th>:</th>
            <td><?= $data['alamat_pelapor'] ?> , RT/RW: <?= $data['rt_pelapor'] ?>/<?= $data['rw_pelapor'] ?> , Desa: <?= $data['desa_pelapor'] ?> , Kec: <?= $data['kecamatan_pelapor'] ?> , Kota: <?= $data['kota_pelapor'] ?></td>
        </tr>
        <?php
            $querySaksi = mysqli_query($koneksi, "SELECT * FROM saksi WHERE id_data_surat='$id'");
            while ($dataSaksi = mysqli_fetch_assoc($querySaksi)) {

        ?>
            <tr>
                <th colspan="3" class="sub-title">SAKSI <?= $dataSaksi['type_saksi'] ?></th>
            </tr>
            <tr>
                <th>1.</th>
                <th>NIK</th>
                <th>:</th>
                <td><?= $dataSaksi['nik_saksi'] ?></td>
            </tr>
            <tr>
                <th>2.</th>
                <th>Nama Lengkap</th>
                <th>:</th>
                <td><?= $dataSaksi['nama_saksi'] ?></td>
            </tr>
            <tr>
                <th>3.</th>
                <th>Tanggal Lahir / Umur</th>
                <th>:</th>
                <td><?= $dataSaksi['tanggal_lahir_saksi'] ?> / <?= $dataSaksi['umur_saksi'] ?></td>
            </tr>
            <tr>
                <th>4.</th>
                <th>Pekerjaan</th>
                <th>:</th>
                <td><?= $dataSaksi['pekerjaan_saksi'] ?></td>
            </tr>
            <tr>
                <th>5.</th>
                <th>Alamat</th>
                <th>:</th>
                <td><?= $dataSaksi['alamat_saksi'] ?> , RT/RW: <?= $dataSaksi['rt_saksi'] ?>/<?= $dataSaksi['rw_saksi'] ?> , Desa: <?= $dataSaksi['desa_saksi'] ?> , Kec: <?= $dataSaksi['kecamatan_saksi'] ?> , Kota: <?= $dataSaksi['kota_saksi'] ?></td>
            </tr>
        <?php
            }

        ?>
    </table>
    <h5 class="sub-title" style="text-align: right; margin-bottom:1rem; margin-top:1rem;">Kendal, <?= date('d-M-Y', $data['created_at']) ?> </h5>
    <table id="customers3">
        <tr>
            <th style="text-align:center">Mengetahui: <br> Kepala Desa/Lurah</th>
            <th style="text-align:center">Pelapor</th>
        </tr>
        <tr>
            <?php
            $sqlDesa = mysqli_query($koneksi, "SELECT nama,jabatan,status FROM pegawai WHERE jabatan='KEPDES' AND status=1");
            $dataKepdes = mysqli_fetch_assoc($sqlDesa);

            ?>
            <th style="text-align:center; padding-top:5rem">(<?= $dataKepdes['nama']; ?>)</th>
            <th style="text-align:center; padding-top:5rem">(<?= $data['nama_pelapor'] ?>)</th>
        </tr>
    </table>
<?php
        }
?>
<script>
    window.print();
</script>
</body>

</html>