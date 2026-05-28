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
    <title>Informasi Penyakit - Penyakit Neurologi</title>
    <style>
        /* CSS SAMA SEPERTI home.php + Tambahan CSS Contoh */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; background: #f8f9fa; }
        nav { background: linear-gradient(135deg, #799EFF, #9CC6DB); padding: 1rem 0; position: fixed; width: 100%; top: 0; z-index: 1000; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .nav-container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; display: flex; justify-content: space-between; align-items: center; }
        .logo { color: white; font-size: 1.5rem; font-weight: bold; text-decoration: none; }
        .nav-links { display: flex; list-style: none; }
        .nav-links li { margin-left: 2rem; }
        .nav-links a { color: white; text-decoration: none; transition: color 0.3s; font-weight: 500; }
        .nav-links a:hover, .nav-links a.active { color: #ffcccc; border-bottom: 2px solid white; }
        .user-info { display: flex; align-items: center; gap: 15px; }
        .user-greeting { color: white; font-weight: 500; }
        .btn-logout { background: rgba(255,255,255,0.2); color: white; padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; transition: 0.3s; border: 2px solid white; }
        .btn-logout:hover { background: white; color: #3A9AFF; }
        .hero { margin-top: 60px; background: linear-gradient(135deg, #667eea 0%, #3A9AFF 100%); color: white; padding: 4rem 2rem; text-align: center; }
        .hero h1 { font-size: 3rem; margin-bottom: 1rem; }
        section { padding: 4rem 2rem; max-width: 1200px; margin: 0 auto; }
        .section-title { text-align: center; font-size: 2.5rem; margin-bottom: 3rem; color: #3A9AFF; }
        
        /* Card Style (Seperti Foto 1) */
        .examples-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; }
        .example-card { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s; }
        .example-card:hover { transform: translateY(-5px); }
        .example-header { background: #3A9AFF; color: white; padding: 1.5rem; font-size: 1.3rem; font-weight: bold; }
        .example-body { padding: 1.5rem; }
        .example-body p { margin-bottom: 1rem; line-height: 1.6; }
        .read-more-btn { 
            display: inline-block; 
            background: linear-gradient(135deg, #3A9AFF, #799EFF); 
            color: white; 
            padding: 10px 25px; 
            border-radius: 25px; 
            text-decoration: none; 
            font-weight: 600; 
            transition: 0.3s; 
            box-shadow: 0 4px 15px rgba(58,154,255,0.3); 
            cursor: pointer;
        }
        .read-more-btn:hover { 
            transform: translateY(-3px); 
            box-shadow: 0 6px 20px rgba(58,154,255,0.4); 
        }
        
        /* Detail Section Style (Seperti Foto 2) */
        .detail-section { 
            display: none; 
            background: white; 
            padding: 3rem; 
            border-radius: 10px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.1); 
            margin-top: 2rem; 
        }
        .detail-section.active { display: block; }
        .detail-section h2 { color: #3A9AFF; margin-bottom: 1.5rem; font-size: 2rem; }
        .detail-section p { margin-bottom: 1rem; text-align: justify; line-height: 1.8; }
        .back-btn { 
            display: inline-block; 
            background: #dc143c; 
            color: white; 
            padding: 10px 25px; 
            border-radius: 25px; 
            text-decoration: none; 
            font-weight: 600; 
            margin-top: 2rem; 
            transition: 0.3s; 
            cursor: pointer;
        }
        .back-btn:hover { background: #c41234; transform: translateY(-2px); }
        
        footer { background: #008BFF; color: white; text-align: center; padding: 2rem; margin-top: 4rem; }
        .page-nav { display: flex; justify-content: center; gap: 1rem; margin-top: 3rem; flex-wrap: wrap; }
        .page-nav a { background: linear-gradient(135deg, #3A9AFF, #799EFF); color: white; padding: 12px 30px; border-radius: 25px; text-decoration: none; font-weight: 600; transition: 0.3s; box-shadow: 0 4px 15px rgba(58,154,255,0.3); }
        .page-nav a:hover { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(58,154,255,0.4); }
        .page-nav a.active { background: #dc143c; }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="home.php" class="logo">NEUROLOGI</a>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="deskripsi.php">Deskripsi</a></li>
                <li><a href="contoh.php" class="active">Contoh</a></li>
                <li><a href="lain.php">Lain-lain</a></li>
                <li><a href="team.php">TEAM</a></li>
            </ul>
            <div class="user-info">
                <span class="user-greeting">👋 <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="logout.php" class="btn-logout" onclick="return confirm('Logout?')">Logout</a>
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1>Contoh Penyakit</h1>
        <p>Jenis-jenis penyakit neurologi yang umum</p>
    </div>

    <section id="contoh">
        <h2 class="section-title">Jenis-Jenis Penyakit Neurologi</h2>
        
        <!-- Card List (Seperti Foto 1) -->
        <div id="card-list" class="examples-grid">
            <div class="example-card">
                <div class="example-header"> Stroke</div>
                <div class="example-body">
                    <p>Stroke adalah gangguan aliran darah ke otak yang terjadi ketika pembuluh darah mengalami penyumbatan atau pecah. Kondisi ini dapat menyebabkan kerusakan permanen pada sel-sel otak...</p>
                    <a class="read-more-btn" onclick="showDetail('stroke')">Baca Selengkapnya →</a>
                </div>
            </div>

            <div class="example-card">
                <div class="example-header">⚡ Epilepsi</div>
                <div class="example-body">
                    <p>Epilepsi merupakan gangguan aktivitas listrik otak yang menyebabkan kejang berulang. Kejang terjadi ketika ada gangguan sinyal listrik yang abnormal di otak...</p>
                    <a class="read-more-btn" onclick="showDetail('epilepsi')">Baca Selengkapnya →</a>
                </div>
            </div>

            <div class="example-card">
                <div class="example-header">🔥 Meningitis</div>
                <div class="example-body">
                    <p>Meningitis adalah peradangan pada meninges, yaitu selaput pelindung yang menutupi otak dan sumsum tulang belakang. Kondisi ini biasanya disebabkan oleh infeksi...</p>
                    <a class="read-more-btn" onclick="showDetail('meningitis')">Baca Selengkapnya →</a>
                </div>
            </div>

            <div class="example-card">
                <div class="example-header">🧩 Alzheimer</div>
                <div class="example-body">
                    <p>Penyakit Alzheimer adalah gangguan neurodegeneratif yang menyebabkan penurunan daya ingat dan kemampuan berpikir secara progresif. Penyakit ini merupakan bentuk demensia...</p>
                    <a class="read-more-btn" onclick="showDetail('alzheimer')">Baca Selengkapnya →</a>
                </div>
            </div>

            <div class="example-card">
                <div class="example-header">🔄 Parkinson</div>
                <div class="example-body">
                    <p>Penyakit Parkinson adalah gangguan sistem saraf yang memengaruhi gerakan tubuh. Penyakit ini terjadi akibat kerusakan sel-sel saraf di bagian otak yang menghasilkan dopamin...</p>
                    <a class="read-more-btn" onclick="showDetail('parkinson')">Baca Selengkapnya →</a>
                </div>
            </div>

            <div class="example-card">
                <div class="example-header">💫 Neuropati Perifer</div>
                <div class="example-body">
                    <p>Neuropati perifer adalah kerusakan pada saraf tepi yang menghubungkan otak dan sumsum tulang belakang dengan seluruh tubuh. Kondisi ini menyebabkan gangguan sensasi...</p>
                    <a class="read-more-btn" onclick="showDetail('neuropati')">Baca Selengkapnya →</a>
                </div>
            </div>
        </div>

        <!-- Detail Sections (Seperti Foto 2) -->
        <div id="detail-stroke" class="detail-section">
            <h2>Stroke: Serangan Mendadak yang Mengancam Nyawa</h2>
            <p>Stroke merupakan gangguan aliran darah ke otak yang terjadi secara mendadak. Kondisi ini terjadi ketika pembuluh darah yang memasok darah ke otak mengalami penyumbatan (stroke iskemik) atau pecah (stroke hemoragik). Tanpa aliran darah yang cukup, sel-sel otak akan kekurangan oksigen dan nutrisi, sehingga menyebabkan kematian sel dalam hitungan menit.</p>
            
            <p>Stroke iskemik terjadi ketika pembuluh darah tersumbat oleh bekuan darah atau endapan lemak (aterosklerosis). Sedangkan stroke hemoragik terjadi ketika pembuluh darah di otak pecah dan menyebabkan perdarahan. Keduanya sama-sama berbahaya dan memerlukan penanganan medis segera.</p>
            
            <p>Gejala stroke meliputi kelemahan atau kelumpuhan pada salah satu sisi tubuh, sulit berbicara atau memahami perkataan, gangguan penglihatan mendadak, sakit kepala hebat yang tidak tertahankan, serta gangguan keseimbangan. Penanganan cepat sangat penting karena setiap menit yang berlalu tanpa pengobatan, jutaan sel otak dapat rusak permanen.</p>
            
            <a class="back-btn" onclick="hideAllDetails()">← Kembali ke Daftar</a>
        </div>

        <div id="detail-epilepsi" class="detail-section">
            <h2>Epilepsi: Gangguan Aktivitas Listrik Otak</h2>
            <p>Epilepsi adalah gangguan sistem saraf pusat yang ditandai dengan kejang berulang. Kejang terjadi ketika ada gangguan pada sinyal listrik di otak, menyebabkan aktivitas listrik yang abnormal dan tidak terkendali. Gangguan ini dapat memengaruhi kesadaran, gerakan, sensasi, atau perilaku seseorang.</p>
            
            <p>Terdapat berbagai jenis kejang yang dapat dialami penderita epilepsi. Kejang parsial hanya memengaruhi sebagian tubuh atau fungsi tertentu, seperti kedutan pada tangan atau gangguan penglihatan. Kejang umum melibatkan seluruh tubuh dan dapat menyebabkan kehilangan kesadaran serta kejang tonik-klonik. Kejang absence lebih sering terjadi pada anak-anak dan ditandai dengan tatapan kosong sementara.</p>
            
            <p>Penyebab epilepsi bisa beragam, mulai dari faktor genetik, cedera kepala, infeksi otak seperti meningitis, hingga gangguan perkembangan otak. Meskipun tidak semua jenis epilepsi dapat disembuhkan, banyak penderita yang dapat mengontrol kejangnya dengan pengobatan yang tepat dan gaya hidup sehat.</p>
            
            <a class="back-btn" onclick="hideAllDetails()">← Kembali ke Daftar</a>
        </div>

        <div id="detail-meningitis" class="detail-section">
            <h2>Meningitis: Peradangan Mematikan pada Selaput Otak</h2>
            <p>Meningitis adalah peradangan pada meninges, yaitu tiga lapisan selaput pelindung yang menutupi otak dan sumsum tulang belakang. Kondisi ini umumnya disebabkan oleh infeksi virus, bakteri, atau jamur yang menyerang sistem saraf pusat. Meningitis bakteri merupakan bentuk yang paling berbahaya dan dapat mengancam nyawa jika tidak segera ditangani.</p>
            
            <p>Gejala meningitis seringkali muncul secara tiba-tiba dan meliputi demam tinggi, sakit kepala hebat yang tidak biasa, kaku pada leher, mual dan muntah, sensitivitas terhadap cahaya, kebingungan, serta ruam pada kulit. Pada bayi, gejala dapat berupa lekas marah, sulit makan, dan fontanel (ubun-ubun) yang menonjol.</p>
            
            <p>Diagnosis meningitis memerlukan pemeriksaan cairan serebrospinal melalui prosedur lumbal punksi. Pengobatan tergantung pada penyebabnya: meningitis bakteri memerlukan antibiotik intravena segera, sedangkan meningitis virus umumnya sembuh dengan sendirinya dengan perawatan suportif. Vaksinasi merupakan langkah pencegahan yang efektif untuk beberapa jenis meningitis.</p>
            
            <a class="back-btn" onclick="hideAllDetails()">← Kembali ke Daftar</a>
        </div>

        <div id="detail-alzheimer" class="detail-section">
            <h2>Alzheimer: Penurunan Daya Ingat yang Progresif</h2>
            <p>Penyakit Alzheimer adalah bentuk demensia yang paling umum, ditandai dengan penurunan daya ingat dan kemampuan berpikir yang terjadi secara bertahap. Penyakit ini disebabkan oleh akumulasi protein abnormal di otak, yaitu plak beta-amyloid dan kusut tau, yang merusak komunikasi antar sel saraf dan menyebabkan kematian sel otak.</p>
            
            <p>Gejala awal Alzheimer seringkali sulit dibedakan dari penuaan normal, seperti lupa kejadian baru, sulit menemukan kata yang tepat, atau kesulitan melakukan tugas sehari-hari. Seiring waktu, gejala akan memburuk dan penderita dapat mengalami disorientasi waktu dan tempat, perubahan kepribadian, kesulitan berbahasa, dan akhirnya kehilangan kemampuan untuk melakukan aktivitas dasar.</p>
            
            <p>Belum ada obat yang dapat menyembuhkan Alzheimer, namun beberapa obat dapat membantu memperlambat perkembangan gejala pada tahap awal. Dukungan keluarga dan lingkungan yang memahami kondisi penderita sangat penting untuk meningkatkan kualitas hidup. Penelitian terus dilakukan untuk menemukan terapi yang lebih efektif dan pencegahan dini.</p>
            
            <a class="back-btn" onclick="hideAllDetails()">← Kembali ke Daftar</a>
        </div>

        <div id="detail-parkinson" class="detail-section">
            <h2>Parkinson: Gangguan Gerakan yang Melemahkan</h2>
            <p>Penyakit Parkinson adalah gangguan sistem saraf progresif yang terutama memengaruhi gerakan tubuh. Penyakit ini terjadi akibat kerusakan sel-sel saraf di substantia nigra, bagian otak yang menghasilkan dopamin - neurotransmiter yang berperan penting dalam mengontrol gerakan. Penurunan kadar dopamin menyebabkan gangguan pada sinyal yang mengatur gerakan tubuh.</p>
            
            <p>Gejala utama Parkinson meliputi tremor (gemetar) pada tangan saat istirahat, bradikinesia (gerakan melambat), rigiditas (kekakuan otot), dan gangguan keseimbangan serta koordinasi. Gejala non-motorik juga dapat muncul, seperti gangguan tidur, depresi, sembelit, dan gangguan penciuman. Gejala biasanya dimulai pada satu sisi tubuh dan perlahan menyebar ke sisi lainnya.</p>
            
            <p>Pengobatan Parkinson berfokus pada penggantian dopamin yang hilang melalui obat-obatan seperti Levodopa. Terapi fisik, olahraga teratur, dan pola makan sehat juga berperan penting dalam mengelola gejala. Pada kasus tertentu, operasi deep brain stimulation (DBS) dapat menjadi pilihan terapi. Meskipun belum ada obat yang menyembuhkan, banyak penderita yang dapat hidup berkualitas dengan penanganan yang tepat.</p>
            
            <a class="back-btn" onclick="hideAllDetails()">← Kembali ke Daftar</a>
        </div>

        <div id="detail-neuropati" class="detail-section">
            <h2>Neuropati Perifer: Kerusakan Saraf yang Menyakitkan</h2>
            <p>Neuropati perifer adalah kondisi di mana saraf tepi (perifer) yang menghubungkan otak dan sumsum tulang belakang dengan seluruh tubuh mengalami kerusakan. Saraf tepi bertanggung jawab untuk mengirimkan sinyal sensorik, motorik, dan otonom. Kerusakan pada saraf ini dapat menyebabkan berbagai gangguan sensasi, gerakan, dan fungsi organ internal.</p>
            
            <p>Gejala neuropati perifer bervariasi tergantung pada jenis saraf yang terpengaruh. Neuropati sensorik menyebabkan rasa nyeri terbakar, kesemutan, mati rasa, atau hipersensitivitas terhadap sentuhan, biasanya dimulai dari tangan dan kaki. Neuropati motorik menyebabkan kelemahan otot, kram, dan kesulitan melakukan gerakan halus. Neuropati otonom memengaruhi fungsi organ seperti pencernaan, tekanan darah, dan keringat.</p>
            
            <p>Penyebab neuropati perifer sangat beragam, dengan diabetes sebagai penyebab paling umum. Penyebab lain meliputi defisiensi vitamin, penyakit autoimun, infeksi, paparan racun, cedera, serta faktor genetik. Pengobatan berfokus pada mengatasi penyebab yang mendasari dan mengelola gejala dengan obat nyeri, terapi fisik, serta perubahan gaya hidup.</p>
            
            <a class="back-btn" onclick="hideAllDetails()">← Kembali ke Daftar</a>
        </div>
    </section>

    <footer>
        <p>&copy; KELOMPOK 4 - Promosi Angkatan 2025</p>
    </footer>

    <script>
        function showDetail(disease) {
            // Hide all details
            const allDetails = document.querySelectorAll('.detail-section');
            allDetails.forEach(detail => detail.classList.remove('active'));
            
            // Hide card list
            document.getElementById('card-list').style.display = 'none';
            
            // Show selected detail
            const selectedDetail = document.getElementById('detail-' + disease);
            if (selectedDetail) {
                selectedDetail.classList.add('active');
                selectedDetail.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
        
        function hideAllDetails() {
            // Show card list
            document.getElementById('card-list').style.display = 'grid';
            
            // Hide all details
            const allDetails = document.querySelectorAll('.detail-section');
            allDetails.forEach(detail => detail.classList.remove('active'));
            
            // Scroll to top of section
            document.getElementById('contoh').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    </script>
</body>
</html>