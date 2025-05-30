<?php 
session_start();
require_once 'config/database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        // Query untuk mencari pengguna berdasarkan email
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifikasi password menggunakan password_verify
        if ($user && password_verify($password, $user['password'])) {
            // Menyimpan informasi pengguna ke session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['username'] = $user['username']; 

            // Redirect sesuai dengan role_id
            switch ($user['role_id']) {
                case 1:
                    header('Location: /ekos/pages/admin/dashboard.php');
                    break;
                case 2:
                    header('Location: /ekos/pages/pemilik/dashboard.php');
                    break;
                case 3:
                    header('Location: index.php');
                    break;
                default:
                    $error = "Role tidak valid";
            }
            exit();
        } else {
            $error = 'Email atau password salah';
        }
    } else {
        $error = 'Harap isi semua kolom!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eKos - Masuk</title>
    <!-- [Favicon] icon -->
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon"> 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <main class="main-login d-flex justify-content-center align-items-center">
        <div class="left-login d-flex justify-content-center align-items-center">
        <h1 class="fw-bold">SEAMAT DATANG<br>DI SISTEM eKOS</h1>
        </div>

        <div class="right-login d-flex justify-content-center align-items-center">
            <div class="card-login d-flex justify-content-center align-items-center flex-column rounded">
                <h1>Masuk</h1>
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
                    <button class="btn-login border-0 rounded fw-bold w-100" type="submit">Masuk</button>
                </form>
                <p class="mt-3 text-light">Belum punya akun? <a href="register.php" class="text-success text-decoration-none">Daftar</a></p>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>