<?php 
session_start();
require '../../config/database.php';

// Cek apakah pengguna sudah login dan apakah dia admin
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: /ekos/login.php"); 
    exit();
}

// Cek apakah ada ID fasilitas yang dihapus
if (isset($_GET['id'])) {
    $facility_id = $_GET['id'];

    // Siapkan query untuk menghapus fasilitas
    $stmt = $conn->prepare("DELETE FROM facilities WHERE facility_id = :id");
    $stmt->bindParam(':id', $facility_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect ke halaman data fasilitas dengan pesan sukses
        header("Location: /ekos/pages/admin/facility-kost.php?success=delete");
        exit();
    } else {
        // Redirect ke halaman data fasilitas dengan pesan error
        header("Location: /ekos/pages/admin/facility-kost.php?error=delete");
        exit();
    }
} else {
    // Jika tidak ada ID yang diberikan, redirect ke halaman data fasilitas
    header("Location: /ekos/pages/admin/facility-kost.php?error=invalid");
    exit();
}
?>