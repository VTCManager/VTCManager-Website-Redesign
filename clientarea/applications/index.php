<?php
$page_now_navbar = "clientarea/jobs";
include '../get_user_data.php';
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$results_per_page = 20;
$start_from = ($page - 1) * $results_per_page;

?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php include '../head.php' ?>

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

        <!-- Navbar -->
        <?php
        include '../php/navbar.php'; ?>
        <!-- Navbar -->

        <!-- Sidebar -->

        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5" style="padding-left: 10px;padding-right: 10px;">
        <div class=" container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body elegant-color white-text d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="/clientarea/">Dashboard</a>
                        <span>/</span>
                        <span>Meine Bewerbungen</span>
                    </h4>


                </div>

            </div>
            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card-->
                <div class="card" style="width:100%;">

                    <!--Card content-->
                    <div class="card-body elegant-color white-text" style="width:100%;">
                        <h1>Bewerbungen von <?php echo $username_cookie; ?></h1>
                        <div class="vertical-scroll">
                            <table class="table white-text">
                                <thead>
                                    <tr>
                                        <td>Bewerber</td>
                                        <td>Firma</td>
                                        <td>Rolle</td>
                                        <td>Status</td>
                                        <td>Datum</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include 'load_applications.php'; ?>
                                </tbody>
                            </table>
                            <?php
                            $sql = "SELECT COUNT(applicationID) AS total FROM application WHERE byUserID=$userID";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results

                            for ($i = 1; $i <= $total_pages; $i++) {  // print links for all pages
                                echo "<a href='index.php?page=" . $i . "'";
                                if ($i == $page)  echo " class='curPage'";
                                echo ">" . $i . "</a> ";
                            };
                            ?>
                        </div>
                        <!--/.Card-->
                    </div>
                </div>
            </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <?php
    include '../php/footer.php'; //Footer laden
    ?>
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