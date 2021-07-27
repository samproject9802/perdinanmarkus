<div class="d-flex" id="wrapper">

    <div class="bg-primary border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"></div>
        <div class="list-group list-group-flush">
            <a href="?page=data-pemesanan&tab=data-pelanggan" class="list-group-item list-group-item-action bg-primary">Data Pelanggan</a>
            <a href="?page=data-pemesanan&tab=data-bubukkopi" class="list-group-item list-group-item-action bg-primary">Data Bubuk Kopi</a>
        </div>
    </div>

    <div id="page-content-wrapper">

        <nav class="navbar navbar-dark bg-transparent border-bottom px-2">
            <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>

            <div class="content-tab px-4">
                <?php
                if (isset($_GET['tab'])) {
                    $tab = $_GET['tab'];
                    if ($tab == "data-pelanggan") {
                        echo "<h2>DATA PELANGGAN</h2>";
                    } elseif ($tab == "data-bubukkopi") {
                        echo "<h2>DATA BUBUK KOPI</h2>";
                    }
                } else {
                    echo "<h2>DATA PELANGGAN</h2>";
                }
                ?>
            </div>

        </nav>

        <div class="container-fluid p-4" style="background-image: url('library/assets/bg-body.jpg');">
            <?php
            if (isset($_GET['tab'])) {
                $tab = $_GET['tab'];
                if ($tab == "data-pelanggan") {
                    include_once 'content/admin/laporan/datapelanggan.php';
                } elseif ($tab == "data-bubukkopi") {
                    include_once 'content/admin/laporan/databubukkopi.php';
                }
            } else {
                include_once 'content/admin/laporan/datapelanggan.php';
            }
            ?>
        </div>
    </div>
</div>