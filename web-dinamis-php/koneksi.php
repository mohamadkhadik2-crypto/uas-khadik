<?php
// Mengambil konfigurasi dari Environment Variables (Docker)
// Jika tidak ada di env, gunakan default value untuk fallback
$host = getenv('DB_HOST') ?: 'db-webdinamis-php';
$user = getenv('DB_USER') ?: 'uas_doni_2388010045';
$pass = getenv('DB_PASSWORD') ?: 'Setiawan5525!';
$db   = getenv('DB_NAME') ?: 'uas_adm_doni';

// Membuat koneksi menggunakan MySQLi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
