<?php
// Hata mesajlarını yakalamak için
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sisteme giriş sayfası. Öğrenci numarası ile güvenli giriş.">
    <title>Giriş Yap | Mustafa Abanoz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Mustafa Abanoz</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Navigasyonu aç/kapat">
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
                    <li class="nav-item"><a class="nav-link active nav-login" href="login.php">Giriş Yap</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="page-hero dot-bg-wrap dot-bg-purple pb-5">
            <div class="dot-bg-layer"></div>
            <div class="container">
                <p class="section-label">Öğrenci Sistemi</p>
                <h1 class="page-hero-title">Sisteme Giriş</h1>
                <p class="page-hero-subtitle">Projeyi test etmek için öğrenci numaranızla giriş yapınız.</p>
            </div>
        </div>

        <section class="container mb-5 mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="glass-card reveal">
                        
                        <?php if ($error === 'empty'): ?>
                            <div class="alert alert-warning" role="alert">
                                Lütfen e-posta ve şifre alanlarını boş bırakmayınız.
                            </div>
                        <?php elseif ($error === 'invalid'): ?>
                            <div class="alert alert-danger" role="alert">
                                Kullanıcı adı veya şifre hatalı. Lütfen tekrar deneyiniz.
                            </div>
                        <?php endif; ?>

                        <form id="loginForm" action="login_islem.php" method="POST" onsubmit="return validateLogin()">
                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold">Kullanıcı Adı (E-posta)</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Örn: b2412100001@sakarya.edu.tr">
                                <div id="emailError" class="text-danger mt-1 small" style="display:none;"></div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label fw-bold">Şifre (Öğrenci No)</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Örn: b2412100001">
                                <div id="passwordError" class="text-danger mt-1 small" style="display:none;"></div>
                            </div>
                            <button type="submit" class="btn-primary-custom w-100 text-center d-block border-0 mt-3 py-2">Giriş Yap</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="text-center mt-auto">
        <div class="container">
            <p class="mb-1">© 2026 Web Teknolojileri Projesi</p>
            <p>Hazırlayan: <a href="cv.html">Mustafa Abanoz</a> | Sakarya Üniversitesi</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateLogin() {
            var email = document.getElementById('email').value.trim();
            var password = document.getElementById('password').value.trim();
            var emailError = document.getElementById('emailError');
            var passwordError = document.getElementById('passwordError');
            var isValid = true;

            // E-posta formati kontrolü için Regex
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // E-posta alanı denetimi
            if (email === "") {
                emailError.textContent = "E-posta alanı boş bırakılamaz.";
                emailError.style.display = "block";
                isValid = false;
            } else if (!emailRegex.test(email)) {
                emailError.textContent = "Lütfen geçerli bir e-posta adresi formatı giriniz.";
                emailError.style.display = "block";
                isValid = false;
            } else {
                emailError.style.display = "none";
            }

            // Şifre alanı denetimi
            if (password === "") {
                passwordError.textContent = "Şifre alanı boş bırakılamaz.";
                passwordError.style.display = "block";
                isValid = false;
            } else {
                passwordError.style.display = "none";
            }

            return isValid;
        }

        // Sayfa içi görünüm (reveal) animasyonu observer ayarı
        (function () {
            var gozlemci = new IntersectionObserver(function (girdiler) {
                girdiler.forEach(function (eleman) { 
                    if (eleman.isIntersecting) { 
                        eleman.target.classList.add('in-view'); 
                        gozlemci.unobserve(eleman.target); 
                    } 
                });
            }, { threshold: 0.12 });
            document.querySelectorAll('.reveal').forEach(function (el) { gozlemci.observe(el); });
        })();
    </script>
</body>
</html>
