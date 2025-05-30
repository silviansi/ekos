<?php 
require '../../config/database.php';

// Cek apakah ada ID kategori yang dihapus
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Siapkan query untuk menghapus kategori
    $stmt = $conn->prepare("DELETE FROM category WHERE category_id = :id");
    $stmt->bindParam(':id', $category_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect ke halaman data kategori dengan pesan sukses
        header("Location: /ekos/pages/admin/category-kost.php?success=delete");
        exit();
    } else {
        // Redirect ke halaman data kategori dengan pesan error
        header("Location: /ekos/pages/admin/category-kost.php?error=delete");
        exit();
    }
} else {
    // Jika tidak ada ID yang diberikan, redirect ke halaman data kategori
    header("Location: /ekos/pages/admin/category-kost.php?error=invalid");
    exit();
}
?>