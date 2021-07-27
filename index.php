<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font awesome -->
    <link rel="stylesheet" href="library/plugin/fontawesome/css/all.css">

    <!-- Link CSS Bootstrap -->
    <link rel="stylesheet" href="library/plugin/bootstrap/css/bootstrap.min.css">

    <!-- Link CSS Custom -->
    <link rel="stylesheet" href="library/css/body.css">

    <!-- Link CSS Login & Registration -->
    <link rel="icon" type="image/png" href="library/plugin/logindash/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="library/plugin/logindash/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="library/plugin/logindash/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="library/plugin/logindash/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="library/plugin/logindash/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="library/plugin/logindash/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="library/plugin/logindash/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="library/plugin/logindash/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="library/plugin/logindash/css/util.css">
    <link rel="stylesheet" type="text/css" href="library/plugin/logindash/css/main.css">
    <link rel="stylesheet" href="library/css/notification.css">

    <!-- Link JS Smart Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Link Custom JS -->
    <script src="library/js/main.js"></script>

    <!-- Link JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Link CSS Sidebar -->
    <link href="library/plugin/sidebar/css/simple-sidebar.css" rel="stylesheet">

    <!-- Link CSS Data Table -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>SISFO PEMESANAN || Bubuk Kopi Lintong</title>

</head>

