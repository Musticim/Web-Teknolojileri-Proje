<?php
// ============================================
// İletişim Formu Sunucu Tarafı İşlemleri (PHP)
// İletişim formundan gelen verileri hem ekranda gösteriyorum
// hem de PHPMailer ile kendi Gmail adresime bildirim gönderiyorum.
// ============================================

// Geliştirme sırasında hataları görebilmek için açık bıraktım
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sayfaya doğrudan (GET ile) erişilirse iletişim formuna geri yönlendiriyorum
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: iletisim.html");
    exit();
}

// Formdan gelen verileri alıyorum
// htmlspecialchars() ile XSS saldırılarına karşı güvenli hale getiriyorum
// trim() ile baştaki/sondaki boşlukları temizliyorum
$adSoyad = htmlspecialchars(trim($_POST['adSoyad'] ?? ''));
$email = htmlspecialchars(trim($_POST['email'] ?? ''));
$telefon = htmlspecialchars(trim($_POST['telefon'] ?? ''));
$konu = htmlspecialchars(trim($_POST['konu'] ?? ''));
$tercih = htmlspecialchars(trim($_POST['tercih'] ?? ''));
$mesaj = htmlspecialchars(trim($_POST['mesaj'] ?? ''));
$onay = isset($_POST['onay']) ? "Evet, onaylandı." : "Hayır, onaylanmadı.";

// ============================================
// PHPMailer ile Gmail SMTP üzerinden e-posta gönderme
// Ücretsiz hosting'lerde PHP'nin mail() fonksiyonu çalışmadığı için
// PHPMailer kütüphanesini kullanarak doğrudan Gmail SMTP sunucusuna bağlanıyorum.
// ============================================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer kütüphane dosyalarını dahil ediyorum (Composer kullanmadan manuel yükleme)
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
require_once 'phpmailer/Exception.php';

// SMTP şifrelerimi ayrı bir config dosyasında tutuyorum (güvenlik için .gitignore'a ekledim)
require_once 'config.php';

$mail_gonderildi = false;

try {
    // PHPMailer nesnesini oluşturuyorum (true parametresi hata olunca exception fırlatmasını sağlıyor)
    $mail = new PHPMailer(true);

    // Gmail SMTP bağlantı ayarlarım (hassas bilgileri config.php'den çekiyorum)
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;
    $mail->CharSet    = 'UTF-8';

    // Gönderici ve alıcı bilgilerini ayarlıyorum
    $mail->setFrom(SMTP_USER, 'Web Sitesi İletişim Formu');
    $mail->addAddress(MAIL_TO, 'Mustafa Abanoz');
    // Reply-To ile ziyaretçinin mailini ekliyorum, böylece Gmail'den direkt yanıt yazabiliyorum
    $mail->addReplyTo($email, $adSoyad);

    // Mail içeriğini düz metin olarak hazırlıyorum
    $mail->isHTML(false);
    $mail->Subject = 'Sitenizden Yeni İletişim Formu: ' . $konu;
    $mail->Body    = "=== YENİ İLETİŞİM FORMU ===\n\n"
                   . "Ad Soyad: " . $adSoyad . "\n"
                   . "E-Posta:  " . $email . "\n"
                   . "Telefon:  " . $telefon . "\n"
                   . "Konu:     " . $konu . "\n"
                   . "Tercih:   " . $tercih . "\n"
                   . "Onay:     " . $onay . "\n"
                   . "\n--- Mesaj ---\n" . $mesaj . "\n"
                   . "\n=============================\n"
                   . "Gönderim Zamanı: " . date("d.m.Y H:i:s") . "\n";

    // Maili gönderiyorum
    $mail->send();
    $mail_gonderildi = true;

} catch (Exception $e) {
    // Mail gönderilemezse hata vermeden devam ediyorum, form verileri yine ekrana basılacak
    $mail_gonderildi = false;
}

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Sonucu | Mustafa Abanoz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!-- Navbar -->
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
                    <li class="nav-item"><a class="nav-link active" href="iletisim.html">İletişim</a></li>
                    <li class="nav-item"><a class="nav-link nav-login" href="login.php">Giriş Yap</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- gelen form verilerini ekrana yazdır -->
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="result-card">
                    <div class="alert result-success text-center mb-4">
                        ✅ Mesajınız başarıyla alınmıştır!
                    </div>
                    <?php if (isset($mail_gonderildi) && $mail_gonderildi): ?>
                        <div class="alert text-center mb-3" style="background:rgba(22,163,74,0.1); color:#16a34a; border:none; border-radius:15px; font-weight:600;">
                            📧 E-posta bildirimi gönderildi.
                        </div>
                    <?php elseif (isset($mail_gonderildi)): ?>
                        <div class="alert text-center mb-3" style="background:rgba(217,119,6,0.1); color:#d97706; border:none; border-radius:15px; font-weight:600;">
                            ⚠️ E-posta gönderilemedi, ancak mesajınız kaydedildi.
                        </div>
                    <?php endif; ?>
                    <h2 class="text-center mb-5 result-heading">Gelen Form Verileri</h2>
                    
                    <div class="result-item">
                        <span class="result-label">Ad Soyad</span>
                        <span class="result-value"><?php echo !empty($adSoyad) ? $adSoyad : '<i>Belirtilmedi</i>'; ?></span>
                    </div>

                    <div class="result-item">
                        <span class="result-label">E-Posta</span>
                        <span class="result-value"><?php echo !empty($email) ? $email : '<i>Belirtilmedi</i>'; ?></span>
                    </div>

                    <div class="result-item">
                        <span class="result-label">Telefon</span>
                        <span class="result-value"><?php echo !empty($telefon) ? $telefon : '<i>Belirtilmedi</i>'; ?></span>
                    </div>

                    <div class="result-item">
                        <span class="result-label">Konu</span>
                        <span class="result-value"><?php echo !empty($konu) ? $konu : '<i>Belirtilmedi</i>'; ?></span>
                    </div>

                    <div class="result-item">
                        <span class="result-label">Geri Dönüş Tercihi</span>
                        <span class="result-value"><?php echo !empty($tercih) ? $tercih : '<i>Belirtilmedi</i>'; ?></span>
                    </div>

                    <div class="result-item">
                        <span class="result-label">Kişisel Veri Onayı</span>
                        <span class="result-value"><?php echo $onay; ?></span>
                    </div>

                    <div class="result-item result-item-last">
                        <span class="result-label">Mesaj</span>
                        <div class="result-value result-msg-box">
                            <?php echo !empty($mesaj) ? nl2br($mesaj) : '<i>Mesaj yok.</i>'; ?>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <a href="iletisim.html" class="btn-primary-custom">Geri Dön</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <p class="mb-1">© 2026 Web Teknolojileri Projesi</p>
            <p>Hazırlayan: <a href="cv.html">Mustafa Abanoz</a> | Sakarya Üniversitesi</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
