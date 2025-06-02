<?php
session_start();
require '../../config/database.php';

// Cek apakah pengguna sudah login dan memiliki role pemilik
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: /ekos/login.php");
    exit();
}

// Cek apakah ada kost_id dari parameter GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error_msg'] = "ID kos tidak valid.";
    header("Location: /ekos/pages/pemilik/manage-kost.php");
    exit();
}

$kost_id = (int)$_GET['id'];
$owner_id = $_SESSION['user_id'];

try {
    // Pastikan kos milik pemilik yang sedang login
    $stmt = $conn->prepare("SELECT * FROM kosts WHERE kost_id = :kost_id AND owner_id = :owner_id");
    $stmt->execute([':kost_id' => $kost_id, ':owner_id' => $owner_id]);
    $kost = $stmt->fetch();

    if (!$kost) {
        $_SESSION['error_msg'] = "Kos tidak ditemukan atau bukan milik Anda.";
        header("Location: /ekos/pages/pemilik/manage-kost.php");
        exit();
    }

    // Hapus data dari tabel relasi dulu
    $conn->prepare("DELETE FROM kost_facilities WHERE kost_id = :kost_id")->execute([':kost_id' => $kost_id]);
    $conn->prepare("DELETE FROM kost_category WHERE kost_id = :kost_id")->execute([':kost_id' => $kost_id]);

    // Hapus data dari tabel utama
    $conn->prepare("DELETE FROM kosts WHERE kost_id = :kost_id")->execute([':kost_id' => $kost_id]);

    $_SESSION['success_msg'] = "Kos berhasil dihapus.";
    header("Location: /ekos/pages/pemilik/manage-kost.php?success=delete");
    exit();
} catch (PDOException $e) {
    $_SESSION['error_msg'] = "Gagal menghapus kos: " . $e->getMessage();
    header("Location: /ekos/pages/pemilik/manage-kost.php");
    exit();
}
?>