<?php
$config = [
    'hostname' => getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost', 
    'username' => getenv('DB_USER') ? getenv('DB_USER') : 'root',   
    'password' => getenv('DB_PASS') ? getenv('DB_PASS') : '', 
    'database' => getenv('DB_NAME') ? getenv('DB_NAME') : 'test_ci',
];
$conn = new mysqli($config['hostname'], $config['username'], $config['password'], $config['database']);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

echo "Koneksi berhasil!";

$conn->close();
?>