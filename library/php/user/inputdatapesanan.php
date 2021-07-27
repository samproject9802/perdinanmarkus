<?php

include_once '../koneksi.php';

$kodetrx = $_POST['kodetrx'];
$namapenerima = $_POST['namapenerima'];
$alamatpenerima = $_POST['alamatpenerima'];
$kodebubukkopi = $_POST['kodekopi'];
$tanggalpesanan = $_POST['tanggalpesanan'];
$jumlahpesanan = $_POST['jumlahpesanan'];
$status = "Belum Bayar";
$data = [];

$sqlinsertData = "INSERT INTO tbl_pemesan 
VALUES ('$kodetrx','$namapenerima','$alamatpenerima','$kodebubukkopi', '$tanggalpesanan', '$jumlahpesanan','','$status')";

if ($conn->query($sqlinsertData) === TRUE) {
    $sqlnotif = "INSERT INTO `tbl_notifikasi` (title_notification,nama_pemesan,body_text,status)
                 VALUES ('Order Masuk','$namapenerima','telah melakukan pemesanan','Unread')";
    if ($conn->query($sqlnotif) === TRUE) {
        echo "Sukses" . " " . $kodetrx;
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        echo "$namapenerima";
    }
} else {
    echo "Error";
}
