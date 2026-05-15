# Web Teknolojileri Proje Ödevi

Bu proje, Sakarya Üniversitesi Bilgisayar Mühendisliği 2. sınıf **Web Teknolojileri** dersi final proje ödevi olarak hazırlanmıştır.

##  Proje Hakkında
Dönem içinde derste gördüğümüz HTML, CSS, JavaScript ve PHP gibi konuları kullanarak kendi kişisel web sitemi tasarladım. Hocanın yönergede belirttiği kurallara uymak için hiç hazır tema kullanmadım, tasarımları kendi yazdığım CSS dosyası ile yaptım. Sadece sayfa iskeletini (grid) düzgün oturtmak için Bootstrap kullandım.

##  Kullanılan Teknolojiler
| Teknoloji | Kullanım Amacı |
|-----------|---------------|
| **HTML5** (Semantik) | Tüm sayfaların yapısal iskeleti (`<header>`, `<section>`, `<article>` vb.) |
| **CSS3** (Harici `style.css`) | Tüm özel stiller — glassmorphism, animasyonlar, responsive tasarım |
| **Bootstrap 5** | Yalnızca ızgara (grid) sistemi için |
| **JavaScript** (Native) | Slider, scroll animasyonları, form doğrulama (iletişim & login) |
| **Vue.js** | İletişim formunda 2. framework doğrulama butonu |
| **PHP** | Form veri işleme ve Login sistemi |
| **PHPMailer** | İletişim formu mail gönderimi |
| **OMDb API** | Film verisi çekimi |
| **Steam API** | Oyun verisi çekimi |
| **TheSportsDB API** | Futbol puan tablosu çekimi |

##  Sayfalar ve İçerik
1. **Hakkında (`index.html`)** — Kendimi tanıttığım anasayfa. Hobiler ve favori içerik videosu içerir.
2. **Özgeçmiş (`cv.html`)** — `<header>`, `<section>`, `<article>` semantik etiketleriyle kurgulanmış CV sayfası.
3. **Şehrim (`sehir.html`)** — Kocaeli tanıtım sayfası. JS ile yazılmış 4+ resimli tıklanabilir **Slider** içerir.
4. **Mirasımız (`miras.html`)** — Kocaelispor'u anlattığım sayfa. TheSportsDB API'si üzerinden canlı Süper Lig tablosu çekilmektedir.
5. **İlgi Alanlarım (`ilgi.html`)** — OMDb ve Steam API'leriyle çekilen film & oyun verileri (hava durumu veya döviz API'si **kullanılmamıştır**).
6. **İletişim (`iletisim.html` & `iletisim_islem.php`)** — Tüm form elemanlarını içeren iletişim formu. Doğrulama **Native JS** ve **Vue.js** ile iki ayrı butonda yapılmaktadır. Veriler PHP tarafından ekrana basılmaktadır.
7. **Login (`login.php` & `login_islem.php`)** — Öğrenci numarasıyla giriş sistemi. JS doğrulama + PHP karşılaştırma.
8. **404 (`404.html`)** — Yanlış URL girildiğinde gösterilen, siteyle uyumlu animasyonlu hata sayfası.

##  Proje Dosya Yapısı
```
Web_Teknolojileri_Proje/
├── index.html          # Hakkında (Ana Sayfa)
├── cv.html             # Özgeçmiş
├── sehir.html          # Şehrim (Kocaeli)
├── miras.html          # Mirasımız (Kocaelispor)
├── ilgi.html           # İlgi Alanlarım (API)
├── iletisim.html       # İletişim Formu
├── iletisim_islem.php  # Form Veri İşleyici (PHP)
├── login.php           # Login Sayfası
├── login_islem.php     # Login Doğrulayıcı (PHP)
├── 404.html            # Hata Sayfası
├── style.css           # Tüm harici stiller
├── config.php          # PHPMailer yapılandırması
├── phpmailer/          # PHPMailer kütüphanesi
└── images/             # Sayfa görselleri
```

---

**Mustafa Abanoz**  
Sakarya Üniversitesi - Bilgisayar Mühendisliği Öğrencisi

> 🌐 **Canlı Site Linki:** (https://mustafaabanoz.gt.tc/)
