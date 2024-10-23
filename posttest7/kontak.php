<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Web</title>
    <link rel="stylesheet" href="coba.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <div class="logo">My Website</div>
            <ul class="nav-links" id="nav-links">
                <li><a href="coba.php">Home</a></li>
                <li><a href="about.php" id="about-link">About Me</a></li>
                <li><a href="kontak.php" id="contact-link">Contact</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
            <div class="dark-mode-toggle">
                <input type="checkbox" id="dark-mode">
                <label for="dark-mode" class="dark-mode-label">
                    <i class="sun-icon">☀️</i>
                    <i class="moon-icon">🌙</i>
                </label>
            </div>
        </nav>
    </header>

    <main>
   

        <!-- Section Contact -->
        <section class="contact" id="contact-section">
            <h1>Kontak Saya</h1>
            <p>Email: <a href="mailto:delimasitompul514@gmail.com">delimasitompul514@gmail.com</a></p>
            <p>Nomor Telepon: <a href="tel:081265111798">081265111798</a></p>
            <button id="back-to-todo-contact">Kembali ke To-Do List</button>
        </section>
    </main>


    <footer>
    <p>&copy; <?php echo date("Y"); ?> My Website. All rights reserved.</p>
    </footer>
    <script src="coba.js"></script>
</body>

</html>
