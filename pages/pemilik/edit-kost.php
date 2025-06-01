<?php 
session_start();
require '../../config/database.php';

// Cek apakah pengguna sudah login dan apakah dia admin
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: /ekos/login.php"); 
    exit();
}

// Ambil ID kos dari URL
if (!isset($_GET['id'])) {
    header("Location: /ekos/pages/pemilik/manage-kost.php"); 
    exit();
}

$kost_id = $_GET['id'];

// Ambil data kos berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM kosts WHERE kost_id = :kost_id");
$stmt->execute([':kost_id' => $kost_id]);
$kost = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$kost) {
    header("Location: /ekos/pages/pemilik/manage-kost.php"); 
    exit();
}

// Proses update kos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $total_room = $_POST['total_room'];
    $available_room = $_POST['available_room'];
    $category_ids = isset($_POST['category_ids']) ? $_POST['category_ids'] : [];
    $facility_ids = isset($_POST['facility_ids']) ? $_POST['facility_ids'] : [];

    // Validasi jumlah kamar tersedia tidak lebih dari total kamar
    if ($total_room <= 0) {
        $error = "Total kamar harus lebih dari 0.";
    } elseif ($available_room < 0) {
        $error = "Jumlah kamar tersedia tidak boleh negatif.";
    } elseif ($available_room > $total_room) {
        $error = "Jumlah kamar tersedia tidak boleh lebih banyak dari total kamar.";
    } else {
        // Proses upload gambar
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            $target_dir = "../../uploads/";
            $target_file = $target_dir . basename($image);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        } else {
            $image = $kost['image']; // Gunakan gambar lama jika tidak ada upload baru
        }

        // Update data kos
        $stmt = $conn->prepare("UPDATE kosts SET name = :name, address = :address, description = :description, price = :price, total_room = :total_room, available_room = :available_room, image = :image WHERE kost_id = :kost_id");
        $stmt->execute([
            ':name' => $name,
            ':address' => $address,
            ':description' => $description,
            ':price' => $price,
            ':total_room' => $total_room,
            ':available_room' => $available_room,
            ':image' => $image,
            ':kost_id' => $kost_id
        ]);

        // Hapus kategori dan fasilitas lama
        $conn->prepare("DELETE FROM kost_category WHERE kost_id = :kost_id")->execute([':kost_id' => $kost_id]);
        $conn->prepare("DELETE FROM kost_facilities WHERE kost_id = :kost_id")->execute([':kost_id' => $kost_id]);

        // Tambah kategori baru
        foreach ($category_ids as $category_id) {
            $conn->prepare("INSERT INTO kost_category (kost_id, category_id) VALUES (:kost_id, :category_id)")
                ->execute([':kost_id' => $kost_id, ':category_id' => $category_id]);
        }

        // Tambah fasilitas baru
        foreach ($facility_ids as $facility_id) {
            $conn->prepare("INSERT INTO kost_facilities (kost_id, facility_id) VALUES (:kost_id, :facility_id)")
                ->execute([':kost_id' => $kost_id, ':facility_id' => $facility_id]);
        }

        header("Location: /ekos/pages/pemilik/manage-kost.php?success=edit");
        exit();
    }
}

// Ambil kategori kos
$stmt = $conn->prepare("SELECT category_id, category_name FROM category");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Ambil fasilitas kos
$stmt = $conn->prepare("SELECT facility_id, facility_name FROM facilities");
$stmt->execute();
$facilities = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Ambil kategori yang sudah dipilih
$stmt = $conn->prepare("SELECT category_id FROM kost_category WHERE kost_id = :kost_id");
$stmt->execute([':kost_id' => $kost_id]);
$selected_categories = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
// Ambil fasilitas yang sudah dipilih
$stmt = $conn->prepare("SELECT facility_id FROM kost_facilities WHERE kost_id = :kost_id");
$stmt->execute([':kost_id' => $kost_id]);
$selected_facilities = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
// Set default image if not exists
if (!$kost['image']) {
    $kost['image'] = 'default-kos.jpg'; // Ganti dengan gambar default yang sesuai
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>eKos - Edit Kos</title>
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
                            <h5 class="m-b-10">Edit Kos</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Manajemen Kos</a></li>
                            <li class="breadcrumb-item"><a href="/ekos/pages/pemilik/profile-kost.php">Profile Kos Saya</a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit Kos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-sm-12">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Kost</h5>
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
                                                <input type="text" name="name" class="form-control" id="name" value="<?= htmlspecialchars($kost['name']) ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Alamat Kos</label>
                                                <textarea name="address" class="form-control" required><?= htmlspecialchars($kost['address']) ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea name="description" class="form-control" required><?= htmlspecialchars($kost['description']) ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Harga Kos</label>
                                                <input type="number" name="price" class="form-control" value="<?= htmlspecialchars($kost['price']) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- FORM KANAN -->
                                            <div class="form-group">
                                                <label class="form-label">Total Kamar</label>
                                                <input type="number" name="total_room" class="form-control" value="<?= htmlspecialchars($kost['total_room']) ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Kamar Tersedia</label>
                                                <input type="number" name="available_room" class="form-control" value="<?= htmlspecialchars($kost['available_room']) ?>" required>
                                            </div>
                                            <!-- Pilih Kategori -->
                                            <div class="form-group">
                                                <label for="category_ids">Kategori Kos</label>
                                                <select name="category_ids[]" id="category_ids" class="form-select select2 mr-2" multiple required>
                                                    <?php
                                                    foreach ($categories as $category) {
                                                        $selected = in_array($category['category_id'], $selected_categories) ? 'selected' : '';
                                                        echo "<option value='{$category['category_id']}' $selected>{$category['category_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- Pilih Fasilitas -->
                                            <div class="form-group">
                                                <label for="facility_ids">Fasilitas</label>
                                                <select name="facility_ids[]" id="facility_ids" class="form-select select2" multiple>
                                                    <?php
                                                    foreach ($facilities as $facility) {
                                                        $selected = in_array($facility['facility_id'], $selected_facilities) ? 'selected' : '';
                                                        echo "<option value='{$facility['facility_id']}' $selected>{$facility['facility_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>                                  

                                            <div class="form group">
                                                <label for="image" class="form-label">Upload Gambar Kos</label>
                                                <input class="form-control" type="file" id="image" name="image" accept="image/*" onchange="previewImage()">
                                                <div class="form-text">Hanya gambar JPG, JPEG, PNG, atau WEBP.</div>
                                                <img id="image-preview" src="/ekos/uploads/<?= $kost['image'] ?>" alt="Preview" class="img-thumbnail mt-2" style="max-height: 200px;">
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
        const imageInput = document.getElementById('image');
        const preview = document.getElementById('image-preview');

        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
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