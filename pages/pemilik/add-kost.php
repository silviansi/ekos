<?php
session_start();
require '../../config/database.php';

// Cek apakah pengguna sudah login dan memiliki role pemilik (role_id = 2)
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: /ekos/login.php");
    exit();
}

$error = "";
$success = "";

// Proses form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil dan sanitasi input
    $name = htmlspecialchars(trim($_POST['name']));
    $address = htmlspecialchars(trim($_POST['address']));
    $description = htmlspecialchars(trim($_POST['description']));
    $price = isset($_POST['price']) ? (int) $_POST['price'] : 0;
    $total_room = isset($_POST['total_room']) ? (int) $_POST['total_room'] : 0;
    $available_room = isset($_POST['available_room']) ? (int) $_POST['available_room'] : 0;
    $owner_id = $_SESSION['user_id'];

    // Validasi jumlah kamar tersedia tidak lebih dari total kamar
    if ($total_room <= 0) {
        $error = "Total kamar harus lebih dari 0.";
    } elseif ($available_room < 0) {
        $error = "Jumlah kamar tersedia tidak boleh negatif.";
    } elseif ($available_room > $total_room) {
        $error = "Jumlah kamar tersedia tidak boleh lebih banyak dari total kamar.";
    }

    $image = "";

    // Proses upload gambar jika tersedia
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../uploads/';
        $filename = time() . '_' . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $filename;

        $ext = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $allowed)) {
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $image = $filename;
            } else {
                $error = "Gagal mengupload gambar.";
            }
        } else {
            $error = "Format gambar tidak valid. Hanya diperbolehkan: jpg, jpeg, png, webp.";
        }
    }

    // Lanjutkan jika tidak ada error
    if (!$error) {
        try {
            // Simpan data kost ke tabel `kosts`
            $stmt = $conn->prepare("
                INSERT INTO kosts (
                    owner_id, name, address, description, price, image, kost_status,
                    is_verified, total_room, available_room, created_at
                ) VALUES (
                    :owner_id, :name, :address, :description, :price, :image, :kost_status,
                    :is_verified, :total_room, :available_room, :created_at
                )
            ");

            $stmt->execute([
                ':owner_id' => $owner_id,
                ':name' => $name,
                ':address' => $address,
                ':description' => $description,
                ':price' => $price,
                ':image' => $image,
                ':kost_status' => 'active',
                ':is_verified' => 0,
                ':total_room' => $total_room,
                ':available_room' => $available_room,
                ':created_at' => date('Y-m-d H:i:s')
            ]);

            // Ambil ID kost yang baru dimasukkan
            $kost_id = $conn->lastInsertId();

            // Simpan kategori yang dipilih ke tabel `kost_category`
            $category_ids = $_POST['category_ids'] ?? [];
            foreach ($category_ids as $cat_id) {
                $stmt = $conn->prepare("INSERT INTO kost_category (kost_id, category_id) VALUES (?, ?)");
                $stmt->execute([$kost_id, $cat_id]);
            }

            // Simpan fasilitas yang dipilih ke tabel `kost_facilities`
            $facility_ids = $_POST['facility_ids'] ?? [];
            foreach ($facility_ids as $fac_id) {
                $stmt = $conn->prepare("INSERT INTO kost_facilities (kost_id, facility_id) VALUES (?, ?)");
                $stmt->execute([$kost_id, $fac_id]);
            }

            // Simpan pesan sukses ke session dan redirect
            $_SESSION['success_msg'] = "Kos berhasil ditambahkan!";
            header("Location: /ekos/pages/pemilik/profile-kost.php?success=add");
            exit();
        } catch (PDOException $e) {
            $error = "Gagal menyimpan data: " . $e->getMessage();
        }
    }

    // Jika ada error, simpan ke session dan redirect
    if ($error) {
        $_SESSION['error_msg'] = $error;
        header("Location: /ekos/pages/pemilik/profile-kost.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>eKos - Tambah Kos</title>
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
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- [Template CSS Files] -->
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

    <!-- Header Topbar -->
    <?php require '../../includes/header.php'; ?>

    <!-- Main Content -->
    <div class="pc-container">
        <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Kos</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Manajemen Kos</a></li>
                            <li class="breadcrumb-item"><a href="/ekos/pages/pemilik/manage-kost.php">Kos Saya</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tambah Kos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Kost</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- FORM -->
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- FORM KIRI -->
                                            <div class="form-group">
                                                <label class="form-label" for="name">Nama Kos</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama kos" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Alamat Kos</label>
                                                <textarea type="text" name="address" class="form-control" placeholder="Masukkan alamat kos" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea type="text" name="description" class="form-control" placeholder="Masukkan deskripsi kos" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Harga Kos</label>
                                                <input type="number" name="price" class="form-control" placeholder="Masukkan harga kos" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- FORM KANAN -->
                                            <div class="form-group">
                                                <label class="form-label">Total Kamar</label>
                                                <input type="number" name="total_room" class="form-control" placeholder="Masukkan total kamar" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Kamar Tersedia</label>
                                                <input type="number" name="available_room" class="form-control" placeholder="Masukkan kamar tersedia" required>
                                            </div>
                                            <!-- Pilih Kategori -->
                                            <div class="form-group">
                                                <label for="category_ids">Kategori Kos</label>
                                                <select name="category_ids[]" id="category_ids" class="form-select select2 mr-2" multiple required>
                                                    <?php
                                                    $stmt = $conn->query("SELECT category_id, category_name FROM category");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- Pilih Fasilitas -->
                                            <div class="form-group">
                                                <label for="facility_ids">Fasilitas</label>
                                                <select name="facility_ids[]" id="facility_ids" class="form-select select2" multiple>
                                                    <?php
                                                    $stmt = $conn->query("SELECT facility_id, facility_name FROM facilities");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<option value='{$row['facility_id']}'>{$row['facility_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>                                  

                                            <div class="form group">
                                                <label for="image" class="form-label">Upload Gambar Kos</label>
                                                <input class="form-control" type="file" id="image" name="image" accept="image/*" onchange="previewImage()" required>
                                                <div class="form-text">Hanya gambar JPG, JPEG, PNG, atau WEBP.</div>
                                                <img id="image-preview" src="#" alt="Preview" class="img-thumbnail mt-2" style="display: none; max-height: 200px;">
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih opsi",
            allowClear: true,
            tags: false
        });
    });

    function previewImage() {
    const input = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
    }
    </script>

    <!-- Required Js -->
    <script src="../../assets/js/plugins/popper.min.js"></script>
    <script src="../../assets/js/plugins/simplebar.min.js"></script>
    <script src="../../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../../assets/js/pcoded.js"></script>
    <script src="../../assets/js/plugins/feather.min.js"></script>
</body>
</html>