<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

echo "<h1>Selamat datang, " . htmlspecialchars($_SESSION['username']) . "</h1>";
echo "<p>Role ID: " . htmlspecialchars($_SESSION['role_id']) . "</p>";
?>

<a href="logout.php">Logout</a>