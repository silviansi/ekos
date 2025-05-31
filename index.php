<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png">
    <title>eKos - Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/navbar.php'; ?>

    <!-- Header -->
    <header>
        <div class="container mt-4">
            <div class="row header-section align-items-center">
                <div class="col-md-6 px-5">
                    <h1 class="mb-5">Temukan tempat ternyaman untuk tinggal</h1>
                    <p>Temukan kos terbaik dengan fasilitas lengkap dan lokasi strategis, sesuai kebutuhan kamu!</p>
                </div>

                <div class="col-md-6">
                    <img src="assets/img/header.jpg" class="header-img" alt="Header Image">
                </div>
            </div>
        </div>
    </header>

    <!-- Kos populer -->
    <section id="kos-populer" class="py-5">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="text-light fw-bold">Kos Populer</h2>
                    <p class="text-light mb-0">Kami punya banyak pilihan kos yang cocok untukmu!</p>
                </div>
                <a href="search-kos.php" class="btn btn-outline-light rounded-pill">Lihat Semua</a>
            </div>
            <div class="row">
            <!-- Kos Card Template -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow border-0">
                    <img src="assets/img/kos-a.jpg" class="card-img-top" alt="Kos A">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">Kos Ketintang Wiyata</h5>
                        <p class="card-text text-muted">Harga: Rp1.500.000/bulan</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                        <div class="rating text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <a href="#" class="btn btn-sm btn-detail rounded-pill px-3">Lihat Detail</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow border-0">
                    <img src="assets/img/kos-b.jpeg" class="card-img-top" alt="Kos B">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">Kos Wonokromo</h5>
                        <p class="card-text text-muted">Harga: Rp1.200.000/bulan</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                        <div class="rating text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <a href="#" class="btn btn-sm btn-detail rounded-pill px-3">Lihat Detail</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow border-0">
                    <img src="assets/img/kos-c.jpg" class="card-img-top" alt="Kos C">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">Kos Lidah Wetan</h5>
                        <p class="card-text text-muted">Harga: Rp1.000.000/bulan</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                        <div class="rating text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <a href="#" class="btn btn-sm btn-detail rounded-pill px-3">Lihat Detail</a>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas -->
    <section id="fasilitas" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Bagian Kiri (Deskripsi) -->
            <div class="col-md-4 mb-4 mb-md-0">
                <p class="fasilitas-desc">Temukan berbagai fasilitas terbaik yang akan membuat pengalaman tinggalmu lebih nyaman dan menyenangkan. Dari koneksi Wi-Fi cepat hingga ruang kerja pribadi, semua tersedia untuk memenuhi kebutuhanmu!</p>
                <a href="search-kos.php" class="btn btn-cari">Cari Sekarang</a>
            </div>

            <!-- Bagian Kanan (Fasilitas) -->
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-6 col-md-3">
                        <div class="card fasilitas-card text-center">
                            <i class="bi bi-wifi fs-1 fasilitas-icon"></i>
                            <p class="mt-2 fasilitas-text">WiFi</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card fasilitas-card text-center">
                            <i class="bi bi-car-front fs-1 fasilitas-icon"></i>
                            <p class="mt-2 fasilitas-text">Area Parkir</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card fasilitas-card text-center">
                            <i class="bi bi-cup-hot fs-1 fasilitas-icon"></i>
                            <p class="mt-2 fasilitas-text">Dapur Bersama</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card fasilitas-card text-center">
                            <i class="bi-droplet fs-1 fasilitas-icon"></i>
                            <p class="mt-2 fasilitas-text">Kamar Mandi</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card fasilitas-card text-center">
                            <i class="bi bi-lightning fs-1 fasilitas-icon"></i>
                            <p class="mt-2 fasilitas-text">Listrik</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card fasilitas-card text-center">
                            <i class="bi bi-water fs-1 fasilitas-icon"></i>
                            <p class="mt-2 fasilitas-text">Area Cuci Baju</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card fasilitas-card text-center">
                            <i class="bi bi-people fs-1 fasilitas-icon"></i>
                            <p class="mt-2 fasilitas-text">Ruang Bersama</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card fasilitas-card text-center">
                            <i class="bi bi-three-dots fs-1 fasilitas-icon"></i>
                            <p class="mt-2 fasilitas-text">Layanan Lain</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold text-light">Apa Kata Mereka?</h2>
            <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card p-3 h-100 shadow-sm border-0">
                <p>"Platform eKos sangat membantu saya dalam menemukan kos yang nyaman dan strategis dekat kampus!"</p>
                <div class="d-flex align-items-center mt-3">
                    <img src="assets/img/user-1.png" alt="User" class="rounded-circle me-3" width="50">
                    <div>
                    <strong>Ayu P.</strong><br><small>Mahasiswa</small>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-3 h-100 shadow-sm border-0">
                <p>"Sangat praktis dan informatif. Saya bisa lihat fasilitas lengkap dan langsung booking dari rumah!"</p>
                <div class="d-flex align-items-center mt-3">
                    <img src="assets/img/user-2.png" alt="User" class="rounded-circle me-3" width="50">
                    <div>
                    <strong>Rizky A.</strong><br><small>Karyawan</small>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-3 h-100 shadow-sm border-0">
                <p>"Rekomendasi kos dari eKos benar-benar sesuai dengan kebutuhan saya. Top banget!"</p>
                <div class="d-flex align-items-center mt-3">
                    <img src="assets/img/user-3.png" alt="User" class="rounded-circle me-3" width="50">
                    <div>
                    <strong>Dina M.</strong><br><small>Freelancer</small>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja eKos -->
    <section id="proses" class="py-5">
        <div class="container text-center text-light">
            <h2 class="pb-5 fw-bold text-light">Cara Kerja eKos</h2>
            <div class="row">
                <div class="col-md-3">
                    <i class="bi bi-search fs-1 text-primary"></i>
                    <h5 class="mt-3">Cari Kos</h5>
                    <p>Gunakan fitur pencarian untuk menemukan kos yang sesuai dengan lokasi dan kebutuhanmu.</p>
                </div>
                <div class="col-md-3">
                    <i class="bi bi-info-circle fs-1 text-primary"></i>
                    <h5 class="mt-3">Lihat Detail</h5>
                    <p>Lihat informasi lengkap kos, seperti harga, fasilitas, dan ulasan.</p>
                </div>
                <div class="col-md-3">
                    <i class="bi bi-bookmark-check fs-1 text-primary"></i>
                    <h5 class="mt-3">Booking Online</h5>
                    <p>Lakukan reservasi secara online tanpa perlu datang langsung ke lokasi.</p>
                </div>
                <div class="col-md-3">
                    <i class="bi bi-house-check fs-1 text-primary"></i>
                    <h5 class="mt-3">Tinggal Nyaman</h5>
                    <p>Datang dan nikmati tempat tinggal barumu yang nyaman dan sesuai harapan!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Kami -->
    <section id="partner" class="py-5">
        <div class="container text-center text-light">
            <h2 class="fw-bold mb-4">Dipercaya oleh Banyak Mitra</h2>
            <p class="mb-5">eKos telah bekerja sama dengan berbagai pemilik kos dan institusi pendidikan di Indonesia.</p>
            <div class="row justify-content-center">
                <div class="col-4 col-md-2 mb-3"><img src="assets/img/partner-1.png" class="img-fluid w-50" alt="Partner 1"></div>
                <div class="col-4 col-md-2 mb-3"><img src="assets/img/partner-2.png" class="img-fluid w-50" alt="Partner 2"></div>
                <div class="col-4 col-md-2 mb-3"><img src="assets/img/partner-3.png" class="img-fluid w-50" alt="Partner 3"></div>
                <div class="col-4 col-md-2 mb-3"><img src="assets/img/partner-4.png" class="img-fluid w-50" alt="Partner 4"></div>
                <div class="col-4 col-md-2 mb-3"><img src="assets/img/partner-5.png" class="img-fluid w-50" alt="Partner 5"></div>
                <div class="col-4 col-md-2 mb-3"><img src="assets/img/partner-6.png" class="img-fluid w-50" alt="Partner 6"></div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 text-center text-white">
        <div class="container">
            <h2 class="fw-bold mb-3">Siap menemukan kos impianmu?</h2>
            <p class="mb-4">Bergabung sekarang dan rasakan kemudahan mencari kos terbaik bersama eKos!</p>
            <a href="register.php" class="btn btn-cari">Daftar Sekarang</a>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="about" class="about-section py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Gambar -->
                    <div class="col-lg-6">
                        <div class="about-img-wrapper">
                            <img src="assets/img/about.jpg" class="about-img" alt="About Image">
                        </div>
                    </div>

                <!-- Konten -->
                <div class="col-lg-6 text-light">
                    <h2 class="mb-4 fw-bold">Kenali Kami Lebih Dekat</h2>
                    <p class="lead mb-4">Kami hadir sebagai solusi modern untuk pencarian kos yang nyaman, aman, dan strategis.
                        Platform kami memudahkan kamu menemukan tempat tinggal ideal hanya dalam beberapa klik.
                    </p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Proses cepat & transparan</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pilihan kos beragam</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i> Didukung teknologi canggih & tim terpercaya</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/script.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>