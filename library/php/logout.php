<?php
session_start();
unset($_SESSION['status']);
unset($_SESSION["id_user"]);
unset($_SESSION["nama_user"]);
unset($_SESSION["no_telepon"]);
unset($_SESSION["logged_as"]);
session_destroy();
header('location: ../../index.php');
