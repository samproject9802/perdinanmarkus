<?php
require_once('../koneksi.php');

$myData = $_POST['idPesan'];

if (isset($_FILES['file']['name'])) {

    /* Getting file name */
    $filename = $_FILES['file']['name'];

    /* Location */
    $location = "upload/" . $filename;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    /* Valid extensions */
    $valid_extensions = array("jpg", "jpeg", "png");

    $response = 0;
    /* Check file extension */
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
        /* Upload file */
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            $response = $location;
            $sql = "UPDATE tbl_pemesan SET url_buktipembayaran='$filename' WHERE Kode_Pemesan='$myData'";
            $conn->query($sql);
        }
    }

    echo $response;
    exit;
}

echo 0;
