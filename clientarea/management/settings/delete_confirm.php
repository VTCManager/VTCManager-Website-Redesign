<?php
include '../get_user_data.php';
$page_now = "management/settings";
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php include '../../head.php'; ?>
    <style>
        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
</head>

<body class="elegant-color-dark">

    <!--Main Navigation-->
    <header>

        <!-- Sidebar -->
        <?php
        include '../php/sidebar.php'; ?>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mx-lg-5">
        <div class="container-fluid">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex elegant-color white-text justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="/clientarea/management/">Spedition</a>
                        <span>/</span>
                        <span>Einstellungen</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->
            <!--Card-->
            <div class="card">

                <!--Card content-->
                <div class="card-body elegant-color white-text">
                    <?php if ($user_rank == "owner") { ?>
                        <img class="rounded float-left" src="<?php echo $user_company_avatar; ?>" style="height: 80px;width: 80px;height: auto;">
                        <h2 style="margin-left: 90px;"><?php echo $user_company_name; ?> </h2>
                        <br>
                        <h3>Möchtest du die Firma "<?php echo $user_company_name;?>" wirklich auflösen?</h3>
                        <a href="delete" type="button" class="btn btn-danger">Firma auflösen</a>
                </div>
            <?php } else {
                        echo "Keine Berechtigung";
                    } ?>
            </div>
            <!--/.Card-->

        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <?php
    include '../php/footer.php'; ?>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="/clientarea/management/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/clientarea/management/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/clientarea/management/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/clientarea/management/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
</body>

</html>