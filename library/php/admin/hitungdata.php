<?php
require_once '../koneksi.php';

$sqlselect = "SELECT COUNT(*) as 'jumlah_data' FROM tbl_notifikasi";
$result = $conn->query($sqlselect);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "$row[jumlah_data]";
    }
} else {
    echo "0";
}
