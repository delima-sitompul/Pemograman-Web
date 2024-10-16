<?php
require 'koneksi.php';
session_start();

if (isset($_POST['register'])) {
    $register_username = $_POST["register_username"];
    $register_password = $_POST["register_password"];

    $sql = "INSERT INTO akun (username, password) VALUES ('$register_username', '$register_password')";

    if($conn -> query($sql)){
        echo "<script>alert('Register berhasil!')</script>";
    }
    else {
        echo "<script>alert('Register gagal!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <input type="text" name="register_username" placeholder="Username" required>
            <input type="password" name="register_password" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <p>Sudah punya akun? <a href="index.php">Login</a></p>
    </div>
</body>
</html>
