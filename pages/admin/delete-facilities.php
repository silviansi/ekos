<?php 
session_start();
require '../../config/database.php';

// Cek apakah pengguna sudah login dan apakah dia admin
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: /ekos/login.php"); 
    exit();
}

// Cek jika form dikirim dengan POST dan ada ID fasilitas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['facility_id'])) {
    $facility_id = (int) $_POST['facility_id']; // ← konsisten pakai $facility_id

    try {
        // Hapus fasilitas
        $stmt = $conn->prepare("DELETE FROM facilities WHERE facility_id = :id");
        $stmt->bindParam(':id', $facility_id, PDO::PARAM_INT); // ← variabelnya cocok sekarang
        $stmt->execute();

        $_SESSION['success_msg'] = "Fasilitas berhasil dihapus.";
        header("Location: /ekos/pages/admin/facility-kost.php?success=delete");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error_msg'] = "Gagal menghapus fasilitas: " . $e->getMessage();
        header("Location: /ekos/pages/admin/facility-kost.php?error=delete");
        exit();
    }
} else {
    header("Location: /ekos/pages/admin/facility-kost.php?error=invalid");
    exit();
}