<?php
if ($page_now == "management/dashboard") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="dashboard" class="list-group-item active waves-effect">
        <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
      <a href="/staffarea/search" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-money-bill-alt"></i> Suche...</a>
      <a href="/staffarea/support" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-building"></i> Support</a>
    </div>

  </div>
<?php } else if ($page_now == "management/settings") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie"></i> Dashboard</a>
      <a href="/staffarea/search" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-money-bill-alt"></i> Suche...</a>
      <a href="/staffarea/support" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-building"></i> Support</a>
    </div>

  </div>
<?php } else if ($page_now == "management/events") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie"></i> Dashboard</a>
      <a href="/staffarea/search" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-money-bill-alt"></i> Suche...</a>
      <a href="/staffarea/support" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-building"></i> Support</a>
    </div>

  </div>
<?php } else if ($page_now == "management/map") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie"></i> Dashboard</a>
      <a href="/staffarea/search" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-money-bill-alt"></i> Suche...</a>
      <a href="/staffarea/support" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-building"></i> Support</a>
    </div>

  </div>
<?php } else if ($page_now == "staffarea/search") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie"></i> Dashboard</a>
      <a class="list-group-item active waves-effect">
        <i class="fas fa-money-bill-alt mr-3"></i> Suche...</a>
      <a href="/staffarea/support" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-building"></i> Support</a>
    </div>

  </div>
<?php } else if ($page_now == "staffarea/support") { ?>
  <div class="sidebar-fixed stylish-color-dark position-fixed" id="slide-out">

    <a class="logo-wrapper waves-effect">
      <img src="/clientarea/management/img/logo.png" class="img-fluid" alt="" height=100>
    </a>

    <div class="list-group list-group-flush">
      <a href="/clientarea/management/dashboard" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-chart-pie"></i> Dashboard</a>
      <a href="/staffarea/search" class="list-group-item list-group-item-action waves-effect stylish-color-dark white-text">
        <i class="fas fa-money-bill-alt"></i> Suche...</a>
      <a href="/staffarea/support" class="list-group-item active waves-effect">
        <i class="fas fa-building mr-3"></i>Support</a>
    </div>

  </div>
<?php } ?>