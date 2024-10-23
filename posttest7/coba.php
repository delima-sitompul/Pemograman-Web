<?php
require 'koneksi.php';
$query = "SELECT * FROM list";
    $sql = mysqli_query($conn, $query);
    $isi = [];
    while($row = mysqli_fetch_assoc($sql)) {
    $isi[] = $row;
    }

if(isset($_POST['tambah'])){
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
                $query = "INSERT INTO list (tugas , tanggal,img)  VALUES ('$tugas', '$tanggal' ,'$name_baru')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<script>alert('Berhasil menambah tugas!');</script>";
                    header('Location: coba.php'); 
                    exit();
                
            } else {
                echo "
                    <script>
                        alert('Gagal menambah tugas!');
                    
                    </script>
                ";
            }
                }
            } else {
                echo "
                    <script>
                        alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Ekstensi file tidak diperbolehkan. Hanya JPG, JPEG, PNG yang diperbolehkan.');
                </script>
            ";
        }
    
}

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    if (!empty($search)) {
        // Jika input pencarian tidak kosong, lakukan pencarian
        $query = "SELECT * FROM list WHERE tugas LIKE '%$search%'";
    } else {
        // Jika input kosong atau hanya spasi, tampilkan semua data
        $query = "SELECT * FROM list";
    }
} else {
    $query = "SELECT * FROM list";
}

$sql = mysqli_query($conn, $query);
$isi = [];
while($row = mysqli_fetch_assoc($sql)) {
    $isi[] = $row;
}

$data_found = count($isi) > 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Web</title>
    <link rel="stylesheet" href="coba.css?v=<?php echo time(); ?>" >
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>
    .action-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
        align-items: center;
    }

    .edit-btn, .delete-btn {
        background-color: #4CAF50; 
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .delete-btn {
        background-color: #f44336; 
    }

    .edit-btn:hover {
        background-color: #45a049;
    }

    .delete-btn:hover {
        background-color: #d32f2f;
    }

    a {
        color: white;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .search-btn {
        background-color: #45a049;
        color: white;
        margin: 30px;
        margin-left: 5px;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        width: 200px;
    }

    .search-btn:hover {
        background-color: #0b7dda;
    }

    .task-search {
        padding: 10px;
        font-size: 14px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 630px;
        background-color: #444;
        color: white;
    }
</style>

<body>
    <header>
        <nav>
            <div class="logo">My Website</div>
            <ul class="nav-links" id="nav-links">
                <li><a href="#">Home</a></li>
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

            <form action="coba.php" method="POST" enctype="multipart/form-data">
                <div class="task-input">
                    <input type="text" placeholder="Write your task" class="task-field" name="tugas">
                    <input type="date" class="date-field" name="tanggal">
                    <label for="foto" class="date-field">insert photos of activities:</label>
                    <input type="file" id="foto"  name="img" required>
                    <button class="add-task" name="tambah">+</button>
                </div>
            </form>
            <form method="GET" action="coba.php">
                <input type="text" name="search" placeholder="Search task..." class="task-search">
                <button type="submit" class="search-btn">Search</button>
            </form>
            <table id="task-table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Task</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach($isi as $ISI) : ?>
                    <?php $folder = "foto/" . $ISI["img"];?>
                    <tr>
                        <td><?php echo $i; ?> </td>
                        <td><?php echo $ISI ['tugas'];?></td>
                        <td><?php echo $ISI ['tanggal'];?></td>
                        <td><?php echo "<img src='$folder' width='100px' height='100px'>"; ?> </td>
                        <td>
                            <button class="edit-btn"><a href="update.php?id_tugas=<?php echo $ISI['id_tugas']; ?>">Update</a></button>
                            <button class="delete-btn"><a href="delete.php?id=<?php echo $ISI['id_tugas']?>"> Delete </a></button>
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
