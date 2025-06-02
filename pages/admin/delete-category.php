<?php 
session_start();
require '../../config/database.php';

// Cek apakah pengguna sudah login dan apakah dia admin
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: /ekos/login.php");
    exit();
}

// Cek jika form dikirim dengan POST dan ada ID kategori
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_id'])) {
    $category_id = (int) $_POST['category_id'];

    try {
        // Hapus kategori
        $stmt = $conn->prepare("DELETE FROM category WHERE category_id = :id");
        $stmt->bindParam(':id', $category_id, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION['success_msg'] = "Kategori berhasil dihapus.";
        header("Location: /ekos/pages/admin/category-kost.php?success=delete");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error_msg'] = "Gagal menghapus kategori: " . $e->getMessage();
        header("Location: /ekos/pages/admin/category-kost.php?error=delete");
        exit();
    }
} else {
    header("Location: /ekos/pages/admin/category-kost.php?error=invalid");
    exit();
}