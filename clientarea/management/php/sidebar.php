<?php
if ($page_now == "management/dashboard") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="dashboard" class="list-group-item active waves-effect">
        <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
      <a href="/clientarea/management/profile" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-users mr-3"></i>Firmenprofil</a>
      <?php if ($SeeBank == "1") { ?>
        <a href="/clientarea/management/bank" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-money-bill mr-3"></i>Bank</a>
      <?php } ?>
      <?php if ($EditEmployees == "1") { ?>
        <a href="/clientarea/management/applications" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-envelope mr-3"></i>Bewerbungen</a>
        <a href="/clientarea/management/job_advertisements" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-newspaper mr-3"></i>Stellenanzeigen</a>
      <?php } ?>
      <a href="/clientarea/management/karte" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-map-marked-alt mr-3"></i>Karte</a>
      <?php if ($EditProfile == "1") { ?>
        <a href="/clientarea/management/settings" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-cog mr-3"></i>Einstellungen</a>
      <?php } ?>
    </div>

  </div>
<?php } else if ($page_now == "management/settings") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
      <a href="/clientarea/management/profile" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-users mr-3"></i>Firmenprofil</a>
      <?php if ($SeeBank == "1") { ?>
        <a href="/clientarea/management/bank" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-money-bill mr-3"></i>Bank</a>
      <?php } ?>
      <?php if ($EditEmployees == "1") { ?>
        <a href="/clientarea/management/applications" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-envelope mr-3"></i>Bewerbungen</a>
        <a href="/clientarea/management/job_advertisements" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-newspaper mr-3"></i>Stellenanzeigen</a>
      <?php } ?>
      <a href="/clientarea/management/karte" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-map-marked-alt mr-3"></i>Karte</a>
      <?php if ($EditProfile == "1") { ?>
        <a href="/clientarea/management/settings" class="list-group-item active waves-effect">
          <i class="fas fa-cog mr-3"></i>Einstellungen</a>
      <?php } ?>
    </div>

  </div>
<?php } else if ($page_now == "management/map") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
      <a href="/clientarea/management/profile" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-users mr-3"></i>Firmenprofil</a>
      <?php if ($SeeBank == "1") { ?>
        <a href="/clientarea/management/bank" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-money-bill mr-3"></i>Bank</a>
      <?php } ?>
      <?php if ($EditEmployees == "1") { ?>
        <a href="/clientarea/management/applications" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-envelope mr-3"></i>Bewerbungen</a>
        <a href="/clientarea/management/job_advertisements" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-newspaper mr-3"></i>Stellenanzeigen</a>
      <?php } ?>
      <a href="/clientarea/management/karte" class="list-group-item active waves-effect">
        <i class="fas fa-map-marked-alt mr-3"></i>Karte</a>
      <?php if ($EditProfile == "1") { ?>
        <a href="/clientarea/management/settings" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-cog mr-3"></i>Einstellungen</a>
      <?php } ?>
    </div>

  </div>
<?php } else if ($page_now == "management/profile") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
      <a href="/clientarea/management/profile" class="list-group-item active waves-effect">
        <i class="fas fa-users mr-3"></i>Firmenprofil</a>
      <?php if ($SeeBank == "1") { ?>
        <a href="/clientarea/management/bank" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-money-bill mr-3"></i>Bank</a>
      <?php } ?>
      <?php if ($EditEmployees == "1") { ?>
        <a href="/clientarea/management/applications" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-envelope mr-3"></i>Bewerbungen</a>
        <a href="/clientarea/management/job_advertisements" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-newspaper mr-3"></i>Stellenanzeigen</a>
      <?php } ?>
      <a href="/clientarea/management/karte" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-map-marked-alt mr-3"></i>Karte</a>
      <?php if ($EditProfile == "1") { ?>
        <a href="/clientarea/management/settings" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-cog mr-3"></i>Einstellungen</a>
      <?php } ?>
    </div>

  </div>
<?php } else if ($page_now == "management/bank") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
      <a href="/clientarea/management/profile" class="list-group-item waves-effect stylish-color-dark white-text">
        <i class="fas fa-users mr-3"></i>Firmenprofil</a>
      <?php if ($SeeBank == "1") { ?>
        <a href="/clientarea/management/bank" class="list-group-item active list-group-item-action waves-effect">
          <i class="fas fa-money-bill mr-3"></i>Bank</a>
      <?php } ?>
      <?php if ($EditEmployees == "1") { ?>
        <a href="/clientarea/management/applications" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-envelope mr-3"></i>Bewerbungen</a>
        <a href="/clientarea/management/job_advertisements" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-newspaper mr-3"></i>Stellenanzeigen</a>
      <?php } ?>
      <a href="/clientarea/management/karte" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-map-marked-alt mr-3"></i>Karte</a>
      <?php if ($EditProfile == "1") { ?>
        <a href="/clientarea/management/settings" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-cog mr-3"></i>Einstellungen</a>
      <?php } ?>
    </div>
  </div>
<?php } else if ($page_now == "management/applications") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
      <a href="/clientarea/management/profile" class="list-group-item waves-effect stylish-color-dark white-text">
        <i class="fas fa-users mr-3"></i>Firmenprofil</a>
      <?php if ($SeeBank == "1") { ?>
        <a href="/clientarea/management/bank" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-money-bill mr-3"></i>Bank</a>
      <?php } ?>
      <?php if ($EditEmployees == "1") { ?>
        <a href="/clientarea/management/applications" class="list-group-item active list-group-item-action waves-effect">
          <i class="fas fa-envelope mr-3"></i>Bewerbungen</a>
        <a href="/clientarea/management/job_advertisements" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-newspaper mr-3"></i>Stellenanzeigen</a>
      <?php } ?>
      <a href="/clientarea/management/karte" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-map-marked-alt mr-3"></i>Karte</a>
      <?php if ($EditProfile == "1") { ?>
        <a href="/clientarea/management/settings" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-cog mr-3"></i>Einstellungen</a>
      <?php } ?>
    </div>
  </div>
<?php } else if ($page_now == "management/job_advertisements") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
      <a href="/clientarea/management/profile" class="list-group-item waves-effect stylish-color-dark white-text">
        <i class="fas fa-users mr-3"></i>Firmenprofil</a>
      <?php if ($SeeBank == "1") { ?>
        <a href="/clientarea/management/bank" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-money-bill mr-3"></i>Bank</a>
      <?php } ?>
      <?php if ($EditEmployees == "1") { ?>
        <a href="/clientarea/management/applications" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-envelope mr-3"></i>Bewerbungen</a>
        <a href="/clientarea/management/job_advertisements" class="list-group-item active list-group-item-action waves-effect">
          <i class="fas fa-newspaper mr-3"></i>Stellenanzeigen</a>
      <?php } ?>
      <a href="/clientarea/management/karte" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-map-marked-alt mr-3"></i>Karte</a>
      <?php if ($EditProfile == "1") { ?>
        <a href="/clientarea/management/settings" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
          <i class="fas fa-cog mr-3"></i>Einstellungen</a>
      <?php } ?>
    </div>
  </div>
<?php } ?>