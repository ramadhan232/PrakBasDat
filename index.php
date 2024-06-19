<?php
include("controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUSKESMAS KERSAMENAK</title>
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
            <header class="header">
                <h1>PUSKESMAS KERSAMENAK</h1>
            </header>
            <section class="content">
                <div class="card">
                    <h2>Data Pasien</h2>
                    <a href="tampilan.php" class="button">Buka</a>
                </div>
                <div class="card">
                    <h2>Tambah Pasien</h2>
                    <a href="Tambah.php" class="button">Tambah</a>
                </div>
            </section>
        </main>
</div>
</body>
</html>
