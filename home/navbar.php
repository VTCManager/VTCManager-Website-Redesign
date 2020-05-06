<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand">
      <img src="/media/images/favicon.png" height="30">
    </a>

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <?php if ($current_page == "home") { ?>
          <li class="nav-item active">
            <a class="nav-link">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="/">Home
            </a>
          </li>
        <?php }
        if ($current_page == "team") { ?>
          <li class="nav-item active">
            <a class="nav-link">Team</a>
            <span class="sr-only">(current)</span>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="/team">Team</a>
          </li>
        <?php }
        if ($current_page == "support") { ?>
          <li class="nav-item active">
            <a class="nav-link">Support</a>
            <span class="sr-only">(current)</span>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="/support">Support</a>
          </li>
        <?php } ?>
      </ul>

      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
          <a href="https://www.instagram.com/tnwm_group/" class="nav-link" target="_blank">
            <i class="fab fa-instagram"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://twitter.com/TNWM_group" class="nav-link" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="/account/login" class="nav-link border border-light rounded">
            <?php if (!isset($_COOKIE['authWebToken']) && !isset($_COOKIE['username'])) { ?>
              <i class="fas fa-sign-in-alt mr-2"></i>Anmelden
            <?php } else { ?>
              <i class="fas fa-sign-in-alt mr-2"></i>Öffnen
            <?php } ?>
          </a>
        </li>
      </ul>

    </div>

  </div>
</nav>