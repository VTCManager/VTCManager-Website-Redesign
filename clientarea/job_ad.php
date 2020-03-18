<?php
//GET request parameters
$requested_ad_id = $_GET['id'];

//connect to DB
$page_now_navbar = "clientarea/jobs";
include 'get_user_data.php';
$requested_ad_id = $conn->real_escape_string($requested_ad_id);


//hole Informationen der Stellenanzeige
$sql = "SELECT * FROM job_market WHERE AdID=$requested_ad_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $byCompanyID = $row["byCompanyID"];
        $AdID = $row["AdID"];
        $rank = $row["rank"];
        $status = $row["status"];
        if($status == "closed"){
            die("Keine Bewerbungen mehr möglich!");
        }

        //hole Firmenname der Stellenanzeige
        $sql2 = "SELECT * FROM company_information_table WHERE id=$byCompanyID";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $byCompanyname = $row["name"];
            }
        } ?>
        <!DOCTYPE html>
        <html lang="de">

        <head>
            <?php include 'head.php' ?>
            <!-- jQuery UI library -->

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
            <div class="modal fade" id="apply" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content elegant-color-dark white-text">
                        <form action="/clientarea/applications/apply" method="post" name="transactForm" id="transact_form">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Bewerbung als <?php echo $rank; ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                            </div>
                            <div class="modal-body">
                                <input type="hidden" value="<?php echo $AdID; ?>" name="ad_id" />
                                <div class="md-form">
                                    <textarea id="form7" name="text" class="md-textarea form-control white-text" rows="3" maxlength="250" required></textarea>
                                    <label for="form7">Bewerbungstext</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="submit" id="submit">Bewerben</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                                <a href="dashboard">Homepage</a>
                                <span>/</span>
                                <span>Arbeitsmarkt</span>
                            </h4>

                        </div>

                    </div>
                    <!-- Heading -->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card-->
                        <div class="card" style="width:100%;">

                            <!--Card content-->
                            <div class="card-body elegant-color white-text" style="width:100%;">
                        <?php
                        //lade Beschreibung der Stellenanzeige
                        $job_desc = file_get_contents("../../media.northwestvideo.de/media/articles/ad_description/" . $AdID . '.txt');
                        //Ausgabe der gesamten Stellenanzeige
                        echo <<<EOT
		<h2>$byCompanyname - $rank gesucht!</h2>
		<p>$job_desc</p>
		EOT;
                    }
                } ?>
                        <a class="btn btn-default pull-right" data-toggle="modal" data-target="#apply">Bewerben</a>
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