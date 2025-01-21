<?php 
session_start();
require 'database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query ke database
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifikasi password
    if($user && md5($password) === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role_id'] = $user['role_id'];
        header('Location: dashboard.php');
    } else {
        $error = 'Username atau password salah';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login eKos</title>
</head>
<body>
    <h2>Login eKos</h2>
    <?php if (isset($error)): ?>
        <p style="color: red"><?= $error ?></p>
    <?php endif; ?>
    
    <form action="index.php" method="POST">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username"><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br><br>
        <button type="submit">Login</button>
</body>
</html>