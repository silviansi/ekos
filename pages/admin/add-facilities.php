<?php 
session_start();
require '../../config/database.php';

// Cek apakah pengguna sudah login dan apakah dia admin
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: /ekos/login.php"); 
    exit();
}

// Proses tambah fasilitas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $facility_name = $_POST['facility_name'];

    try {
        $stmt = $conn->prepare("INSERT INTO facilities (facility_name) VALUES (:facility_name)");
        $stmt->bindParam(':facility_name', $facility_name);
        $stmt->execute();

        header("Location: /ekos/pages/admin/facility-kost.php?success=add");
        exit();
    } catch (PDOException $e) {
        $error = urlencode($e->getMessage());
        header("Location: /ekos/pages/admin/facility-kost.php?error=$error");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>eKos - Tambah Fasilitas</title>
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
                    <li class="breadcrumb-item"><a href="/ekos/pages/admin/facility-kost.php">Fasilitas Kos</a></li>
                    <li class="breadcrumb-item" aria-current="page">Tambah Fasilitas</li>
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
                        <h5>Tambah Fasilitas</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="form-group">
                                        <label class="form-label">Fasilitas</label>
                                        <input type="text" name="facility_name" class="form-control" placeholder="Text">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-4">Submit</button>
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