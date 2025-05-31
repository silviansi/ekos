<?php if (session_status() == PHP_SESSION_NONE) session_start(); ?>

<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="/ekos/dashboard.php" class="b-brand text-primary">
        <img src="/ekos/assets/img/logo-ekos.png" class="img-fluid w-50" alt="logo">
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">

        <!-- Menu Admin -->
        <?php if ($_SESSION['role_id'] == 1): ?>
        <li class="pc-item">
          <a href="/ekos/pages/admin/dashboard.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label>Manajemen Pengguna</label>
          <i class="ti ti-dashboard"></i>
        </li>
        <li class="pc-item">
          <a href="/ekos/pages/admin/manage-users.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-shield"></i></span>
            <span class="pc-mtext">Kelola Pengguna</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/ekos/pages/admin/tenants-data.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user"></i></span>
            <span class="pc-mtext">Data Penyewa</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/ekos/pages/admin/owners-data.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-users"></i></span>
            <span class="pc-mtext">Data Pemilik Kos</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Manajemen Kos</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="/ekos/pages/admin/kost-data.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-building"></i></span>
            <span class="pc-mtext">Data Kos</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/ekos/pages/admin/category-kost.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-archive"></i></span>
            <span class="pc-mtext">Kategori Kos</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/ekos/pages/admin/facility-kost.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-tool"></i></span>
            <span class="pc-mtext">Fasilitas Kos</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Others</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="elements/icon-tabler.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-message"></i></span>
            <span class="pc-mtext">Pesan Masuk</span>
          </a>
        </li>
        <?php endif; ?>

        <!-- Menu Pemilik Kos -->
        <?php if ($_SESSION['role_id'] == 2): ?>
        <li class="pc-item">
          <a href="/ekos/pages/pemilik/dashboard.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Manajamen Kos</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="/ekos/pages/pemilik/profile-kost.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-home"></i></span>
            <span class="pc-mtext">Profil Kos Saya</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/ekos/pages/pemilik/manage-rooms.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bed"></i></span>
            <span class="pc-mtext">Kelola Kamar</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/ekos/pages/pemilik/tenants-data.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-users"></i></span>
            <span class="pc-mtext">Data Penyewa Saya</span>
          </a>
        </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>