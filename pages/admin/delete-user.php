<?php 
session_start();
require '../../config/database.php';

// Cek apakah pengguna sudah login dan apakah dia admin
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: /ekos/login.php"); 
    exit();
}

// Check apakah ada ID user yang dihapus
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Siapkan query untuk menghapus user
    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = :id");
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect ke halaman data user dengan pesan sukses
        header("Location: /ekos/pages/admin/manage-users.php?success=delete");
        exit();
    } else {
        // Redirect ke halaman data user dengan pesan error
        header("Location: /ekos/pages/admin/manage-users.php?error=delete");
        exit();
    }
} else {
    // Jika tidak ada ID yang diberikan, redirect ke halaman data user
    header("Location: /ekos/pages/admin/manage-users.php?error=invalid");
    exit();
}
?>