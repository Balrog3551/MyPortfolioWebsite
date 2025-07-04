<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'includes/config.php';
require 'vendor/autoload.php';

$mesaj_goster = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['gonder'])) {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $mesaj_goster = '<div class="error-message">Geçersiz istek. Lütfen formu yeniden gönderin.</div>';
    } else {
        unset($_SESSION['csrf_token']);

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
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
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
                <?php
                require 'includes/contact_info.php';
                foreach ($contactDetails as $detail) {
                    echo generateContactBox($detail['icon'], $detail['title'], $detail['text']);
                }
                ?>
            </div>
            <div class="contactForm">
                <?php echo $mesaj_goster; ?>
                <form action="contact.php" method="POST">
                    <h2>Mail Gönder</h2>
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
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