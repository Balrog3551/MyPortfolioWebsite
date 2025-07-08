<?php
require_once 'includes/language.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'includes/config.php';
require 'vendor/autoload.php';

$mesaj_goster = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['gonder'])) {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $mesaj_goster = '<div class="error-message">' . $lang['csrf_error'] . '</div>';
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
            $mail->Subject = $lang['mail_subject'];
            $mail->Body    = "Gönderenin Adı Soyadı: " . $gelen_ad . "\n\n" .
                             "Gönderenin E-posta Adresi: " . $gelen_mail . "\n\n" .
                             "Mesaj:\n" . htmlspecialchars(trim($_POST['mesaj']));

            $mail->send();
            $mesaj_goster = '<div class="success-message">' . $lang['mail_success'] . '</div>';
        } catch (Exception $e) {
            error_log("PHPMailer Hatası: " . $mail->ErrorInfo);
            $mesaj_goster = '<div class="error-message">' . $lang['mail_error'] . '</div>';
        }
    }
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="css/style-contact.css">
<body>
    <?php include 'includes/navbar.php'; ?>

    <section class="contact">
        <div class="content"><h2><?php echo $lang['contact_me']; ?></h2><p><?php echo $lang['contact_intro']; ?></p></div>
        <div class="container">
            <div class="contactInfo">
                <?php
                require 'includes/contact_info.php';
                echo generateContactBox('fa-map-marker-alt', $lang['address_title'], $lang['address_text']);
                echo generateContactBox('fa-envelope', $lang['email_title'], '<a href="mailto:muhammetcevik5551@gmail.com">muhammetcevik5551@gmail.com</a>');
                echo generateContactBox('fa-phone', $lang['phone_title'], '<a href="tel:+905354725851">+90 535 472 58 51</a>');
                ?>
            </div>
            <div class="contactForm">
                <?php echo $mesaj_goster; ?>
                <form action="contact.php" method="POST">
                    <h2><?php echo $lang['send_mail']; ?></h2>
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                    <div class="inputBox"><input type="text" name="isimSoyad" required="required"><span><?php echo $lang['full_name']; ?></span></div>
                    <div class="inputBox"><input type="email" name="emailAdresi" required="required"><span><?php echo $lang['email_address']; ?></span></div>
                    <div class="inputBox"><textarea name="mesaj" required="required"></textarea><span><?php echo $lang['your_message']; ?></span></div>
                    <div class="inputBox"><input type="submit" name="gonder" value="<?php echo $lang['send']; ?>"></div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>