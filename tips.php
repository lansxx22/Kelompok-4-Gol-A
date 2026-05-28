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
    <title>Tips Pencegahan - Penyakit Neurologi</title>
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
        .section-title { text-align: center; font-size: 2.5rem; margin-bottom: 3rem; color: #3A9AFF; }
        .others-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; }
        .info-card { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s; }
        .info-card:hover { transform: translateY(-5px); }
        .info-header { background: #3A9AFF; color: white; padding: 1.5rem; font-size: 1.3rem; font-weight: bold; }
        .card-image { width: 100%; height: 200px; object-fit: cover; display: block; }
        .info-body { padding: 1.5rem; }
        .info-body p { margin-bottom: 1rem; line-height: 1.6; }
        .read-more-btn { display: inline-block; background: linear-gradient(135deg, #3A9AFF, #799EFF); color: white; padding: 10px 25px; border-radius: 25px; text-decoration: none; font-weight: 600; transition: 0.3s; box-shadow: 0 4px 15px rgba(58,154,255,0.3); cursor: pointer; }
        .read-more-btn:hover { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(58,154,255,0.4); }
        .detail-section { display: none; background: white; padding: 3rem; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); margin-top: 2rem; }
        .detail-section.active { display: block; }
        .detail-section h2 { color: #3A9AFF; margin-bottom: 1.5rem; font-size: 2rem; }
        .detail-section p { margin-bottom: 1rem; text-align: justify; line-height: 1.8; }
        .detail-section ul { margin: 1rem 0; padding-left: 2rem; }
        .detail-section li { margin-bottom: 0.5rem; }
        .reference-box { background: #f0f8ff; border-left: 4px solid #3A9AFF; padding: 1.5rem; margin-top: 2rem; border-radius: 5px; }
        .reference-box h3 { color: #3A9AFF; margin-bottom: 1rem; }
        .reference-box p { font-size: 0.9rem; margin-bottom: 0.5rem; }
        .back-btn { display: inline-block; background: #dc143c; color: white; padding: 10px 25px; border-radius: 25px; text-decoration: none; font-weight: 600; margin-top: 2rem; transition: 0.3s; cursor: pointer; }
        .back-btn:hover { background: #c41234; transform: translateY(-2px); }
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
                <li><a href="deskripsi.php">Tentang</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li><a href="tips.php" class="active">Tips Pencegahan</a></li>
                <li><a href="team.php">TEAM</a></li>
            </ul>
            <div class="user-info">
                <span class="user-greeting"> <?php echo htmlspecialchars($_SESSION['username']); ?></span>
              <img src="images/profil.jpg" alt="User Avatar 1" class="nav-avatar">
                <a href="logout.php" class="btn-logout" onclick="return confirm('Logout?')">Logout</a>
                <!-- 2 Avatar di KANAN tombol Logout -->
                <img src="images/polije.png" alt="User Avatar 2" class="nav-avatar">
                <img src="images/promkes.png" alt="User Avatar 3" class="nav-avatar">
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1>Tips Pencegahan</h1>
        <p>Panduan pencegahan penyakit neurologi berbasis bukti ilmiah</p>
    </div>

    <section id="tips">
        <h2 class="section-title">Pencegahan Penyakit Neurologi</h2>
        <div id="card-list" class="others-grid">
            <div class="info-card">
                <div class="info-header">🧠 Pencegahan Stroke</div>
                <img src="images/tipssatu.jpg" alt="Ilustrasi Pencegahan Stroke" class="card-image">
                <div class="info-body">
                    <p>Stroke dapat dicegah dengan mengontrol faktor risiko utama seperti hipertensi, diabetes, dan kolesterol. Pola hidup sehat dengan diet rendah garam dan olahraga teratur terbukti menurunkan risiko stroke hingga 80%...</p>
                    <a class="read-more-btn" onclick="showDetail('stroke-prevention')">Baca Selengkapnya →</a>
                </div>
            </div>
            <div class="info-card">
                <div class="info-header">🧠 Pencegahan Demensia</div>
                <img src="images/tipsdua.jpg" alt="Ilustrasi Pencegahan Demensia" class="card-image">
                <div class="info-body">
                    <p>Demensia dan Alzheimer dapat dicegah dengan menjaga kesehatan otak melalui aktivitas kognitif, sosial, dan fisik. Stimulasi mental dan interaksi sosial terbukti memperlambat penurunan fungsi kognitif...</p>
                    <a class="read-more-btn" onclick="showDetail('dementia-prevention')">Baca Selengkapnya →</a>
                </div>
            </div>
            <div class="info-card">
                <div class="info-header">⚡ Pencegahan Epilepsi</div>
                <img src="images/tipstiga.jpg" alt="Ilustrasi Pencegahan Epilepsi" class="card-image">
                <div class="info-body">
                    <p>Pencegahan epilepsi berfokus pada pencegahan cedera kepala, infeksi sistem saraf pusat, dan komplikasi kehamilan. Imunisasi dan perawatan prenatal yang baik sangat penting untuk mencegah epilepsi pada anak...</p>
                    <a class="read-more-btn" onclick="showDetail('epilepsy-prevention')">Baca Selengkapnya →</a>
                </div>
            </div>
        </div>

        <div id="detail-stroke-prevention" class="detail-section">
            <h2>Pencegahan Stroke Melalui Manajemen Faktor Risiko</h2>
            <p>Stroke merupakan penyakit yang sebagian besar dapat dicegah. Berdasarkan data Riset Kesehatan Dasar (Riskesdas) 2018, sekitar 90% kasus stroke disebabkan oleh faktor risiko yang dapat dimodifikasi. Pencegahan stroke memerlukan pendekatan komprehensif yang meliputi pengendalian faktor risiko medis dan perubahan gaya hidup.</p>
            <p><strong>Manajemen Hipertensi:</strong> Hipertensi adalah faktor risiko stroke terpenting. Target tekanan darah <140/90 mmHg dapat menurunkan risiko stroke hingga 40%. Pengobatan antihipertensi harus dikonsumsi secara teratur sesuai anjuran dokter.</p>
            <p><strong>Kontrol Diabetes dan Kolesterol:</strong> Diabetes mellitus meningkatkan risiko stroke iskemik 2-4 kali lipat. Kontrol gula darah dengan target HbA1c <7% dan penggunaan statin untuk menurunkan kolesterol LDL <100 mg/dL sangat penting.</p>
            <p><strong>Perubahan Gaya Hidup:</strong></p>
            <ul>
                <li>Diet rendah garam (<2 gram/hari) dan tinggi serat</li>
                <li>Olahraga aerobik minimal 150 menit/minggu</li>
                <li>Menghentikan merokok dan membatasi alkohol</li>
                <li>Menjaga berat badan ideal (IMT 18.5-24.9)</li>
                <li>Manajemen stres dengan teknik relaksasi</li>
            </ul>
            <div class="reference-box">
                <h3>Referensi Jurnal:</h3>
                <p><strong>1.</strong> Kementerian Kesehatan RI. (2018). <em>Laporan Nasional Riskesdas 2018</em>. Badan Penelitian dan Pengembangan Kesehatan.</p>
                <p><strong>2.</strong> Misbach, J., et al. (2019). "Pedoman Pencegahan Stroke Primer di Indonesia." <em>Neurologia Indonesia</em>, 41(Suppl 1), 1-24.</p>
                <p><strong>3.</strong> PERDOSSI. (2020). <em>Pedoman Diagnosis dan Tatalaksana Stroke</em>. Jakarta: Perhimpunan Dokter Spesialis Saraf Indonesia.</p>
                <p><strong>4.</strong> Wasay, M., et al. (2021). "Stroke Prevention in Southeast Asia: Current Status and Future Directions." <em>Journal of Stroke and Cerebrovascular Diseases</em>, 30(3), 105-118.</p>
            </div>
            <a class="back-btn" onclick="hideAllDetails()">← Kembali ke Daftar</a>
        </div>

        <div id="detail-dementia-prevention" class="detail-section">
            <h2>Pencegahan Demensia dan Penyakit Alzheimer</h2>
            <p>Demensia merupakan sindrom penurunan fungsi kognitif yang memengaruhi memori, berpikir, dan kemampuan melakukan aktivitas sehari-hari. Meskipun belum ada obat yang dapat menyembuhkan Alzheimer, penelitian menunjukkan bahwa 40% kasus demensia dapat dicegah atau ditunda dengan intervensi gaya hidup.</p>
            <p><strong>Stimulasi Kognitif:</strong> Aktivitas mental yang menantang seperti membaca, bermain puzzle, belajar bahasa baru, atau memainkan alat musik dapat meningkatkan cadangan kognitif (cognitive reserve). Studi menunjukkan bahwa orang yang aktif secara mental memiliki risiko demensia 46% lebih rendah.</p>
            <p><strong>Aktivitas Fisik:</strong> Olahraga aerobik teratur meningkatkan aliran darah ke otak dan merangsang pertumbuhan sel saraf baru. Rekomendasi minimal 150 menit olahraga intensitas sedang per minggu dapat menurunkan risiko demensia hingga 30%.</p>
            <p><strong>Interaksi Sosial:</strong> Menjaga hubungan sosial yang aktif dan berkualitas melindungi otak dari penurunan kognitif. Isolasi sosial meningkatkan risiko demensia hingga 50%.</p>
            <p><strong>Diet Sehat untuk Otak:</strong></p>
            <ul>
                <li>Diet Mediterania atau MIND diet (kaya sayur, buah, ikan, kacang-kacangan)</li>
                <li>Asam lemak omega-3 dari ikan minimal 2x seminggu</li>
                <li>Antioksidan dari buah beri dan sayuran hijau</li>
                <li>Membatasi gula dan lemak jenuh</li>
            </ul>
            <div class="reference-box">
                <h3>Referensi Jurnal:</h3>
                <p><strong>1.</strong> Setiabudiawan, B., et al. (2019). "Faktor Risiko dan Pencegahan Demensia pada Lansia Indonesia." <em>Jurnal Geriatri Indonesia</em>, 5(2), 67-78.</p>
                <p><strong>2.</strong> Livingston, G., et al. (2020). "Dementia Prevention, Intervention, and Care: 2020 Report of the Lancet Commission." <em>The Lancet</em>, 396(10248), 413-446.</p>
                <p><strong>3.</strong> Kementerian Kesehatan RI. (2021). <em>Pedoman Nasional Pelayanan Kedokteran: Demensia</em>. Jakarta: Kemenkes RI.</p>
                <p><strong>4.</strong> Ranakusuma, T., et al. (2022). "Strategi Pencegahan Demensia di Indonesia: Pendekatan Life-Course." <em>Neurologia Indonesia</em>, 44(1), 15-26.</p>
            </div>
            <a class="back-btn" onclick="hideAllDetails()">← Kembali ke Daftar</a>
        </div>

        <div id="detail-epilepsy-prevention" class="detail-section">
            <h2>Pencegahan Epilepsi dan Kejang</h2>
            <p>Epilepsi adalah gangguan neurologis kronis yang ditandai dengan kejang berulang. Sekitar 25% kasus epilepsi dapat dicegah melalui upaya pencegahan faktor risiko. Pencegahan epilepsi memerlukan pendekatan yang berbeda sesuai dengan kelompok usia dan penyebab yang mendasarinya.</p>
            <p><strong>Pencegahan Perinatal:</strong> Sekitar 20% epilepsi pada anak disebabkan oleh komplikasi kehamilan dan persalinan. Pencegahan meliputi perawatan prenatal yang adekuat, pencegahan infeksi selama kehamilan, dan persalinan yang aman untuk mencegah asfiksia neonatorum dan trauma lahir.</p>
            <p><strong>Pencegahan Infeksi Sistem Saraf Pusat:</strong> Meningitis dan ensefalitis adalah penyebab epilepsi yang dapat dicegah. Imunisasi lengkap (terutama terhadap Haemophilus influenzae, Streptococcus pneumoniae, dan Japanese encephalitis) sangat penting untuk mencegah infeksi yang dapat menyebabkan epilepsi.</p>
            <p><strong>Pencegahan Cedera Kepala:</strong> Trauma kepala merupakan penyebab epilepsi pada dewasa muda. Upaya pencegahan meliputi:</p>
            <ul>
                <li>Penggunaan helm saat berkendara dan berolahraga</li>
                <li>Pencegahan jatuh pada lansia</li>
                <li>Keselamatan kerja di industri berisiko tinggi</li>
                <li>Pencegahan kekerasan dan kecelakaan lalu lintas</li>
            </ul>
            <p><strong>Pencegahan Stroke:</strong> Karena stroke adalah penyebab epilepsi tersering pada lansia, pencegahan stroke juga berarti pencegahan epilepsi. Kontrol faktor risiko stroke seperti hipertensi, diabetes, dan fibrilasi atrium sangat penting.</p>
            <div class="reference-box">
                <h3>Referensi Jurnal:</h3>
                <p><strong>1.</strong> Sidharta, P. (2018). "Epidemiologi dan Pencegahan Epilepsi di Indonesia." <em>Neurologia Indonesia</em>, 40(3), 145-156.</p>
                <p><strong>2.</strong> PERDOSSI. (2019). <em>Pedoman Diagnosis dan Tatalaksana Epilepsi</em>. Jakarta: Perhimpunan Dokter Spesialis Saraf Indonesia.</p>
                <p><strong>3.</strong> Kurniawan, M., et al. (2020). "Pencegahan Epilepsi pada Anak: Peran Imunisasi dan Perawatan Perinatal." <em>Jurnal Neurologi Indonesia</em>, 41(1), 23-31.</p>
                <p><strong>4.</strong> Ngugi, A.K., et al. (2021). "Prevention of Epilepsy in Low and Middle-Income Countries: A Systematic Review." <em>Epilepsia Open</em>, 6(2), 245-258.</p>
            </div>
            <a class="back-btn" onclick="hideAllDetails()">← Kembali ke Daftar</a>
        </div>
    </section>

    <footer>
        <p>&copy; KELOMPOK 4 - Promosi Kesehatan Angkatan 2025</p>
    </footer>

    <script>
        function showDetail(disease) {
            const allDetails = document.querySelectorAll('.detail-section');
            allDetails.forEach(detail => detail.classList.remove('active'));
            document.getElementById('card-list').style.display = 'none';
            const selectedDetail = document.getElementById('detail-' + disease);
            if (selectedDetail) {
                selectedDetail.classList.add('active');
                selectedDetail.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
        function hideAllDetails() {
            document.getElementById('card-list').style.display = 'grid';
            const allDetails = document.querySelectorAll('.detail-section');
            allDetails.forEach(detail => detail.classList.remove('active'));
            document.getElementById('tips').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    </script>
</body>
</html>