<?php
require_once('../koneksi.php');

$idproduk = $_POST['idproduk'];

$sql = "SELECT (Harga) FROM tb_bubukkopilintong WHERE Kode_Bubukkopi='$idproduk'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo $row['Harga'];
    }
}
