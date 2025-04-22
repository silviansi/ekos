<?php 
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validasi input
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = 'Semua kolom wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Format email tidak valid.';
    } elseif ($password !== $confirm_password) {
        $error = 'Konfirmasi password tidak sesuai.';
    } else {
        try {
            // Cek apakah email sudah terdaftar
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $error = 'Email sudah terdaftar.';
            } else {
                // Hash password
                $hashed_password = md5($password);

                // Insert data ke database
                $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->execute();

                // Redirect ke halaman login
                header('Location: index.php');
                exit;
            }
        } catch (PDOException $e) {
            $error = 'Kesalahan server:' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eKos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main class="main-register d-flex justify-content-center align-items-center">
        <div class="left-register d-flex justify-content-center align-items-center">
            <h1>Selamat Datang<br>di Sistem eKos</h1>
        </div>

        <div class="right-register d-flex justify-content-center align-items-center">
            <div class="card-register d-flex justify-content-center align-items-center flex-column rounded">
                <h1>Register</h1>
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger w-100" role="alert">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="" class="w-100">
                    <div class="textfield d-flex flex-column">
                        <label for="username">Username</label>
                        <input class="text border-0 rounded p-2 w-100" type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="textfield d-flex flex-column">
                        <label for="email">Email</label>
                        <input class="text border-0 rounded p-2 w-100" type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="textfield d-flex flex-column">
                        <label for="password">Password</label>
                        <input class="text border-0 rounded p-2 w-100" type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="textfield d-flex flex-column">
                        <label for="confirm_password">Konfirmasi Password</label>
                        <input class="text border-0 rounded p-2 w-100" type="password" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password" required>
                    </div>
                    <button class="btn-register border-0 rounded fw-bold" type="submit">Daftar</button>
                </form>
                <p class="text-light mt-3">Sudah punya akun? <a href="login.php" class="text-success text-decoration-none">Login</a></p>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>