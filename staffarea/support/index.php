<?php
//aktuelle Seite für Nav und Sidebar
$page_now = "staffarea/support";
$page_now_navbar = "management/dashboard/employees";
//Connect and Check
include '../get_user_data.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="/clientarea/management/img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/clientarea/management/img/apple-icon.png">
    <title>VTCMInterface</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="/clientarea/management/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/clientarea/management/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/clientarea/management/css/style.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <style>
        .tour_url:hover {
            color: #007bff;
        }
    </style>
    <style>
        .profilePicture {
            height: auto;
            border-radius: 50%;
            height: 30px;
            width: 30px;
            object-fit: contain;
        }
    </style>

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
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!--Card-->
            <div class="card mb-4">

                <!--Card content-->
                <div class="card-body elegant-color white-text">

                    <div class="card-header unique-color white-text text-center">
                        Support Ticket Übersicht
                    </div>
                    <!-- List group links -->
                    <div class="list-group list-group-flush">
                        <div class="vertical-scroll">
                            <table class="table elegant-color white-text">
                                <thead>
                                    <tr>
                                        <td>Titel</td>
                                        <td>Kunde</td>
                                        <td>erstellt am</td>
                                        <td>Status</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody class="white-text">
                                    <?php include 'load_data.php'; //Lade Aufträge
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- List group links -->

                </div>

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