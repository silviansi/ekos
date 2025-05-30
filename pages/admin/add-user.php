<?php
session_start();
require '../../config/database.php';

// Cek apakah pengguna sudah login dan apakah dia admin
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: /ekos/login.php"); 
    exit();
}

// Inisialisasi variabel untuk error dan success
$errors = [];
$susccess = false;

// Proses tambah pengguna baru
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $name = $_POST['name'] ?? '';
    $username = $_POST['username'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $role_id = $_POST['role_id'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validasi input
    if (empty($email) || empty($name) || empty($username) || empty($phone_number) || empty($role_id) || empty($password) || empty($confirm_password)) {
        $errors[] = 'Semua field harus diisi.';
    } else if ($password !== $confirm_password) {
        $errors[] = 'Password dan konfirmasi password tidak cocok.';
    } else {
        try {
            // Cek apakah email sudah ada
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $errors[] = 'Email sudah terdaftar.';
            } else {
                // Insert data pengguna baru
                $stmt = $conn->prepare("INSERT INTO users (email, name, username, phone_number, role_id, password) VALUES (:email, :name, :username, :phone_number, :role_id, :password)");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':phone_number', $phone_number);
                $stmt->bindParam(':role_id', $role_id);
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->execute();
                
                header("Location: /ekos/pages/admin/manage-users.php?success=add");
                exit();
            }
        } catch (PDOException $e) {
            $errors[] = 'Terjadi kesalahan: ' . htmlspecialchars($e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>eKos - Tambah Pengguna</title>
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
                    <h5 class="m-b-10">Manajemen Pengguna</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/ekos/pages/admin/manage-users.php">Kelola Pengguna</a></li>
                    <li class="breadcrumb-item" aria-current="page">Tambah Pengguna</li>
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
                        <h5>Tambah Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- FORM -->
                                <form method="POST" action="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- FORM KIRI -->
                                            <div class="form-group">
                                                <label class="form-label" for="email">Email address</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Nama</label>
                                                <input type="text" name="name" class="form-control" placeholder="Text">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control" placeholder="Text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- FORM KANAN -->
                                            <div class="form-group">
                                                <label class="form-label">No. Telp</label>
                                                <input type="text" name="phone_number" class="form-control" placeholder="Text">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="role_id">Role</label>
                                                <select class="form-select" id="role_id" name="role_id">
                                                    <option value="">-- Pilih Role --</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Pemilik Kos</option>
                                                    <option value="3">Penyewa</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="confirm_password">Konfirmasi Password</label>
                                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
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