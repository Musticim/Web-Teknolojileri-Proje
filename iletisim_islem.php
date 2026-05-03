<?php
// hata ayıklama açık (canlıda kapatılır)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// POST ile gelinmediyse geri yönlendir
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: iletisim.html");
    exit();
}

// form verilerini güvenli şekilde al
$adSoyad = htmlspecialchars(trim($_POST['adSoyad'] ?? ''));
$email = htmlspecialchars(trim($_POST['email'] ?? ''));
$telefon = htmlspecialchars(trim($_POST['telefon'] ?? ''));
$konu = htmlspecialchars(trim($_POST['konu'] ?? ''));
$tercih = htmlspecialchars(trim($_POST['tercih'] ?? ''));
$mesaj = htmlspecialchars(trim($_POST['mesaj'] ?? ''));
$onay = isset($_POST['onay']) ? "Evet, onaylandı." : "Hayır, onaylanmadı.";

// mail gönderme kodu - hosting'e yükleyince çalışır
/*
$kendi_mailim = "mustafabanoz66@gmail.com"; 
$mail_basligi = "Sitenizden Yeni İletişim Formu Dolduruldu!";

$mail_icerigi = "
Yeni bir mesajınız var!\n
Ad Soyad: $adSoyad
E-Posta: $email
Telefon: $telefon
Konu: $konu
Tercih: $tercih
Onay: $onay
\nMesaj:\n$mesaj
";

$header_ayarlari = "From: " . $email . "\r\n";
$header_ayarlari .= "Reply-To: " . $email . "\r\n";
$header_ayarlari .= "Content-Type: text/plain; charset=UTF-8\r\n";

mail($kendi_mailim, $mail_basligi, $mail_icerigi, $header_ayarlari);
*/

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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-1">
                    <li class="nav-item"><a class="nav-link" href="iletisim.html">Geri Dön</a></li>
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

</body>
</html>
