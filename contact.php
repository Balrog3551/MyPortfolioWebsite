<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'config.php';
require 'vendor/autoload.php';

$mesaj_goster = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['gonder'])) {

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = GMAIL_USER;
        $mail->Password   = GMAIL_PASSWORD; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->CharSet    = 'UTF-8';

        $gelen_mail = htmlspecialchars(trim($_POST['emailAdresi']));
        $gelen_ad = htmlspecialchars(trim($_POST['isimSoyad']));

        $mail->setFrom(GMAIL_USER, 'Portfolyo Siten');
        $mail->addAddress(GMAIL_USER, 'USER_NAME');
        $mail->addReplyTo($gelen_mail, $gelen_ad);

        $mail->isHTML(false);
        $mail->Subject = 'Portfolyo Sitenizden Yeni Mesaj Var!';
        $mail->Body    = "Gönderenin Adı Soyadı: " . $gelen_ad . "\n\n" .
                         "Gönderenin E-posta Adresi: " . $gelen_mail . "\n\n" .
                         "Mesaj:\n" . htmlspecialchars(trim($_POST['mesaj']));

        $mail->send();
        $mesaj_goster = '<div class="success-message">Mesajınız başarıyla gönderildi. Teşekkürler!</div>';
    } catch (Exception $e) {
        error_log("PHPMailer Hatası: " . $mail->ErrorInfo);
        $mesaj_goster = '<div class="error-message">Mesaj gönderilemedi. Lütfen daha sonra tekrar deneyin.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="css/style-contact.css">
<body>
    <?php include 'includes/navbar.php'; ?>

    <section class="contact">
        <div class="content"><h2>Bana Ulaş</h2><p>Aşağıdaki formu doldurarak veya iletişim bilgileri aracılığıyla bana ulaşabilirsiniz.</p></div>
        <div class="container">
            <div class="contactInfo">
                <div class="box-contact">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="text"><h3>Adres</h3><p>Niğde, Türkiye</p></div>
                </div>
                <div class="box-contact">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <div class="text"><h3>E-posta</h3><p>muhammetcevik5551@gmail.com</p></div>
                </div>
                <div class="box-contact">
                    <div class="icon"><i class="fas fa-phone"></i></div>
                    <div class="text"><h3>Telefon</h3><p>+90 535 472 58 51</p></div>
                </div>
            </div>
            <div class="contactForm">
                <?php echo $mesaj_goster; ?>
                <form action="contact.php" method="POST">
                    <!-- Güvenlik için gelecekte buraya bir CSRF token eklenmesi önerilir. -->
                    <h2>Mail Gönder</h2>
                    <div class="inputBox"><input type="text" name="isimSoyad" required="required"><span>İsim Soyad</span></div>
                    <div class="inputBox"><input type="email" name="emailAdresi" required="required"><span>Mail Adresi</span></div>
                    <div class="inputBox"><textarea name="mesaj" required="required"></textarea><span>Mail metninizi girin</span></div>
                    <div class="inputBox"><input type="submit" name="gonder" value="Gönder"></div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>