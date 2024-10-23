<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db_nama = 'todo';

    $conn = mysqli_connect($server, $user, $password, $db_nama);

    if(!$conn){
        die("Gagal terhubung ke database: " . mysqli_connect_error());
    }
    else {

    }
?>