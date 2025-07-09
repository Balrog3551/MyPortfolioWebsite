<nav class="navbar">
  <button class="navbar-toggler" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>

  <div class="navbar-container">
    <ul class="navbar-ip">
      <li><a href="index.php">Ana Sayfa</a></li>
      <li><a href="projects.php">Projelerim</a></li>
    </ul>
    
    <div class="navbar-right">
        <div class="controls">
          <div class="theme-switch-wrapper">
            <label class="theme-switch" for="theme-checkbox">
              <input type="checkbox" id="theme-checkbox" />
              <div class="slider round">
                <i class="fas fa-sun"></i>
                <i class="fas fa-moon"></i>
              </div>
            </label>
          </div>
          <button id="lang-toggle" title="Change Language">
              <?php echo $_SESSION['lang'] === 'tr' ? 'EN' : 'TR'; ?>
          </button>
        </div>
        
        <ul class="navbar-contact">
          <li><a href="contact.php">İletişim</a></li>
        </ul>
    </div>
  </div>
</nav>