<?php
$host = 'localhost';
$db = 'galleryfoto';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);
    // Set PDO untuk menampilkan error secara langsung
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($pdo) {
        echo "<script>console.log('Koneksi Database Berhasil')</script>";
    }
} catch (PDOException $e) {
    echo "<script>console.log('Koneksi Database Gagal: " . $e->getMessage() . "')</script>";
    // Tampilkan pesan error secara langsung di halaman
    die('Koneksi Database Gagal: ' . $e->getMessage());
}

return $pdo;
