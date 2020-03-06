<?php //begin of navbar?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark stylish-color-dark scrolling-navbar">
      <div class="container-fluid">
<?php
if($page_now_navbar == "management/dashboard/index"){?>

        <!-- Brand -->
        <a class="navbar-brand waves-effect" target="_blank">
          <strong class="blue-text">VTCMI</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link waves-effect" href="#">Übersicht
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="staff_list">Mitglieder</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/">Einstellungen</a>
            </li>
          </ul>
    <?php }else if($page_now_navbar == "management/dashboard/logbook"){?>

        <!-- Brand -->
        <a class="navbar-brand waves-effect" target="_blank">
          <strong class="blue-text">VTCMI</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="/clientarea/management/dashboard">Übersicht
                
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link waves-effect" target="_blank">Fahrtenbuch<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="/clientarea/management/dashboard/employees">Mitarbeiter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Einstellungen</a>
            </li>
          </ul>
          <?php }else if($page_now_navbar == "management/dashboard/employees"){?>

        <!-- Brand -->
        <a class="navbar-brand waves-effect" target="_blank">
          <strong class="blue-text">VTCMI</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="/clientarea/management/dashboard">Übersicht
                
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="/clientarea/management/dashboard/logbook">Fahrtenbuch</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link waves-effect">Mitarbeiter<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Einstellungen</a>
            </li>
          </ul>
	<?php } //here comes the icons always output them ?>
	<!-- Right -->
	<ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="https://www.instagram.com/tnwm_group/" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://twitter.com/TNWM_group" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="/account/logout" class="nav-link border border-light rounded waves-effect">
                <i class="fas fa-sign-out-alt mr-2"></i>Abmelden
              </a>
            </li>
          </ul>
          </div>

      </div>
    </nav>
