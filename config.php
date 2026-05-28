<?php
$host = "localhost";
$username = "root";
$password = ""; // Default XAMPP kosong
$database = "login_system";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>