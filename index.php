<?php 
session_start();
require 'database.php';

$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query ke database
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifikasi password
    if($user && md5($password) === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role_id'] = $user['role_id'];
        header('Location: dashboard.php');
    } else {
        $error = 'Email atau password salah';
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
    <main class="main-login d-flex justify-content-center align-items-center">
        <div class="left-login d-flex justify-content-center align-items-center">
        <h1>Selamat Datang<br>di Sistem eKos</h1>
        </div>

        <div class="right-login d-flex justify-content-center align-items-center">
            <div class="card-login d-flex justify-content-center align-items-center flex-column rounded">
                <h1>Login</h1>
                <?php if ($error): ?>
                    <div class="alert alert-danger w-100 text-center">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST" class="w-100">
                    <div class="textfield d-flex flex-column">
                        <label for="email">Email</label>
                        <input class="text border-0 rounded p-2 w-100" name="email" placeholder="Email" id="email" type="email" required>
                    </div>
                    <div class="textfield d-flex flex-column">
                        <label for="password">Password</label>
                        <input class="text border-0 rounded p-2 w-100" name="password" placeholder="Password" id="password" type="password" required>
                    </div>
                    <button class="btn-login border-0 rounded fw-bold w-100" type="submit">Login</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>