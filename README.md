# Web Teknolojileri Proje Ödevi

Bu proje, Sakarya Üniversitesi Bilgisayar Mühendisliği 2. sınıf **Web Teknolojileri** dersi final proje ödevi olarak hazırlanmıştır.

##  Proje Hakkında
Dönem içinde derste gördüğümüz HTML, CSS, JavaScript ve PHP gibi konuları kullanarak kendi kişisel web sitemi tasarladım. Hocanın yönergede belirttiği kurallara uymak için hiç hazır tema kullanmadım, tasarımları kendi yazdığım CSS dosyası ile yaptım. Sadece sayfa iskeletini (grid) düzgün oturtmak için Bootstrap kullandım.

## Kullanılan Teknolojiler
* **Tasarım & Arayüz:** HTML5 (Semantik etiketler ile), CSS3, JavaScript
* **CSS Framework:** Bootstrap 5 (Sadece ızgara sistemi için kullanıldı)
* **JS Kütüphanesi:** Vue.js (Hocanın iletişim formunda istediği 2. framework doğrulaması ve API verileri için)
* **Sunucu Tarafı (Backend):** PHP (İletişim formu verilerini alma ve login ekranı)
* **Mail Gönderme:** PHPMailer
* **API'ler:** OMDb (Film), Steam (Oyun), TheSportsDB (Futbol)

##  Sayfalar
1. **Hakkında (`index.html`):** Kendimi tanıttığım ve hobilerimden bahsettiğim anasayfa.
2. **Özgeçmiş (`cv.html`):** Hocanın istediği `<header>`, `<section>`, `<article>` gibi semantik HTML etiketlerini kullanarak hazırladığım CV sayfam.
3. **Şehrim (`sehir.html`):** Yaşadığım şehir olan Kocaeli'yi tanıttığım sayfa. İçinde kendim JS ile yazdığım en az 4 resimli slider'lar bulunuyor.
4. **Mirasımız (`miras.html`):** Şehrin takımı Kocaelispor'u anlattığım sayfa. Ayrıca API üzerinden canlı Süper Lig tablosu çektim.
5. **İlgi Alanlarım (`ilgi.html`):** Dizi ve oyun verilerini dışarıdan ücretsiz API'lerle çektiğim sayfa (Hava durumu veya döviz API'si kullanılmamıştır).
6. **İletişim (`iletisim.html` & `iletisim_islem.php`):** İletişim formu sayfası. Formdaki kontrolleri hem normal Native JavaScript ile hem de Vue.js ile iki ayrı butonda yaptım. Veriler PHP ile sayfaya basılıyor ve mailime geliyor.
7. **Login (`login.php` & `login_islem.php`):** Sisteme öğrenci numarası ile giriş yapmayı sağlayan test sayfası. Boş alan kontrolleri JS ile yapıldıktan sonra PHP'ye gönderiliyor.


**Mustafa Abanoz**  
Sakarya Üniversitesi - Bilgisayar Mühendisliği Öğrencisi
