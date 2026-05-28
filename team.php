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
    <title>Team - Penyakit Neurologi</title>
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
        .user-info { display: flex; align-items: center; gap: 15px; }
        .user-greeting { color: white; font-weight: 500; }
        .user-avatar { width: 35px; height: 35px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(255,255,255,0.8); }
        .btn-logout { background: rgba(255,255,255,0.2); color: white; padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; transition: 0.3s; border: 2px solid white; }
        .btn-logout:hover { background: white; color: #3A9AFF; }
        .hero { margin-top: 60px; background: linear-gradient(135deg, #667eea 0%, #3A9AFF 100%); color: white; padding: 4rem 2rem; text-align: center; }
        .hero h1 { font-size: 3rem; margin-bottom: 1rem; }
        section { padding: 4rem 2rem; max-width: 1200px; margin: 0 auto; }
        .team-members { display: flex; justify-content: center; align-items: stretch; flex-wrap: wrap; gap: 30px; margin: 2rem 0; }
        .team-member { text-align: center; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease; flex: 0 1 calc(20% - 24px); min-width: 180px; max-width: 220px; }
        .team-member:hover { transform: translateY(-10px); }
        .photo-wrapper { width: 120px; height: 120px; margin: 0 auto 20px; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .photo-wrapper img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .member-role { color: #667eea; font-size: 0.9rem; margin-bottom: 5px; font-weight: 600; }
        .member-name { color: #333; font-size: 1.1rem; font-weight: 700; margin-bottom: 10px; text-transform: uppercase; }
        .member-desc { color: #666; font-size: 0.85rem; line-height: 1.5; }
        footer { background: #008BFF; color: white; text-align: center; padding: 2rem; margin-top: 4rem; }
        @media (max-width: 1200px) { .team-member { flex: 0 1 calc(33.33% - 20px); } }
        @media (max-width: 768px) { .team-member { flex: 0 1 calc(50% - 15px); } }
        @media (max-width: 480px) { .team-member { flex: 0 1 100%; } }
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
                <li><a href="deskripsi.php">Tentang</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li><a href="tips.php">Tips Pencegahan</a></li>
                <li><a href="team.php" class="active">TEAM</a></li>
            </ul>
            <div class="user-info">
                <span class="user-greeting">👋 <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <!-- 1 Avatar di KIRI tombol Logout -->
                <img src="images/profil.jpg" alt="User Avatar 1" class="user-avatar">
                <a href="logout.php" class="btn-logout" onclick="return confirm('Logout?')">Logout</a>
                <!-- 2 Avatar di KANAN tombol Logout -->
                <img src="images/polije.png" alt="User Avatar 2" class="user-avatar">
                <img src="images/promkes.png" alt="User Avatar 3" class="user-avatar">
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1>Tim Kami</h1>
        <p>Kenali tim di balik website ini</p>
    </div>

    <section id="team">
        <div class="team-members">
            <div class="team-member">
                <div class="photo-wrapper"><img src="images/zahra.jpeg" alt="Zahra"></div>
                <div class="member-role">Member</div>
                <div class="member-name">Zahra</div>
                <div class="member-desc">Bagian Informasi</div>
            </div>
            <div class="team-member">
                <div class="photo-wrapper"><img src="images/adel.jpeg" alt="Adelia"></div>
                <div class="member-role">Member</div>
                <div class="member-name">Adelia</div>
                <div class="member-desc">Bagian Tips Pencegahan</div>
            </div>
            <div class="team-member">
                <div class="photo-wrapper"><img src="images/arif.jpeg" alt="Arif"></div>
                <div class="member-role">Member</div>
                <div class="member-name">Arif</div>
                <div class="member-desc">Bagian Login,daftar/register,Home</div>
            </div>
            <div class="team-member">
                <div class="photo-wrapper"><img src="images/serli.jpeg" alt="Serli"></div>
                <div class="member-role">Member</div>
                <div class="member-name">Serli</div>
                <div class="member-desc">Bagian Team</div>
            </div>
            <div class="team-member">
                <div class="photo-wrapper"><img src="images/talita.jpeg" alt="Talita"></div>
                <div class="member-role">Member</div>
                <div class="member-name">Talita</div>
                <div class="member-desc">Bagian Tentang</div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; KELOMPOK 4 - Promosi Kesehatan Angkatan 2025</p>
    </footer>
</body>
</html>