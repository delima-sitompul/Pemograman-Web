<?php
require 'koneksi.php';
session_start();

// Proses login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepared statement untuk menghindari SQL injection
    $stmt = $conn->prepare("SELECT * FROM akun WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Jika pengguna ditemukan
    if ($user) {
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Login berhasil
            $_SESSION['username'] = $username;
            
            // Pastikan tidak ada output sebelum header
            ob_start();
            header("Location: coba.php");
            ob_end_flush();
            exit;
        } else {
            // Password salah
            $error_message = "Username atau password salah!";
        }
    } else {
        // Pengguna tidak ditemukan
        $error_message = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css"> <!-- Menghubungkan ke login.css -->
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
            <p style="color:red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
