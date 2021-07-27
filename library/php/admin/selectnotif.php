<?php
require_once '../koneksi.php';

$sqlselect = "SELECT * FROM tbl_notifikasi";
$result = $conn->query($sqlselect);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "
        <button type='button' onclick='notifPesanan();'>
            <div class='notifications-item'> <img src='https://woises.net/public/img/defaultpic.jpg' alt='img'>
                <div class='text'>
                    <h4>$row[title_notification]</h4>
                    <p>$row[nama_pemesan] $row[body_text]</p>
                </div>
            </div>
        </button>";
    }
} else {
    echo "0 results";
}
