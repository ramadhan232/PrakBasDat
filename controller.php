<?php
include("database.php");
function select($query){
    
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah_pasien($post){
    global $db;

    $nama=$post['nama'];
    $ruangan=$post['ruangan'];
    $asuransi=$post['asuransi'];
    $no_bpjs=$post['no_bpjs'];
    $kunjungan=$post['kunjungan'];

    $query = "INSERT INTO pasien (nama, nomor_bpjs) values ('$nama', '$no_bpjs')";
    mysqli_query($db, $query);
    $query = "INSERT INTO kunjungan (tanggal,no_pasien, no_ruangan, no_asuransi,jenis_kunjungan) values 
    (CURRENT_TIMESTAMP(),(SELECT no_pasien FROM Pasien WHERE nama='$nama'), 
    (SELECT no_ruangan FROM Ruangan WHERE nama_ruangan='$ruangan'), 
    (SELECT no_asuransi FROM Asuransi WHERE nama_asuransi='$asuransi'),'$kunjungan')";
    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
}
function tampil($no_kunjungan) {
    // Assuming select is a custom function defined elsewhere to execute SQL queries
    // Add error handling to catch any issues with the SQL query
    try {
        // Prepare the SQL query to fetch data for the specified no_kunjungan

        // Assuming you have a function to execute prepared statements
        $data_puskesmas = select("SELECT * FROM kunjungan
                  JOIN pasien ON kunjungan.no_pasien = pasien.no_pasien 
                  JOIN ruangan ON kunjungan.no_ruangan = ruangan.no_ruangan 
                  JOIN asuransi ON kunjungan.no_asuransi = asuransi.no_asuransi
                  WHERE kunjungan.no_kunjungan = $no_kunjungan
                  ORDER BY no_kunjungan ASC");

        // Check if data is retrieved successfully
        if ($data_puskesmas) {
            // Assuming $data_puskesmas is an array of results
            foreach ($data_puskesmas as $row) {
                // Output the data - customize as needed
                echo "No Kunjungan: " . $row['no_kunjungan'] . "<br>";
                echo "Nama Pasien: " . $row['nama'] . "<br>";
                echo "Nama Ruangan: " . $row['nama_ruangan'] . "<br>";
                echo "Nama Asuransi: " . $row['nama_asuransi'] . "<br>";
                echo "<hr>";
            }
        } else {
            echo "No data found for No Kunjungan: " . htmlspecialchars($no_kunjungan);
        }
    } catch (Exception $e) {
        // Handle exceptions and errors
        echo "An error occurred: " . $e->getMessage();
    }
}
function ubah_pasien($post){
    global $db;
    $no_kunjungan = $_POST['no_kunjungan'];
    $ruangan=$post['ruangan'];
    $kunjungan=$post['kunjungan'];
    
    $query = "UPDATE kunjungan SET tanggal = CURRENT_TIMESTAMP(),
    no_ruangan = (SELECT no_ruangan FROM Ruangan WHERE nama_ruangan='$ruangan'),
    jenis_kunjungan = '$kunjungan' WHERE no_kunjungan = '$no_kunjungan' ";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
    }

function hapus_kunjungan($no_kun){
    global $db;
    
    $query = "DELETE FROM kunjungan where no_kunjungan=$no_kun";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function hapus_pasien($no_pas){
    global $db;
    
    $query = "DELETE FROM pasien where no_pasien=$no_pas";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
?>

