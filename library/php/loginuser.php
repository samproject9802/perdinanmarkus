<?php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

$user_name = $_POST['username'];
$password_user = md5($_POST['pass']);

$sql = "SELECT * FROM `tb_login` WHERE Id='$user_name' AND Password='$password_user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION['status'] = "login";
        $_SESSION["logged_as"] = $row["level_user"];
        header('Location: ../../index.php?task=login-success');
        exit;
    }
} else {
    header('Location: ../../index.php?task=login-failed');
    exit;
}
