<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav id="navbar" class="navbar sticky-top navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold mx-3 brand-style" href="index.php">
            <img src="assets/img/logo-ekos.png" alt="Logo eKos" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''); ?>" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'search-kos.php' ? 'active' : ''); ?>" href="search-kos.php">Cari Kos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename ($_SERVER['PHP_SELF']) == 'about-us.php' ? 'active' : ''); ?>" href="about-us.php">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename ($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''); ?>" href="contact.php">Kontak</a>
                </li>
            </ul>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <!-- Jika user belum login -->
                <a class="btn btn-sm btn-outline-custom rounded-pill me-2 px-3 mt-2" href="login.php" role="button">Masuk</a>
                <a class="btn btn-sm btn-outline-custom rounded-pill me-2 px-3 mt-2" href="register.php" role="button">Daftar</a>
            <?php else: ?>
                <!-- Jika user sudah login -->
                <a class="btn btn-md text-light me-2 px-3 mt-2" href="profile.php">
                    Halo, <?= htmlspecialchars($_SESSION['username']) ?>
                </a>
                <a class="btn btn-sm btn-outline-danger rounded-pill me-2 px-3 mt-2" href="logout.php">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</nav>