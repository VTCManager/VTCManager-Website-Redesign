<?php
$page_now_navbar = "clientarea/jobs";
include 'get_user_data.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php include 'head.php' ?>
    <!-- jQuery UI library -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

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
        include 'php/navbar.php'; ?>
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
                        <span>Arbeitsmarkt</span>
                    </h4>
                    <div class="float-right">
                        <a type="button" class="btn btn-primary" href="/clientarea/applications">Meine Bewerbungen</a>
                    </div>

                </div>

            </div>
            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card-->
                <div class="card" style="width:100%;">

                    <!--Card content-->
                    <div class="card-body elegant-color white-text" style="width:100%;">
                        <form action="/company/" method="post" name="createnewrankForm" id="createnewrankForm">
                            <input class="form-control" type="text" name="companyname" id="skill_input" placeholder="Suche..." aria-label="Search">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Öffnen</button>
                        </form>
                        <?php
                        $sql = "SELECT * FROM job_market WHERE status='open' ORDER BY RAND() LIMIT 20";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $byCompanyID = $row["byCompanyID"];
                                $AdID = $row["AdID"];
                                $rank = $row["rank"];
                                $sql2 = "SELECT * FROM company_information_table WHERE id=$byCompanyID";
                                $result2 = $conn->query($sql2);
                                if ($result2->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result2->fetch_assoc()) {
                                        $byCompanyname = $row["name"];
                                    }
                                }
                                $job_desc = file_get_contents("../../media.northwestvideo.de/media/articles/ad_description/" . $AdID . '.txt');

                                echo <<<EOT
				<h2>$byCompanyname - $rank gesucht!</h2>
				<span class="text" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;"><a href="job_ad?id=$AdID">$job_desc</a></span><hr>
				EOT;
                            }
                        } else {
                        } ?>

                        <br>
                        <p>Seite neu laden um weitere Ergebnisse zu sehen.</p>
                        <br>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#skill_input").autocomplete({
                source: "search_company_get.php",
                select: function(event, ui) {
                    event.preventDefault();
                    $("#skill_input").val(ui.item.id);
                }
            });
        });
    </script>

</body>

</html>