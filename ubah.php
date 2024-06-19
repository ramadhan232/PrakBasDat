<?php
include("controller.php");
$data_kunjungan=select("SELECT * FROM kunjungan");
if (isset($_POST["submit"])) {
    if (ubah_pasien($_POST) > 0) {
        echo "<script>
        alert ('Data Pasien Telah Dirubah')
        document.location.href='index.php';
        </script>";
    }
    else{
        echo "<script>
        alert ('Data Pasien Gagal Dirubah')
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
                <h1>UBAH DATA PASIEN</h1>
                <form action="" method="post">
                             <div class="form-group">
                                <label for="no_kunjungan">No:</label>
                                <select id="no_kunjungan" name="no_kunjungan" required>
                                    <option value="">---</option>
                                    <?php
                                    foreach ($data_kunjungan as $kungan) :
                                    ?>
                                    <option value="<?= $kungan['no_kunjungan'];?>"><?= $kungan['no_kunjungan'];?></option>
                                    <?php endforeach;?>
                                </select>
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