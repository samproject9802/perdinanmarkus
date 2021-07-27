<?php
require_once('../koneksi.php');

$kodetrx = $_POST['kodetrx'];

$sql = "SELECT * FROM tbl_pemesan WHERE Kode_Pemesan='$kodetrx'";
$result = mysqli_query($conn, $sql);
$datapesan = [];

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $datapesan[] = $row;
    }
} else {
    $datapesan[] = null;
}

echo json_encode($datapesan);
