<?php
// login_islem.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verileri al ve boşlukları temizle
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Projede istenildiği gibi tanımlanan sabit değişkenler
    // Kullanıcı adı: b2412100001@sakarya.edu.tr, Şifre: b2412100001
    $tanimli_email = "b251210371@sakarya.edu.tr";
    $tanimli_sifre = "b251210371";

    // Boş alan kontrolü (Sunucu tarafı güvenliği için de gereklidir)
    if (empty($email) || empty($password)) {
        header("Location: login.php?error=empty");
        exit();
    }

    // Bilgilerin karşılaştırılması
    if ($email === $tanimli_email && $password === $tanimli_sifre) {
        // Başarılı giriş senaryosu, mesaj gösterilir
        ?>
        <!DOCTYPE html>
        <html lang="tr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Giriş Başarılı | Mustafa Abanoz</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="index.html">Mustafa Abanoz</a>
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Navigasyonu aç/kapat">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto gap-1">
                            <li class="nav-item"><a class="nav-link" href="index.html">Hakkında</a></li>
                            <li class="nav-item"><a class="nav-link" href="cv.html">Özgeçmiş</a></li>
                            <li class="nav-item"><a class="nav-link" href="sehir.html">Şehrim</a></li>
                            <li class="nav-item"><a class="nav-link" href="miras.html">Mirasımız</a></li>
                            <li class="nav-item"><a class="nav-link" href="ilgi.html">İlgi Alanlarım</a></li>
                            <li class="nav-item"><a class="nav-link" href="iletisim.html">İletişim</a></li>
                            <li class="nav-item"><a class="nav-link active" href="login.php">Giriş Yap</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="d-flex align-items-center justify-content-center login-main">
                <div class="glass-card text-center p-5 reveal in-view login-card">
                    <div class="mb-4">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <h2 class="mb-3 text-success">Giriş Başarılı!</h2>
                    <p class="lead fw-bold">Hoşgeldiniz <?php echo htmlspecialchars($tanimli_sifre); ?></p>
                    <p class="text-muted mt-3">Yönlendiriliyorsunuz...</p>
                    <div class="mt-4">
                        <a href="index.html" class="btn-primary-custom">Ana Sayfaya Dön</a>
                    </div>
                </div>
            </main>
        </body>
        </html>
        <?php
        // Opsiyonel: 3 saniye sonra otomatik anasayfaya yönlendirme
        // header("refresh:3;url=index.html"); 
        exit();
    } else {
        // Hatalı bilgi durumunda hata mesajıyla login sayfasına yönlendirilir
        header("Location: login.php?error=invalid");
        exit();
    }
} else {
    // Sayfaya doğrudan erişim sağlanırsa login sayfasına at
    header("Location: login.php");
    exit();
}
?>