<body>

    <div class="card">
        <div class="card-header p-0">
            <?php require_once 'tools/header.php'; ?>
        </div>
        <div class="card-body p-0">
            <?php
            if (isset($_SESSION['logged_as']) == true) {
                $loginsebagai = $_SESSION['logged_as'];
                if ($loginsebagai == "User") {
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        if ($page == "home") {
                            include_once 'content/home.php';
                        } elseif ($page == "visi-misi") {
                            include_once 'content/visimisi.php';
                        } elseif ($page == "detail-produk") {
                            include_once 'content/detailproduk.php';
                        } elseif ($page == "pemesanan") {
                            include_once 'library/php/koneksi.php';

                            $datastatus = [];
                            $sqldata = "SELECT b.status FROM `table_pemesanan` as a 
                                        INNER JOIN `table_status` as b 
                                        WHERE a.id_user = $_SESSION[id_user]";
                            $result = $conn->query($sqldata);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $datastatus = $row;
                                }
                            } else {
                                $datastatus['status'] = "";
                            }

                            $status = $datastatus['status'];

                            if ($status == "Belum Bayar") {
                                include_once 'content/action/pembayaran.php';
                            } else if ($status == "Sudah Bayar") {
                                include_once 'content/action/sudahdibayar.php';
                            } else {
                                include_once 'content/pemesanan.php';
                            }
                        } elseif ($page == "login") {
                            include_once 'content/login.php';
                        } elseif ($page == "registrasi") {
                            include_once 'content/registrasi.php';
                        } elseif ($page == "logout") {
                            include_once 'library/php/logout.php';
                            header('Location: index.php');
                        }
                    } else {
                        require_once 'content/home.php';
                    }
                } elseif ($loginsebagai == "Admin") {
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        if ($page == "home") {
                            include_once 'content/home.php';
                        } elseif ($page == "detail-produk") {
                            include_once 'content/detailproduk.php';
                        } elseif ($page == "data-pemesanan") {
                            include_once 'content/admin/datapemesanan.php';
                        } elseif ($page == "logout") {
                            include_once 'library/php/logout.php';
                            header('Location: index.php');
                        }
                    } else {
                        require_once 'content/home.php';
                    }
                }
            } else {
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    if ($page == "home") {
                        include_once 'content/home.php';
                    } elseif ($page == "visi-misi") {
                        include_once 'content/visimisi.php';
                    } elseif ($page == "detail-produk") {
                        include_once 'content/detailproduk.php';
                    } elseif ($page == "pemesanan") {
                        include_once 'content/pemesanan.php';
                    } elseif ($page == "login") {
                        include_once 'content/login.php';
                    } elseif ($page == "registrasi") {
                        include_once 'content/registrasi.php';
                    } elseif ($page == "pembayaran") {
                        include_once 'content/home.php';
                    }
                } else {
                    require_once 'content/home.php';
                }
            }

            if (isset($_GET['task'])) {
                $task = $_GET['task'];
                if ($task == "signup-success") {
                    echo "<script>registrationsuccess();</script>";
                } else if ($task == "signup-failed") {
                    echo "<script>registrationfailed();</script>";
                } else if ($task == "login-success") {
                    echo "<script>loginsuccess();</script>";
                } else if ($task == "login-failed") {
                    echo "<script>loginfailed();</script>";
                } else if ($task == "admin-success") {
                    echo "<script>adminsuccess();</script>";
                }
            }
            ?>
        </div>
        <div class="card-footer bg-primary" align="center">
            &#169 2021 Bubuk Kopi Lintong- All Rights Reserved.
        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4" align="center">
                        <h4><b>TOTAL PEMBAYARAN :</b></h4>
                        <h4 id="totalbayar"></h4>
                    </div>
                    <div class="mb-3">
                        <h6>Dengan detail sebagai berikut : </h6>
                    </div>
                    <div class="mb-3 row">
                        <h6 class="col"><b>Tanggal Pemesanan</b></h6>
                        <h6 class="col" id="tanggalpesanantab"></h6>
                    </div>
                    <div class="mb-3 row">
                        <h6 class="col"><b>Nama Penerima</b></h6>
                        <h6 class="col" id="namapenerima"></h6>
                    </div>
                    <div class="mb-3 row">
                        <h6 class="col"><b>Nama Produk</b></h6>
                        <h6 class="col" id="namaproduk"></h6>
                    </div>
                    <div class="mb-3 row">
                        <h6 class="col"><b>Jumlah Pesanan</b></h6>
                        <h6 class="col" id="jumlahpesanan"></h6>
                    </div>
                    <div class="mb-3 row">
                        <h6 class="col"><b>Harga (/pcs)</b></h6>
                        <h6 class="col" id="harga"></h6>
                    </div>
                    <div class="mb-3 row">
                        <h6 class="col"><b>Alamat</b></h6>
                        <h6 class="col" id="alamat"></h6>
                    </div>
                    <div class="mb-3 row">
                        <p align='center'>
                            Harap melakukan pembayaran ke nomor rekening berikut ini:
                        </p>
                        <p align='center'>
                            <b>Rekening BRI A.n Perdinan Markus Banjarnahor</b>
                        </p>
                        <p align='center'>
                            <b>No.Rek : 1096-01-019524-50-8</b>
                        </p>
                        <p align='center'>
                            Jika data sudah benar, silahkan klik proses.
                        </p>
                        <p class="col" style="color: red; font-weight:bold;">
                            Setelah anda mengklik proses akan tampil nomor transaksi,
                            harap diingat baik - baik nomor transaksi anda. Apabila diperlukan
                            harap mencatat nomor tersebut.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="prosesdata">Proses</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="library/plugin/sidebar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Link JS Data Table -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "sScrollX": "100%",
                "bScrollCollapse": true
            });
        });
    </script>
    <script src="library/js/inputpesanan.js"></script>
    <script src="library/js/cekpesanan.js"></script>
    <script src="library/js/datapelanggan.js"></script>
    <script src="library/js/databubukkopi.js"></script>
    <script src="library/js/notification.js"></script>

    <!-- Link JS Bootstrap -->
    <script src="library/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Link JS Login & Registration -->
    <script src="library/plugin/logindash/vendor/animsition/js/animsition.min.js"></script>
    <script src="library/plugin/logindash/vendor/bootstrap/js/popper.js"></script>
    <script src="library/plugin/logindash/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="library/plugin/logindash/vendor/select2/select2.min.js"></script>
    <script src="library/plugin/logindash/vendor/daterangepicker/moment.min.js"></script>
    <script src="library/plugin/logindash/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="library/plugin/logindash/vendor/countdowntime/countdowntime.js"></script>
    <script src="library/plugin/logindash/js/main.js"></script>

</body>

</html>