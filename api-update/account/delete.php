<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>Account löschen - VTCManager</title>
	  <?php include '../basis_header.php'; ?>
  </head>
  <body>
	  <style>

  html,
  body,
  header,
  .view {
    height: 100%;
  }
</style>
	  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<form action="https://vtc.northwestvideo.de/api/web/account/delete.php" method="post">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sicherheitsprüfung</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="username" id="username" class="form-control validate" name="username">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Benutzername</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="password" class="form-control validate" name="password">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Passwort</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-default">Account löschen</button>
      </div>
			</form>
    </div>
  </div>
</div>


<!-- Main navigation -->
<header>

  <!-- Full Page Intro -->
  <div class="view deep-purple darken-3">
    <!-- Mask & flexbox options-->
    <div class="mask">
      <!-- Content -->
      <div class="container h-100">
        <!--Grid row-->
        <div class="row align-items-center h-100">
          <!--Grid column-->
          <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
            <h1 class="white-text mb-4">Willst du wirklich schon gehen?</h1>
          	<button type="button" class="btn btn-outline-white btn-md ml-md-0"onclick="window.location.href = '<?php echo "https://vtc.northwestvideo.de/";?>';">Ich bleibe!</button>
          	<button type="button" class="btn btn-white btn-md"data-toggle="modal" data-target="#modalLoginForm">ja</button>
          </div>
          <!--Grid column-->
          <!--Grid column-->
          <div class="col-md-6 wow fadeInRight" data-wow-delay="0.2s">
            <iframe src="https://giphy.com/embed/3oEjI80DSa1grNPTDq" width="480" height="368" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/arrested-development-michael-cera-george-bluth-3oEjI80DSa1grNPTDq">via GIPHY</a></p>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->

</header>
<!-- Main navigation -->
	      <?php include '../footer.php';?>
  </body>
</html>
