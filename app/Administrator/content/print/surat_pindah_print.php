<?php
include "../../../Controller/koneksi.php";
include "../../../Controller/queryData.php";
$id = $_GET['id'];

$datas = printSuratPindah($id);





?>
<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            /* margin: 0;
            padding: 0; */
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
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <?php
    foreach ($datas as $data) {
    ?>


        <h3 class="sub-title">SURAT PERPINDAHAN PENDUDUK</h3>
        <table id="customers2">
            <tr>
                <th>1.</th>
                <th>Nomor KK</th>
                <th>:</th>
                <td><?= $data['no_kk'] ?></td>
            </tr>
            <tr>
                <th>2.</th>
                <th>Nama Pemohon</th>
                <th>:</th>
                <td><?= $data['nama_pemohon'] ?></td>
            </tr>
            <tr>
                <th>3.</th>
                <th>Jenis Permohonan</th>
                <th>:</th>
                <td><?= $data['jenis_permohonan'] ?></td>
            </tr>
            <tr>
                <th>4.</th>
                <th>Alamat</th>
                <th>:</th>
                <td><?= $data['alamat'] ?> , RT/RW: <?= $data['rt'] ?>/<?= $data['rw'] ?> , Desa: <?= $data['desa'] ?> , Kec: <?= $data['kecamatan'] ?> , Kota: <?= $data['kota'] ?></td>
            </tr>
            <tr>
                <th>5.</th>
                <th>Alamat Pindah</th>
                <th>:</th>
                <td><?= $data['alamat_pindah'] ?> , RT/RW: <?= $data['rt_pindah'] ?>/<?= $data['rw_pindah'] ?> , Desa: <?= $data['desa_pindah'] ?> , Kec: <?= $data['kecamatan_pindah'] ?> , Kota: <?= $data['kota_pindah'] ?></td>
            </tr>
            <tr>
                <th>6.</th>
                <th>Alasan Pindah</th>
                <th>:</th>
                <td><?= $data['alasan_pindah'] ?></td>
            </tr>
            <tr>
                <th>7.</th>
                <th>Jenis Kepindahan</th>
                <th>:</th>
                <td><?= $data['jenis_kepindahan'] ?></td>
            </tr>
            <tr>
                <th>8.</th>
                <th>Anggota Keluarga Tidak Pindah</th>
                <th>:</th>
                <td><?= $data['anggota_keluarga_tidak_pindah'] ?></td>
            </tr>
            <tr>
                <th>9.</th>
                <th>Anggota Keluarga Yang Pindah</th>
                <th>:</th>
                <td><?= $data['anggota_keluarga_yang_pindah'] ?></td>
            </tr>
            <tr>
                <th>10.</th>
                <th>Daftar Anggota Keluarga Yang Pindah</th>
                <th>:</th>
                <td>
                    <table style="margin-top: 3px; width:100%">
                        <tr>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                        </tr>

                        <?php
                        $id = $data['ids'];
                        $anggotaKeluarga = mysqli_query($koneksi, "SELECT * FROM anggota_keluarga WHERE id_surat_pindah='$id'");

                        foreach ($anggotaKeluarga as $dataKeluarga) {

                        ?>
                            <tr>
                                <td><?= $dataKeluarga['nik_anggota'] ?></td>
                                <td><?= $dataKeluarga['nama_anggota'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
            <tr>
                <th>11.</th>
                <th>Nama Sponsor</th>
                <th>:</th>
                <td><?= $data['nama_sponsor'] ?></td>
            </tr>
            <tr>
                <th>12.</th>
                <th>Tipe Sponsor</th>
                <th>:</th>
                <td><?= $data['type_sponsor'] ?></td>
            </tr>
            <tr>
                <th>12.</th>
                <th>Alamat Sponsor</th>
                <th>:</th>
                <td><?= $data['alamat_sponsor'] ?></td>
            </tr>
            <tr>
                <th>13.</th>
                <th>Nomor ITAS</th>
                <th>:</th>
                <td><?= $data['nomor_itas'] ?></td>
            </tr>
            <tr>
                <th>14.</th>
                <th>Masa Berlaku ITAS</th>
                <th>:</th>
                <td><?= $data['masa_berlaku_itas'] ?></td>
            </tr>
            <tr>
                <th>15.</th>
                <th>Negara Tujuan</th>
                <th>:</th>
                <td><?= $data['negara_tujuan'] ?></td>
            </tr>
            <tr>
                <th>16.</th>
                <th>Alamat Tujuan</th>
                <th>:</th>
                <td><?= $data['alamat_tujuan'] ?></td>
            </tr>
            <tr>
                <th>17.</th>
                <th>Penanggung Jawab</th>
                <th>:</th>
                <td><?= $data['penanggung_jawab'] ?></td>
            </tr>
            <tr>
                <th>18.</th>
                <th>Rencana Pindah Tanggal</th>
                <th>:</th>
                <td><?= $data['rencana_pindah_tanggal'] ?></td>
            </tr>
            <tr>
                <th>19.</th>
                <th>Nomor Handphone</th>
                <th>:</th>
                <td><?= $data['no_hp'] ?></td>
            </tr>
            <tr>
                <th>20.</th>
                <th>Alamat Email</th>
                <th>:</th>
                <td><?= $data['email'] ?></td>
            </tr>
        </table>

        <h5 class="sub-title" style="text-align: right; margin-bottom:1rem; margin-top:1rem;">Kendal, <?= date('d-M-Y', $data['created_at']) ?> </h5>
        <table id="customers3">
            <tr>
                <th style="text-align:center">Mengetahui: <br> Kepala Desa/Lurah</th>
                <th style="text-align:center">Pemohon</th>
            </tr>
            <tr>
                <?php
                $sqlDesa = mysqli_query($koneksi, "SELECT nama,jabatan,status FROM pegawai WHERE jabatan='KEPDES' AND status=1");
                $dataKepdes = mysqli_fetch_assoc($sqlDesa);

                ?>
                <th style="text-align:center; padding-top:5rem">(<?= $dataKepdes['nama']; ?>)</th>
                <th style="text-align:center; padding-top:5rem">(<?= $data['nama_pemohon'] ?>)</th>
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