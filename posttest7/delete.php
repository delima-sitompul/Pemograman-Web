<?php
// Include koneksi ke database
require 'koneksi.php';

// Cek apakah ada id yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id_tugas = $_GET['id'];
    $query = "SELECT * FROM list";
    $sql = mysqli_query($conn, $query);
    $isi = [];
    while($row = mysqli_fetch_assoc($sql)) {
    $isi[] = $row;
    }
    $isi = $isi[0];
    // Query untuk menghapus data berdasarkan id_tugas
    $query = "DELETE FROM list WHERE id_tugas = $id_tugas";

    // Eksekusi query
    $result = mysqli_query($conn, $query);
    unlink('foto/'.$isi['img']);
    // Cek apakah query berhasil
    if ($result) {
        echo "
            <script>
                alert('Data berhasil dihapus!');
                window.location.href='coba.php'; // Redirect ke halaman utama
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menghapus data!');
                window.location.href='coba.php'; // Redirect ke halaman utama
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('ID tugas tidak ditemukan!');
            window.location.href='coba.php'; // Redirect ke halaman utama jika ID tidak ada
        </script>
    ";
}

?>
