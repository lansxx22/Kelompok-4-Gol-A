<?php
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("Location: login_page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Penyakit Neurologi</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; background: #f8f9fa; }
        nav { background: linear-gradient(135deg, #799EFF, #9CC6DB); padding: 1rem 0; position: fixed; width: 100%; top: 0; z-index: 1000; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .nav-container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; display: flex; justify-content: space-between; align-items: center; }
        .logo-link { display: flex; align-items: center; gap: 10px; text-decoration: none; color: white; font-size: 1.5rem; font-weight: bold; }
        .nav-logo { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(255,255,255,0.8); }
        .nav-links { display: flex; list-style: none; }
        .nav-links li { margin-left: 2rem; }
        .nav-links a { color: white; text-decoration: none; transition: color 0.3s; font-weight: 500; }
        .nav-links a:hover, .nav-links a.active { color: #ffcccc; border-bottom: 2px solid white; }
        .user-info { display: flex; align-items: center; gap: 12px; }
        .user-greeting { color: white; font-weight: 500; }
        .btn-logout { background: rgba(255,255,255,0.2); color: white; padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; transition: 0.3s; border: 2px solid white; }
        .btn-logout:hover { background: white; color: #3A9AFF; }
        .nav-avatar { width: 35px; height: 35px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(255,255,255,0.8); box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .hero { margin-top: 60px; background: linear-gradient(135deg, #667eea 0%, #3A9AFF 100%); color: white; padding: 4rem 2rem; text-align: center; }
        .hero h1 { font-size: 3rem; margin-bottom: 1rem; }
        .hero p { font-size: 1.2rem; max-width: 800px; margin: 0 auto; }
        .row { display: flex; flex-wrap: wrap; margin: 2rem 0; justify-content: center; }
        .column { flex: 0 0 33.33%; max-width: 33.33%; padding: 10px; box-sizing: border-box; }
        .column img { width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        section { padding: 4rem 2rem; max-width: 1200px; margin: 0 auto; }
        .section-title { text-align: center; font-size: 2.5rem; margin-bottom: 3rem; color: #3A9AFF; }
        .home-content { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; }
        .card { background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center; transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); }
        .card-icon { font-size: 3rem; margin-bottom: 1rem; }
        .card h3 { color: #dc143c; margin-bottom: 1rem; }
        footer { background: #008BFF; color: white; text-align: center; padding: 2rem; margin-top: 4rem; }
        @media (max-width: 768px) { .column { flex: 0 0 100%; max-width: 100%; } }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="home.php" class="logo-link">
                <span>NEUROLOGI</span>
                <img src="images/logo.jpeg" alt="Logo Neurologi" class="nav-logo">
            </a>
            <ul class="nav-links">
                <li><a href="home.php" class="active">Home</a></li>
                <li><a href="deskripsi.php">Tentang</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li><a href="tips.php">Tips Pencegahan</a></li>
                <li><a href="team.php">TEAM</a></li>
            </ul>
            <div class="user-info">
                <span class="user-greeting">👋 <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <!-- 1 Foto di KIRI Logout -->
                <img src="images/profil.jpg" alt="User Avatar 1" class="nav-avatar">
                <a href="logout.php" class="btn-logout" onclick="return confirm('Logout?')">Logout</a>
                <!-- 2 Avatar di KANAN tombol Logout -->
                <img src="images/polije.png" alt="User Avatar 2" class="nav-avatar">
                <img src="images/promkes.png" alt="User Avatar 3" class="nav-avatar">
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1>Penyakit Neurologi</h1>
        <p>Ketahui lebih lanjut tentang penyakit neurologi, gejala, pencegahan, dan cara menjaga kesehatan Anda</p>
    </div>

    <div class="row">
        <div class="column"><img src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1630488794/attached_image/penyakit/neurologi/multiple-sclerosis/diagnosis.jpg" alt="Neurologi 1"></div>
        <div class="column"><img src="https://www.ekahospital.com/storage/article/1678155803-Gangguan-Neurologi-(1).jpg" alt="Neurologi 2"></div>
        <div class="column"><img src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1657854013/attached_image/penyakit/neurologi/meningitis.jpg" alt="Neurologi 3"></div>
    </div>

    <section id="home">
        <h2 class="section-title">Selamat Datang</h2>
        <div class="home-content">
            <div class="card">
                <div class="card-icon">🧠</div>
                <h3>Apa Itu Penyakit Neurologi?</h3>
                <p>Penyakit neurologi adalah gangguan atau kelainan yang menyerang sistem saraf, yaitu sistem dalam tubuh yang mengatur dan mengendalikan seluruh aktivitas tubuh.</p>
            </div>
            <div class="card">
                <div class="card-icon">⚠️</div>
                <h3>Faktor Risiko</h3>
                <p>Faktor risikonya meliputi usia lanjut, faktor keturunan, gaya hidup tidak sehat (merokok, kurang olahraga), penyakit seperti hipertensi dan diabetes, cedera kepala, infeksi seperti Meningitis, serta gangguan pembuluh darah otak seperti Stroke.</p>
            </div>
            <div class="card">
                <div class="card-icon">🛡️</div>
                <h3>Pencegahan</h3>
                <p>Menerapkan pola hidup sehat seperti makan bergizi seimbang, rutin berolahraga, tidak merokok, membatasi alkohol, serta mengontrol tekanan darah, gula, dan kolesterol untuk mencegah gangguan seperti Stroke.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; KELOMPOK 4 - Promosi Kesehatan Angkatan 2025</p>
    </footer>
</body>
</html>