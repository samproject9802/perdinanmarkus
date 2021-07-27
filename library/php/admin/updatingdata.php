<?php
require_once('../koneksi.php');

$idUser = $_POST['idUser'];
$status = $_POST['status'];

$sql = "UPDATE tbl_pemesan SET status='$status' WHERE Kode_Pemesan='$idUser'";
if ($conn->query($sql) == TRUE) {
    echo "Sukses";
} else {
    echo "Gagal";
};
