<?php 
session_start();
require '../../config/database.php';

// Cek apakah pengguna sudah login dan apakah dia admin
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: /ekos/login.php");
    exit();
}

// Ambil ID kategori dari URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: /ekos/pages/admin/category-kost.php");
    exit();
}

$category_id = $_GET['id'];

// Proses update kategori saat form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Permintaan tidak valid (CSRF token mismatch).");
    }
    $category_name = trim($_POST['category_name']);

    // Validasi input
    if (!empty($category_name)) {
        $stmt = $conn->prepare("UPDATE category SET category_name = :category_name WHERE category_id = :category_id");
        $stmt->execute([
            ':category_name' => $category_name,
            ':category_id' => $category_id
        ]);

        header("Location: /ekos/pages/admin/category-kost.php?success=edit");
        exit();
    } else {
        $error = "Nama kategori tidak boleh kosong.";
    }
}

// Ambil data kategori berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM category WHERE category_id = :category_id");
$stmt->execute([':category_id' => $category_id]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);

// Jika data kategori tidak ditemukan
if (!$category) {
    header("Location: /ekos/pages/admin/category-kost.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>eKos - Edit Kategori</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- Favicon -->
    <link rel="icon" href="../../assets/img/logo.png" type="image/x-icon"> 
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="../../assets/fonts/tabler-icons.min.css" >
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="../../assets/fonts/feather.css" >
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="../../assets/fonts/fontawesome.css" >
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="../../assets/fonts/material.css" >
    <!-- Template CSS Files -->
    <link rel="stylesheet" href="../../assets/css/style.css" id="main-style-link" >
    <link rel="stylesheet" href="../../assets/css/style-preset.css" >
</head>

<body>
    <!-- Pre-loader -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    
    <!-- Sidebar Menu -->
    <?php require '../../includes/sidebar.php'; ?>

    <!-- Header Topbar  -->
    <?php require '../../includes/header.php'; ?> 

    <!-- Main Content -->
    <div class="pc-container">
        <div class="pc-content">
        <!-- breadcrumb -->
        <div class="page-header">
            <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Manajemen Kos</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/ekos/pages/admin/category-kost.php">Kategori Kos</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit Kategori</li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Kategori</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (isset($error)): ?>
                                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                                <?php endif; ?>
                                <?php
                                if (empty($_SESSION['csrf_token'])) {
                                    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                                }
                                $csrf_token = $_SESSION['csrf_token'];
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Nama Kategori</label>
                                        <input type="text" name="category_name" class="form-control" value="<?= htmlspecialchars($category['category_name']) ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="/ekos/pages/admin/category-kost.php" class="btn btn-secondary ms-2">Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
        <div class="row">
            <div class="col-sm my-1">
            <p class="m-0"
                >Mantis &#9829; crafted by Team <a href="https://themeforest.net/user/codedthemes" target="_blank">Codedthemes</a> Distributed by <a href="https://themewagon.com/">ThemeWagon</a>.</p
            >
            </div>
            <div class="col-auto my-1">
            <ul class="list-inline footer-link mb-0">
                <li class="list-inline-item"><a href="/ekos/dashboard.php">Beranda</a></li>
            </ul>
            </div>
        </div>
        </div>
    </footer> 
        
    <!-- Required Js -->
    <script src="../../assets/js/plugins/popper.min.js"></script>
    <script src="../../assets/js/plugins/simplebar.min.js"></script>
    <script src="../../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../../assets/js/pcoded.js"></script>
    <script src="../../assets/js/plugins/feather.min.js"></script>
</body>
</html>