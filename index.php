<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
  <?php include 'includes/head.php'; ?>
<body>
  <?php include 'includes/navbar.php'; ?>
  <div class="box">
    <img src="/assets/img/foto.jpg" alt="Muhammet ÇEVİK profil fotoğrafı">
    <h1>Muhammet ÇEVİK</h1>
    <h5 data-lang-key="developer"><?php echo $lang['developer']; ?></h5>
    <p data-lang-key="bio"><?php echo $lang['bio']; ?></p>
      <ul>
        <li><a href="https://www.instagram.com/_muhammetcvk" aria-label="İnstagram profilime gidin"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://www.linkedin.com/in/muhammet-çevik-53263a252/" aria-label="Linkedin profilime gidin"><i class="fab fa-linkedin"></i></a></li>
        <li><a href="https://github.com/Balrog3551" aria-label="GitHub profilime gidin"><i class="fab fa-github"></i></a></li>
      </ul>
  </div>
</body>
</html>