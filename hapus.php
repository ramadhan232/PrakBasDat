<?php
include("controller.php");

$no_pas=(int)$_GET['no_pasien'];


 if (hapus_pasien($no_pas) > 0) {
    echo "<script>
    alert ('Data Pasien Telah Dihapus')
    document.location.href='index.php';
    </script>";

}
    else{
    echo "<script>
    alert ('Data Pasien Gagal Dihapus')
    document.location.href='index.php';
    </script>";
 }
?>
