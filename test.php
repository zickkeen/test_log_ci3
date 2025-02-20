<?php
$socket_path = "/tmp/mysql/mysql.sock"; // Ganti dengan path socket Anda
$conn = new mysqli("localhost", "root", "", "test_ci", null, $socket_path); // Perhatikan argumen socket

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

echo "Koneksi berhasil!";

$conn->close();
?>