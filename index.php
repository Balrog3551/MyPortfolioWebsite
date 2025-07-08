<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
  <?php include 'includes/head.php'; ?>
<body>
  <?php include 'includes/navbar.php'; ?>
  <div class="box">
    <img src="/assets/img/foto.jpg" alt="Muhammet ÇEVİK profil fotoğrafı">
    <h1>Muhammet ÇEVİK</h1>
    <h5><?php echo $lang['developer']; ?></h5>
    <p><?php echo $lang['bio']; ?></p>
      <ul>
        <li><a href="https://www.instagram.com/_muhammetcvk"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://www.linkedin.com/in/muhammet-çevik-53263a252/"><i class="fab fa-linkedin"></i></a></li>
        <li><a href="https://github.com/Balrog3551"><i class="fab fa-github"></i></a></li>
      </ul>
  </div>
</body>
</html>