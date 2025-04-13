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
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold mx-3 brand-style" href="#">eKos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cari Kos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                </ul>
                <a class="btn btn-sm btn-logout me-2 px-3 mt-2" href="logout.php" role="button">Keluar</a>
            </div>
        </div>
    </nav>

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
                <a href="#" class="btn btn-outline-light rounded-pill">Lihat Semua</a>
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
                <a href="#" class="btn btn-cari">Cari Sekarang</a>
            </div>

            <!-- Bagian Kanan (Fasilitas) -->
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-6 col-md-3">
                        <div class="card fasilitas-card text-center">
                            <i class="bi bi-wifi fs-1 fasilitas-icon"></i>
                            <p class="mt-2 fasilitas-text">WiFi Gratis</p>
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
                            <p class="mt-2 fasilitas-text">Listrik Gratis</p>
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

    <!-- Tentang Kami -->
    <section id="about" class="py-5">
        <div class="container mt-4">
            <div class="row about-section align-items-center">
                <div class="col-md-6">
                    <img src="assets/img/about.jpg" class="about-img" alt="About Image">
                </div>

                <div class="col-md-6 px-5 text-light">
                    <h1 class="mb-5">Tentang Kami</h1>
                    <p>Kami adalah platform penyewaan kos yang memudahkan Anda menemukan hunian nyaman, aman, dan sesuai dengan kebutuhan. 
                        Dengan berbagai pilihan kos di lokasi strategis, kami menghubungkan pemilik kos dengan calon penyewa secara cepat dan mudah. 
                        Nikmati pencarian yang lebih efisien dan transparan hanya dalam beberapa klik!</p>
                </div>
            </div>
        </div>
    </section>

   <!-- Footer -->
    <footer class="py-4 text-center text-light">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 mb-3">
                <div>
                    <i class="bi bi-instagram fs-5 text-danger me-2"></i> ekos.surabaya
                </div>
                <div>
                    <i class="bi bi-facebook fs-5 text-primary me-2"></i> EkoSurabaya
                </div>
                <div>
                    <i class="bi bi-twitter fs-5 text-info me-2"></i> ekosurabaya
                </div>
            </div>

            <div class="text-light">
                Surabaya, Jawa Timur, Indonesia | <i class="bi bi-telephone-fill me-1"></i> +62 823 4567 890
            </div>

            <p class="mt-3 text-secondary">&copy; 2025 eKos - Platform Pencarian Kos. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>