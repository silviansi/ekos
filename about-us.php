<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eKos - Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/navbar.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center text-light mb-5">Tentang Kami</h1>

        <div class="row">
            <div class="col-md-6">
                <img src="assets/img/home-decor-1.jpg" class="img-fluid rounded" alt="Tentang eKos" />
            </div>
            <div class="col-md-6 text-light">
                <h2 class="fw-bold">Siapa Kami?</h2>
                <p><strong>eKos</strong> adalah platform digital yang dirancang untuk memudahkan pencarian tempat kos bagi mahasiswa, pekerja, maupun siapa saja yang sedang mencari tempat tinggal sementara. Kami hadir untuk memberikan solusi cepat dan terpercaya dalam menemukan kos yang sesuai dengan kebutuhan dan budget Anda.</p>
            </div>
        </div>

        <section class="mt-5">
            <h2 class="text-light">Misi Kami</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm border-light">
                        <div class="card-body">
                            <h5 class="card-title">Platform Ramah Pengguna</h5>
                            <p class="card-text">Menyediakan platform yang mudah digunakan dan user-friendly, membuat pencarian kos menjadi lebih cepat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-light">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Akurat</h5>
                            <p class="card-text">Menampilkan informasi kos yang akurat dan transparan, agar Anda dapat memilih dengan yakin.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-light">
                        <div class="card-body">
                            <h5 class="card-title">Penghubung Terpercaya</h5>
                            <p class="card-text">Kami berfungsi sebagai penghubung antara pemilik kos dan calon penyewa, dengan sistem yang aman.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5">
            <h2 class="text-light mb-4">Fitur Unggulan</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Fitur 1 -->
                <div class="col">
                    <div class="card bg-dark text-light shadow-lg rounded-3">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-geo-alt fs-3 me-3"></i>
                            <div>
                                <h5 class="card-title text-light">Pencarian Kos Berdasarkan Lokasi</h5>
                                <p class="card-text">Temukan kos yang sesuai dengan lokasi, harga, dan fasilitas yang Anda butuhkan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Fitur 2 -->
                <div class="col">
                    <div class="card bg-dark text-light shadow-lg rounded-3">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-file-earmark-image fs-3 me-3"></i>
                            <div>
                                <h5 class="card-title text-light">Detail Kos Lengkap</h5>
                                <p class="card-text">Lihat foto, peta, dan ulasan dari penyewa sebelumnya untuk membantu Anda memilih kos yang tepat.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fitur 3 -->
                <div class="col">
                    <div class="card bg-dark text-light shadow-lg rounded-3">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 me-3"></i>
                            <div>
                                <h5 class="card-title text-light">Dashboard Pengguna</h5>
                                <p class="card-text">Kelola penyewaan dan informasi pribadi Anda dengan mudah melalui dashboard pribadi yang kami sediakan.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="mt-5">
            <h2 class="text-light">Kenapa Memilih Kami?</h2>
            <p class="text-light">Kami mengerti bahwa mencari tempat tinggal yang nyaman itu tidak mudah. Dengan teknologi dan tim yang berdedikasi, kami ingin membuat proses pencarian tempat kos menjadi lebih sederhana, cepat, dan aman. eKos hadir untuk mempermudah Anda dalam menemukan tempat tinggal yang sesuai dengan kebutuhan.</p>
        </section>

        <section class="mt-5 mb-5">
            <h2 class="text-light">Hubungi Kami</h2>
            <p class="text-light">Punya pertanyaan, kritik, atau saran? Jangan ragu untuk menghubungi kami melalui <a href="kontak-kami.php" class="text-primary">halaman kontak</a> atau email ke <strong>support@ekos.id</strong>.</p>
        </section>
    </div>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>