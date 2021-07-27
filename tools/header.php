<img src="library/assets/banner-web.jpg" class="img-fluid banner-custom" alt="...">
<nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
    <div class='container-fluid'>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarTogglerDemo03' aria-controls='navbarTogglerDemo03' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <a class='navbar-brand' href='?page=home'>Bubuk Kopi Lintong</a>
        <div class='collapse navbar-collapse' id='navbarTogglerDemo03'>
            <ul class='navbar-nav w-100 nav-justified me-auto mb-2 mb-lg-0'>
                <?php
                if (isset($_SESSION['logged_as'])) {
                    $loggedas = $_SESSION['logged_as'];
                    if ($loggedas == "Admin") {
                        echo "
                            <li class='nav-item'>
                            <a class='nav-link' aria-current='page' href='?page=home'>Home</a>
                            </li>
                            <li class='nav-item'>
                            <a class='nav-link' href='?page=detail-produk'>Detail Produk</a>
                            </li>
                            <li class='nav-item'>
                            <a class='nav-link' href='?page=data-pemesanan'>Data Pemesanan</a>
                            </li>
                            <div class='dropdown' id='dropdownbutton'>
                                <a class='btn btn-transparent notify position-relative' type='button' id='btnAlertPopup'><i class='fas fa-bell'></i>
                                    <span   span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' id='sumnotifdata'>
                                        99+
                                        <span class='visually-hidden'>unread messages</span>
                                    </span>
                                </a>
                            </div>
                            <li class='nav-item'>
                                <a class='nav-link' href='javascript:logout();'>Logout</a>
                            </li>
                            ";
                    }
                } else {
                    echo "
                            <li class='nav-item'>
                            <a class='nav-link' aria-current='page' href='?page=home'>Home</a>
                            </li>
                            <li class='nav-item'>
                            <a class='nav-link' href='?page=visi-misi'>Visi Misi</a>
                            </li>
                            <li class='nav-item'>
                            <a class='nav-link' href='?page=detail-produk'>Detail Produk</a>
                            </li>
                            <li class='nav-item'>
                            <a class='nav-link' id='nav-pemesanan' href='?page=pemesanan'>Pemesanan</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' id='nav-statuslog' href='?page=login'>Login</a>
                            </li>
                        ";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>