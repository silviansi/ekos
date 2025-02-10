<?php 
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
    <title>Admin Dashboard - eKos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
      .sidebar {
        height: 100vh; 
        width: 250px; 
        position: fixed; 
        top: 0;
        left: 0;
        background-color: #343a40; 
        padding-top: 20px;
      }
      .sidebar .list-group-item {
        background: none;
        color: white;
        border: none;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      .sidebar .list-group-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
      }
      .content {
        margin-left: 250px;
        padding: 20px;
      }
      .list-group-item {
        display: flex;
        align-items: center;
        gap: 10px; 
      }
      .list-group-item i {
        font-size: 18px; 
        width: 20px; 
        text-align: center;
      }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="sidebar bg-dark border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-white text-center py-4 p-3">eKos Admin</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fa-solid fa-chart-bar me-2"></i> Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fa-solid fa-table me-2"></i> Data Kos</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fa-solid fa-cog me-2"></i> Pengaturan</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-dark text-danger"><i class="fa-solid fa-sign-out-alt me-2"></i> Logout</a>
            </div>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper" class="content w-100 p-4">
            <h2>Dashboard</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Kos</h5>
                            <p class="card-text">15 Kos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Pengguna</h5>
                            <p class="card-text">120 Pengguna</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pesanan Bulan Ini</h5>
                            <p class="card-text">30 Pesanan</p>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mt-4">Data Kos</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kos</th>
                        <th>Alamat</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kos Mawar</td>
                        <td>Jalan Merdeka No.10</td>
                        <td>Rp 500.000/bulan</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kos Melati</td>
                        <td>Jalan Soekarno No.5</td>
                        <td>Rp 700.000/bulan</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>