<?php $current_page = "support";?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php include '../home/head.php'; ?>
    <title>Support - VTCManager</title>
</head>

<body class="elegant-color-dark">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <?php include '../home/navbar.php'; ?>
        <!-- Navbar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body elegant-color white-text text-center">
                    <a class="h4">
                        VTCManager Support Center
                    </a>

                </div>

            </div>
            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card-->
                <div class="card" style="width:100%;">

                    <!--Card content-->
                    <div class="card-body elegant-color white-text text-center" style="width:100%; min-height:50vh;vertical-align: middle;">
                        <div class="row col-md-auto mx-auto mb-xl-6">
                            <div class="col-md-5 mx-auto mt-lg-5">
                                <div class="card danger-color-dark" style="height:30vh;">
                                    <div style="position:absolute;top:40%;left:37%;">
                                        <a class="h2" href="create-ticket" style="color:white;"><i class="fas fa-ticket-alt"></i><br>Ticket erstellen</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5 mx-auto mt-lg-5">
                                <div class="card info-color-dark" style="height:30vh;">
                                    <div style="position:absolute;top:40%;left:37%;">
                                        <a class="h2" href="view-ticket" style="color:white;"><i class="fas fa-clipboard-list"></i><br>Ticket ansehen</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.Card-->
            </div>
        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <?php
    include '../home/footer.php'; //Footer laden
    ?>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="/home/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/home/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/home/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/home/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>

</body>

</html>