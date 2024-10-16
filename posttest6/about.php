<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Web</title>
    <link rel="stylesheet" href="coba.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        .about {
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }
    </style>
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

        <div  class="about">
            </section>
                <!-- Section About Me -->
                <section class="about-me" id="about-section">
                    <h1>About Me</h1>
                    <p>Hi, my name is Tua Delima Sitompul.</p>
                    <p>My NIM is 2309016020.</p>
                    <p>I am from class A'23.</p>
                    <button id="back-to-todo">Back to To-Do List</button>
            </section>
        </div>



    <footer>
    <p>&copy; <?php echo date("Y"); ?> My Website. All rights reserved.</p>
    </footer>
    <script src="coba.js"></script>
</body>

</html>
