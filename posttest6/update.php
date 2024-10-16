<?php
require 'koneksi.php';

// Mendapatkan id_tugas dari parameter URL
$id = $_GET['id_tugas'];
$query = "SELECT * FROM list WHERE id_tugas = '$id'";
    $sql = mysqli_query($conn, $query);
    $isi = [];
    while($row = mysqli_fetch_assoc($sql)) {
    $isi[] = $row;
    }
    $isi = $isi[0];

// Jika tombol update ditekan
if(isset($_POST['update'])){
    $tugas = $_POST['tugas'];
    $tanggal = $_POST['tanggal'];
    $foto = $_FILES['img']['name'];
    $foto_tmp = $_FILES['img']['tmp_name'];
    $extensi = explode('.', $foto);
    $extensi = strtolower(end($extensi));
    $name_baru = date('Y-m-d H.m.s').'.'.$extensi;
    $support = ['jpg', 'jpeg', 'png'];
    $size = $_FILES['img']['size'];
    $max_size = 2 * 1024 * 1024;
    
    if(in_array($extensi, $support)){
        if($size <= $max_size){
            if(move_uploaded_file($foto_tmp, 'foto/'.$name_baru)){
                $query = "UPDATE list SET tugas = '$tugas', tanggal = '$tanggal', img = '$name_baru' WHERE id_tugas = '$id'";
                $result = mysqli_query($conn, $query);              
                if ($result) {
                unlink('foto/'.$isi['img']);
                echo "
                    <script>
                        alert('Data berhasil diupdate!');
                        document.location.href = 'coba.php'; // Redirect ke halaman coba.php setelah update berhasil
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Gagal mengupdate data!');
                        document.location.href = 'coba.php';
                    </script>
                ";
            }
                }
            } else {
                echo "
                    <script>
                        alert('Ukuran file terlalu besar. Maksimal 2MB.');
                        document.location.href = 'coba.php';
                    </script>
                ";
            }
           
        }
        else {
            echo "
                <script>
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    document.location.href = 'coba.php';
                </script>
            ";
            
        }
    echo "
    <script>
    alert('Ekstensi file tidak diperbolehkan. Hanya JPG, JPEG, PNG yang diperbolehkan.');
    document.location.href = 'coba.php';
    </script>
    ";
    } 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update To-Do</title>
    <link rel="stylesheet" href="coba.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <div class="logo">My Website</div>
            <ul class="nav-links" id="nav-links">
                <li><a href="coba.php">Home</a></li>
                <li><a href="#" id="about-link">About Me</a></li>
                <li><a href="#" id="contact-link">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
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
        <!-- Form untuk Update To-Do -->
        <section class="todo-list" id="todo-section">
            <h1>Update Task</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="task-input">
                    <input type="text" placeholder="Write your task" class="task-field" name="tugas" required>
                    <input type="date" class="date-field" name="tanggal" required>
                    <label for="foto" class="date-field">insert photos of activities:</label>
                    <input type="file" id="foto"  name="img" required>
                    <button class="add-task" name="update">update</button>
                </div>
            </form>
        </section>

        <!-- Section About Me -->
        <section class="about-me" id="about-section" style="display: none;">
            <h1>About Me</h1>
            <p>Hi, my name is Tua Delima Sitompul.</p>
            <p>My NIM is 2309016020.</p>
            <p>I am from class A'23.</p>
            <button id="back-to-todo">Back to To-Do List</button>
        </section>

        <!-- Section Contact -->
        <section class="contact" id="contact-section" style="display: none;">
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
