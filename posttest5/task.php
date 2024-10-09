<?php
require 'koneksi.php';


if (isset($_POST['tambah'])) {
    $tugas = $_POST["tugas"];
    $tanggal = $_POST["tanggal"];
    

    $sql = "INSERT INTO list (tugas, tanggal) VALUES ('$tugas', '$tanggal')";

    if($conn -> query($sql)){
        echo "<script>alert('Register berhasil!')</script>";
        header("Location: coba.php");
    }
    else {
        echo "<script>alert('Register gagal!')</script>";
        header("Location: coba.php");
    }
}
?>