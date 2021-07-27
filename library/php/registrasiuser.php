<?php
require_once 'koneksi.php';

$user_name = $_POST['username'];
$password_user = md5($_POST['pass']);
$nama_lengkap = $_POST['namapengguna'];
$no_hp = $_POST['nomorhandphone'];

$sql = "INSERT INTO `table_user` VALUES ('', '$user_name', '$password_user', '$nama_lengkap', '$no_hp','User')";

if (mysqli_query($conn, $sql)) {
    header('Location: ../../index.php?task=signup-success');
    exit;
} else {
    header('Location: ../../index.php?task=signup-failed');
    exit;
}
