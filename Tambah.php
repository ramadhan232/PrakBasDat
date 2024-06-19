<?php
include("controller.php");
if (isset($_POST["submit"])) {
    if (tambah_pasien($_POST) > 0) {
        echo "<script>
        alert ('Data Pasien Telah Ditambahkan')
        document.location.href='index.php';
        </script>";
    }
    else{
        echo "<script>
        alert ('Data Pasien Gagal Ditambahkan')
        document.location.href='index.php';
        </script>";
    }
}
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
                <h1>DATA ISI</h1>
                <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Name:</label>
                                <input type="text" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="no_bpjs">Nomor BPJS:</label>
                                <input type="text" id="no_bpjs" name="no_bpjs">
                            </div>
                            <div class="form-group">
                                <label for="ruangan">Ruangan:</label>
                                <select id="ruangan" name="ruangan" required>
                                    <option value="">Pilih Ruangan</option>
                                    <option value="Usia Dewasa">Usia Dewasa</option>
                                    <option value="Anak Usia Sekolah & Remaja">Anak Usia Sekolah & Remaja</option>
                                    <option value="Balita & Anak Pra-Sekolah">Balita & Anak Pra-Sekolah</option>
                                    <option value="Lansia">Lansia</option>
                                    <option value="Laboratorium">Laboratorium</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="asuransi">Asuransi:</label>
                                <select id="asuransi" name="asuransi" required>
                                    <option value="">Pilih Asuransi</option>
                                    <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                                    <option value="Umum">Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kunjungan">Kunjungan:</label>
                                <select id="kunjungan" name="kunjungan" required>
                                    <option value="">Pilih Kunjungan</option>
                                    <option value="LAMA">LAMA</option>
                                    <option value="BARU">BARU</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="button">Submit</button>
                            </div>
                        </form>
                </div>
                </header>
        </main>
    </div>
</body>
</html>