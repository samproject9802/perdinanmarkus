<?php
require_once('../koneksi.php');

$sql = "SELECT * FROM `tbl_pemesan` as a
        JOIN tb_bubukkopilintong as b 
        WHERE a.Kode_Bubukkopi = b.Kode_Bubukkopi";
$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    $nomor = 1;
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row['status'] === "Belum Bayar") {
            $status = "<button class='btn btn-success' id='btnvrf$row[Kode_Pemesan]'>Verifikasi</button>";
        } else {
            $status = "Sudah Bayar";
        }
        $gambar = "<button class='btn btn-success' id='btnke$row[Kode_Pemesan]''>Lihat</button>";
        $widget[] = "
        <tr>
                <td>$nomor</td>
                <td>$row[Kode_Pemesan]</td>
                <td>$row[Nama_Pemesan]</td>
                <td>$row[Alamat_Pemesan]</td>
                <td>$row[Nama_Bubukkopi]</td>
                <td>$row[Harga]</td>
                <td>$row[Tanggal_Pemesan]</td>
                <td>$gambar</td>
                <td>$status</td>
            </tr>
        ";
        $nomor++;
        $data[] = $row;
    }
    echo json_encode($widget) . "+" . json_encode($data);
} else {
    echo "Tidak ada data yang tersedia";
}
