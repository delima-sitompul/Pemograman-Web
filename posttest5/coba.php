<?php
require 'koneksi.php';

if(isset($_POST["tambah"])){
    $tugas = $_POST['tugas'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO list (tugas , tanggal)  VALUES ('$tugas', '$tanggal')";
    $result = mysqli_query($conn, $query);

        if ($result) {
            echo "
                <script>
                    alert('Berhasil menambah data mahasiswa!');
                   
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Gagal menambah data mahasiswa!');
                
                </script>
            ";
        }
}
$query = "SELECT * FROM list";

$sql = mysqli_query($conn, $query);

$isi = [];
while($row = mysqli_fetch_assoc($sql)) {
  $isi[] = $row;
}
?>


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
                <li><a href="index.php">Home</a></li>
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
        
        <!-- Section To-Do List -->
        <section class="todo-list" id="todo-section">
            <h1>Welcome to the To-Do List Web</h1>
            <p>Let's get things done!</p>

            <form action="coba.php" method="POST">
                <div class="task-input">
                    <input type="text" placeholder="Write your task" class="task-field" name="tugas">
                    <input type="date" class="date-field" name="tanggal">
                    <button class="add-task" name="tambah">+</button>
                </div>
            </form>

            <table id="task-table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Task</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach($isi as $ISI) : ?>
                    <tr>
                        <td><?php echo $i; ?> </td>
                        <td><?php echo $ISI ['tugas'];?></td>
                        <td><?php echo $ISI ['tanggal'];?></td>
                        
                        <td class="action-buttons">
                        <button class="edit-btn"><a href="update.php?id_tugas=<?php echo $ISI['id_tugas']; ?>">Edit</a></button>
                            <button class="delete-btn"><a href="delete.php?id=<?php echo $ISI['id_tugas']?>"> x </a></button>
                        </td>
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>

            <div class="progress-bar-container">
                <div class="progress-bar"></div>
                <span class="progress-text">0% completed</span>
            </div>
    </main>


    <footer>
    <p>&copy; <?php echo date("Y"); ?> My Website. All rights reserved.</p>
    </footer>
    <script src="coba.js"></script>
</body>

</html>
