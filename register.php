<?php
require_once 'config.php';

if(isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // Validasi
    if(empty($username) || empty($email) || empty($password)) {
        header("Location: login_page.php?reg_error=Semua field harus diisi!");
        exit;
    }
    if($password !== $confirm) {
        header("Location: login_page.php?reg_error=Password tidak cocok!");
        exit;
    }
    if(strlen($password) < 6) {
        header("Location: login_page.php?reg_error=Password minimal 6 karakter!");
        exit;
    }

    // Cek username/email sudah ada
    $check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    if($check->get_result()->num_rows > 0) {
        header("Location: login_page.php?reg_error=Username atau Email sudah terdaftar!");
        exit;
    }

    // Hash password & insert
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed);
    
    if($stmt->execute()) {
        header("Location: login_page.php?success=Registrasi berhasil! Silakan login.");
    } else {
        header("Location: login_page.php?reg_error=Terjadi kesalahan!");
    }
    exit;
}
?>