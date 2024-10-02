<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['username'] = $username; 
        header("Location: index.php"); 
        exit;
    } elseif (isset($_POST['register'])) {
        $register_username = $_POST['register_username'];
        $register_password = $_POST['register_password'];
        $_SESSION['register_username'] = $register_username;
        header("Location: index.php"); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page with To-Do List</title>
    <link rel="stylesheet" href="p4.css">
</head>
<body>

    <header>
        <nav class="navbar">
            <h1>My Website</h1>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Me</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#" id="login-btn">Login</a></li>
            </ul>
            <button id="dark-mode-toggle">Dark Mode</button>
            <button class="hamburger" id="hamburger">&#9776;</button>
        </nav>
    </header>

    <main>
        <section id="home" class="section">
            <div class="container">
                <h2>Welcome to the To-Do List Web</h2>
                <div class="stats-container">
                    <div class="details">
                        <h1>To Do List</h1>
                        <p id="motivation-text">Let's get things done!</p>
                        <div id="progressBar">
                            <div id="progress"></div>
                        </div>
                    </div>
                    <div class="stats-numbers">
                        <p id="numbers">0 / 0</p>
                    </div>
                </div>

                <form id="task-form">
                    <input type="text" id="task-input" placeholder="Write your task" required>
                    <input type="datetime-local" id="task-deadline" required> 
                    <button type="submit">+</button>
                </form>

                <ul class="task-list" id="task-list"></ul>

                <?php if (isset($_SESSION['username'])): ?>
                    <p>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</p>
                <?php endif; ?>
            </div>
        </section>

        <section id="about" class="section">
            <div class="container">
                <h2>About Me</h2>
                <p>Hi, I am Delima. Welcome to my To-Do List Website. My NIM is 2309106020.</p>
            </div>
        </section>
    </main>

    <div id="popup-notification" class="popup hidden">
        <p>Masukkan nama Anda:</p>
        <input type="text" id="name-input" placeholder="Nama Anda">
        <button id="submit-name">Submit</button>
    </div>

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
            </form>
            <p>Belum punya akun? <a href="#" id="registerLink">Register</a></p>
        </div>
    </div>

    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Register</h2>
            <form action="index.php" method="POST">
                <input type="text" name="register_username" placeholder="Username" required>
                <input type="password" name="register_password" placeholder="Password" required>
                <button type="submit" name="register">Register</button>
            </form>
            <p>Sudah punya akun? <a href="#" id="loginLink">Login</a></p>
        </div>
    </div>

    <footer>
        <p>My Website</p>
    </footer>

    <script src="delima.js"></script>
</body>
</html>
