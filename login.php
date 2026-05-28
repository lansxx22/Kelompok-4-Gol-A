<?php
session_start();
require_once 'config.php';

if(isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        header("Location: login_page.php?error=Username dan password harus diisi!");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 0) {
        header("Location: login_page.php?error=Username tidak ditemukan!");
        exit;
    }

    $user = $result->fetch_assoc();
    
    if(!password_verify($password, $user['password'])) {
        header("Location: login_page.php?error=Password salah!");
        exit;
    }

    // Set session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['status'] = "login";

    header("Location: index.php");
    exit;
}
?>