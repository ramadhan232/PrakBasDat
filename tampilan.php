<?php
include("controller.php");
$data_puskesmas = select("SELECT * FROM kunjungan
join pasien on kunjungan.no_pasien=pasien.no_pasien 
join ruangan on kunjungan.no_ruangan=ruangan.no_ruangan 
join asuransi on kunjungan.no_asuransi=asuransi.no_asuransi
order by no_kunjungan asc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUSKESMAS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="dashboard-title-box">
            <div class="sidebar-header">
                <h2>PUSKESMAS</h2>
            </div>
            </div>
            <ul class="nav">
                <li><a href="index.php"><font size="5">Home</font></a></li>
                <li><a href="tampilan.php"><font size="5">Data Pasien</font></a></li>
            </ul>
        </aside>
        <main class="main-content">
        <div>
            <header class="header">
                <h1>TABEL PASIEN</h1>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Asuransi</th>
                            <th scope="col">Nomor BPJS</th>
                            <th scope="col">Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data_puskesmas as $puskesmas) : ?>
                            <tr>
                                <td><?= $puskesmas['tanggal'];?></td>
                                <td><?= $puskesmas['no_kunjungan'];?></td>
                                <td><?= $puskesmas['nama'];?></td>
                                <td><?= $puskesmas['nama_ruangan'];?></td>
                                <td><?= $puskesmas['nama_asuransi'];?></td>
                                <td><?= $puskesmas['nomor_bpjs'];?></td>
                                <td><?= $puskesmas['jenis_kunjungan'];?></td>
                                <td>
                                    <a href="hapus.php?no_pasien=<?= $puskesmas['no_pasien'];?>><button type="submit" name="hapus" class="button2">HAPUS</button></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>
                </div>
                </header>
                <div class="form-group">
                    <a href="ubah.php"><button type="submit" name="ubah" class="button1">UBAH</button></a>
            </div>
        </main>
    </div>
</body>
</html>