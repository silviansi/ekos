<div?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>

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
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" style="color: #00FF88" href="#">eKos</a>
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
            <a class="btn btn-sm me-2 fw-bold px-3" href="logout.php" style="background: #00AA55; border-radius: 50px">Keluar</a>
        </div>
    </div>
    </nav>

    <!-- Jumbotron -->
    <section id="header">
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
            <div class="search-box mt-4">
                <input type="text" placeholder="Lokasi">
                <button class="search-btn">Cari</button>
            </div>
        </div>
    </section>

    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold text-light">Selamat Datang di <span style="color:#00FF88">eKos</span></h1>
            <p class="lead text-light">
                Temukan kos impianmu dengan mudah dan cepat hanya di eKos. Pilih berdasarkan lokasi, harga, dan fasilitas yang sesuai!
            </p>
            <a href="#" class="btn btn-md btn-search fw-bold">Cari Kos Sekarang</a>
        </div>
    </section>

    <section class="py-5">
    <div class="container text-center">
        <h2>Fitur Unggulan</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <h4>Lokasi Strategis</h4>
                <p>Temukan kos di lokasi terbaik sesuai kebutuhan Anda.</p>
            </div>
            <div class="col-md-4">
                <h4>Bandingkan Harga</h4>
                <p>Bandingkan berbagai pilihan kos dengan harga terbaik.</p>
            </div>
            <div class="col-md-4">
                <h4>Ulasan Penghuni</h4>
                <p>Baca ulasan penghuni sebelumnya untuk pilihan yang lebih tepat.</p>
            </div>
        </div>
    </div>
    </section>

    <section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Kos Populer</h2>
        <div class="row mt-4">
            <!-- Kos Card -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="assets/images/kos1.jpg" class="card-img-top" alt="Kos A">
                    <div class="card-body">
                        <h5 class="card-title">Kos A</h5>
                        <p class="card-text">Harga: Rp1.500.000/bulan</p>
                        <a href="#" class="btn btn-primary" style="background-color: #00FF88;">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="assets/images/kos2.jpg" class="card-img-top" alt="Kos B">
                    <div class="card-body">
                        <h5 class="card-title">Kos B</h5>
                        <p class="card-text">Harga: Rp1.200.000/bulan</p>
                        <a href="#" class="btn btn-primary" style="background-color: #00FF88;">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="assets/images/kos3.jpg" class="card-img-top" alt="Kos C">
                    <div class="card-body">
                        <h5 class="card-title">Kos C</h5>
                        <p class="card-text">Harga: Rp1.000.000/bulan</p>
                        <a href="#" class="btn btn-primary" style="background-color: #00FF88;">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <section class="py-5">
    <div class="container text-center">
        <h2>Testimoni Pengguna</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"eKos mempermudah saya mencari kos di dekat kampus. Sangat membantu!"</p>
                    <footer class="blockquote-footer">Rina, Mahasiswa</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"Pilihan kos yang beragam dan harga yang transparan. Mantap!"</p>
                    <footer class="blockquote-footer">Andi, Pekerja</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"Saya sangat puas dengan layanan ini, mudah digunakan dan informatif."</p>
                    <footer class="blockquote-footer">Siti, Freelancer</footer>
                </blockquote>
            </div>
        </div>
    </div>
    </section>

    <section class="py-5 bg-light">
    <div class="container text-center">
        <h2>Berlangganan Informasi Kos</h2>
        <p>Masukkan email Anda untuk mendapatkan update kos terbaru.</p>
        <form class="row justify-content-center mt-3">
            <div class="col-md-4">
                <input type="email" class="form-control" placeholder="Email Anda" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100" style="background-color: #00FF88;">Daftar</button>
            </div>
        </form>
    </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-light footer">
    <div class="container text-center">
        <p>&copy; 2025 eKos - Platform Pencarian Kos. All Rights Reserved.</p>
        <p>
            <a href="#" class="text-light mx-2">Facebook</a>
            <a href="#" class="text-light mx-2">Instagram</a>
            <a href="#" class="text-light mx-2">Twitter</a>
        </p>
    </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>