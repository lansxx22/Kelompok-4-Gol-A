<?php session_start(); 
// Jika sudah login, langsung ke index
if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Neurologi</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                        url('https://perdossijaya.or.id///assets/img/general/1697304108_33e4400804ac90ddb86a.webp') center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: rgba(255,255,255,0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }
        h2 { color: #3A9AFF; margin-bottom: 25px; font-size: 1.8rem; }
        .input-group { margin-bottom: 18px; text-align: left; }
        .input-group label { display: block; margin-bottom: 5px; color: #555; font-weight: 500; }
        input {
            width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 8px;
            font-size: 1rem; transition: 0.3s;
        }
        input:focus { border-color: #3A9AFF; outline: none; box-shadow: 0 0 0 3px rgba(58,154,255,0.2); }
        .btn {
            width: 100%; padding: 14px; background: linear-gradient(135deg, #3A9AFF, #799EFF);
            color: white; border: none; border-radius: 8px; font-size: 1.1rem;
            cursor: pointer; transition: 0.3s; font-weight: 600; margin-top: 10px;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 5px 20px rgba(58,154,255,0.4); }
        .toggle-link { margin-top: 20px; color: #666; }
        .toggle-link a { color: #3A9AFF; text-decoration: none; font-weight: 600; cursor: pointer; }
        .toggle-link a:hover { text-decoration: underline; }
        .message { margin-top: 15px; padding: 10px; border-radius: 6px; font-size: 0.95rem; }
        .error { background: #ffe0e0; color: #c00; }
        .success { background: #e0ffe0; color: #090; }
        .hidden { display: none; }
        .logo { font-size: 1.5rem; font-weight: bold; color: #3A9AFF; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">🧠 INFO NEUROLOGI</div>
        
        <!-- Login Form -->
        <div id="loginForm">
            <h2>Login</h2>
            <form method="POST" action="login.php">
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" required placeholder="Masukkan username">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="Masukkan password">
                </div>
                <button type="submit" name="login" class="btn">Login</button>
                <?php if(isset($_GET['error'])): ?>
                    <div class="message error"><?= htmlspecialchars($_GET['error']) ?></div>
                <?php endif; ?>
            </form>
            <div class="toggle-link">
                Belum punya akun? <a onclick="toggleForm()">Daftar disini</a>
            </div>
        </div>

        <!-- Register Form -->
        <div id="registerForm" class="hidden">
            <h2>Daftar Akun</h2>
            <form method="POST" action="register.php">
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" required placeholder="Buat username">
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" required placeholder="Masukkan email">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" id="regPass" required placeholder="Minimal 6 karakter" minlength="6">
                </div>
                <div class="input-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="confirm_password" required placeholder="Ulangi password">
                </div>
                <button type="submit" name="register" class="btn">Daftar</button>
                <?php if(isset($_GET['reg_error'])): ?>
                    <div class="message error"><?= htmlspecialchars($_GET['reg_error']) ?></div>
                <?php endif; ?>
            </form>
            <div class="toggle-link">
                Sudah punya akun? <a onclick="toggleForm()">Login disini</a>
            </div>
        </div>
    </div>

    <script>
        function toggleForm() {
            document.getElementById('loginForm').classList.toggle('hidden');
            document.getElementById('registerForm').classList.toggle('hidden');
        }
        // Validasi password match
        document.querySelector('form[action="register.php"]').onsubmit = function(e) {
            const pass = document.getElementById('regPass').value;
            const confirm = this.querySelector('input[name="confirm_password"]').value;
            if(pass !== confirm) {
                e.preventDefault();
                alert('Password tidak cocok!');
            }
        }
    </script>
</body>
</html>