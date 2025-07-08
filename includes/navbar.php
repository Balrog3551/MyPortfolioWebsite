<nav class="navbar">
  <ul class="navbar-ip">
    <li><a href="index.php">Ana Sayfa</a></li>
    <li><a href="projects.php">Projelerim</a></li>
  </ul>
  
  <div class="controls">
  <button id="theme-toggle">🌙</button>
  <button id="lang-toggle" title="Change Language">
      <?php echo $_SESSION['lang'] === 'tr' ? 'EN' : 'TR'; ?>
  </button>
  </div>
  
  <ul class="navbar-contact">
    <li><a href="contact.php">İletişim</a></li>
  </ul>
</nav>