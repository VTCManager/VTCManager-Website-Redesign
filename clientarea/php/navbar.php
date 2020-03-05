<?php //begin of navbar?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark stylish-color-dark scrolling-navbar" style="padding-left: 10px;padding-right: 10px;">
      <div class="container-fluid">
<?php
if($page_now_navbar == "management/dashboard/index"){?>

        <!-- Brand -->
        <a class="navbar-brand waves-effect">
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
              <a class="nav-link waves-effect" href="#"><i class="fas fa-chart-pie"></i>Übersicht
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="logbook"><i class="fas fa-truck-loading"></i>Fahrtenbuch</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="/clientarea/management"><i class="fas fa-building"></i>Meine Firma</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href=""><i class="fas fa-money-bill"></i>Bank</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href=""><i class="fas fa-calendar-alt"></i>Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href=""><i class="fas fa-newspaper"></i>News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/"><i class="fas fa-cogs"></i>Einstellungen</a>
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
              <a class="nav-link waves-effect" href="/clientarea/dashboard">Übersicht
                
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link waves-effect" target="_blank">Fahrtenbuch<span class="sr-only">(current)</span></a>
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
