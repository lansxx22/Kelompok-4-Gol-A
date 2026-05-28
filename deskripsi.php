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
    <title>Tentang - Penyakit Neurologi</title>
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
        section { padding: 4rem 2rem; max-width: 1200px; margin: 0 auto; }
        .description-content { background: white; padding: 3rem; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .description-content h3 { color: #799EFF; margin: 1.5rem 0 1rem; font-size: 1.5rem; }
        .description-content p { margin-bottom: 1rem; text-align: justify; }
        .symptoms-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 1rem; }
        .symptom-item { background: #EAEFEF; padding: 1.5rem; border-left: 4px solid #799EFF; border-radius: 10px; text-align: center; transition: transform 0.3s; }
        .symptom-item:hover { transform: translateY(-5px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .symptom-image { width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 1rem; box-shadow: 0 3px 10px rgba(0,0,0,0.1); }
        .symptom-item strong { display: block; color: #3A9AFF; font-size: 1.2rem; margin-bottom: 0.5rem; }
        footer { background: #008BFF; color: white; text-align: center; padding: 2rem; margin-top: 4rem; }
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
                <li><a href="home.php">Home</a></li>
                <li><a href="deskripsi.php" class="active">Tentang</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li><a href="tips.php">Tips Pencegahan</a></li>
                <li><a href="team.php">TEAM</a></li>
            </ul>
            <div class="user-info">
                <span class="user-greeting">👋 <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                 <img src="images/profil.jpg" alt="User Avatar 1" class="nav-avatar">
                <a href="logout.php" class="btn-logout" onclick="return confirm('Logout?')">Logout</a>
                <!-- 2 Avatar di KANAN tombol Logout -->
                <img src="images/polije.png" alt="User Avatar 2" class="nav-avatar">
                <img src="images/promkes.png" alt="User Avatar 3" class="nav-avatar">
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1>Tentang Penyakit Neurologi</h1>
        <p>Pemahaman mendalam tentang penyakit neurologi</p>
    </div>

    <section>
        <div class="description-content">
            <h3>Pengertian</h3>
            <p>Penyakit neurologi adalah gangguan yang terjadi pada sistem saraf, yaitu otak, sumsum tulang belakang, dan saraf tepi, yang berfungsi mengatur seluruh aktivitas tubuh. Gangguan ini dapat memengaruhi kemampuan bergerak, berbicara, berpikir, mengingat, hingga merasakan rangsangan.</p>

            <h3>Gejala-Gejala</h3>
            <div class="symptoms-list">
                <div class="symptom-item">
                    <img src="images/sakit.jpeg" alt="Sakit Kepala" class="symptom-image">
                    <strong>🤕 Sakit Kepala Berat</strong>
                    <p>Nyeri kepala hebat yang tidak tertahankan</p>
                </div>
                <div class="symptom-item">
                    <img src="images/kejang.jpeg" alt="Kejang" class="symptom-image">
                    <strong>⚡ Kejang</strong>
                    <p>Gerakan tubuh tidak terkendali</p>
                </div>
                <div class="symptom-item">
                    <img src="images/kesemutan.jpeg" alt="Kesemutan" class="symptom-image">
                    <strong> Kesemutan</strong>
                    <p>Rasa seperti tertusuk jarum</p>
                </div>
                <div class="symptom-item">
                    <img src="images/lumpuh.jpeg" alt="Kelumpuhan" class="symptom-image">
                    <strong>🦵 Kelumpuhan</strong>
                    <p>Tidak bisa menggerakkan anggota tubuh</p>
                </div>
                <div class="symptom-item">
                    <img src="images/mati.jpeg" alt="Mati Rasa" class="symptom-image">
                    <strong>✋ Mati Rasa</strong>
                    <p>Hilang sensasi pada bagian tubuh</p>
                </div>
                <div class="symptom-item">
                    <img src="images/gangguan.jpg" alt="Gangguan Keseimbangan" class="symptom-image">
                    <strong>⚖️ Gangguan Keseimbangan</strong>
                    <p>Mudah jatuh / sempoyongan</p>
                </div>
            </div>

            <h3>Penyebab</h3>
            <p>Penyebab penyakit neurologi adalah berbagai kondisi yang mengganggu atau merusak sistem saraf (otak, sumsum tulang belakang, dan saraf tepi). Gangguan ini dapat terjadi karena aliran darah ke otak terganggu seperti pada Stroke, kerusakan sel saraf akibat proses penuaan seperti pada Alzheimer dan Parkinson, gangguan aktivitas listrik otak seperti Epilepsi, infeksi seperti Meningitis, cedera kepala, faktor keturunan, penyakit seperti hipertensi dan diabetes, serta paparan zat beracun.</p>
        </div>
    </section>

    <footer>
        <p>&copy; KELOMPOK 4 - Promosi Kesehatan Angkatan 2025</p>
    </footer>
</body>
</html>