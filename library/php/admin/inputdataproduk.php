<?php
require_once('../koneksi.php');

$aksi = $_POST['aksi'];

if ($aksi == "Input") {

    $namaproduk = $_POST['namaproduk'];
    $hargaproduk = $_POST['hargaproduk'];

    $sql = "INSERT INTO `tb_bubukkopilintong` VALUES ('','$namaproduk','$hargaproduk')";

    if ($conn->query($sql) == TRUE) {
        echo "Sukses";
    } else {
        echo "Gagal";
    }
} elseif ($aksi == "Show") {

    $sqlselect = "SELECT * FROM `tb_bubukkopilintong`";
    $results = $conn->query($sqlselect);

    if ($results->num_rows > 0) {
        $nomor = 1;
        // output data of each row
        while ($row = $results->fetch_assoc()) {
            echo "
            <tr>
                <td>$nomor</td>
                <td>$row[Nama_Bubukkopi]</td>
                <td>$row[Harga]</td>
            </tr>
            ";
            $nomor++;
        }
    } else {
        echo "
            <tr>
                <td colspan='3' align='center'>Tidak ada data tersedia</td>
            </tr>
        ";
    }
}
