<?php $current_page = "support";
date_default_timezone_set("Europe/Berlin");
include '../home/connect_mysql.php';
if (isset($_POST['ticketID']) && isset($_POST['ticketCode'])) {
    $ticketID = $_POST['ticketID'];
    $ticketCode = $_POST['ticketCode'];

    $ticketID = filter_var($ticketID, FILTER_SANITIZE_NUMBER_INT);
    $ticketCode = filter_var($ticketCode, FILTER_SANITIZE_NUMBER_INT);
    $ticketID = $conn->real_escape_string($ticketID);
    $ticketCode = $conn->real_escape_string($ticketCode);

    $sql = "SELECT * FROM support_tickets WHERE id=$ticketID AND ticket_code=$ticketCode";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $ticket_customer = $row["customer"];
            $ticket_email = $row["customer_email"];
            $ticket_subject = $row["ticket_subject"];
            $ticket_status = $row["status"];
            $ticket_created_date = $row["created_date"];
            $ticket_found = true;
        }
        if (isset($_POST['close'])) {
            $sql = "UPDATE support_tickets SET status='closed' WHERE id=$ticketID AND ticket_code=$ticketCode";

            if ($conn->query($sql) === TRUE) {
                $message = '<div class="alert alert-success" role="alert">Dein Ticket(ID:' . $ticketID . ') wurde erfolgreich geschlossen!</div>';
            } else {
                $message = '<div class="alert alert-danger" role="alert">DB-Fehler:' . $conn->error . '</div>';
            }
            $sql = "SELECT * FROM support_tickets WHERE id=$ticketID AND ticket_code=$ticketCode";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $ticket_customer = $row["customer"];
                    $ticket_email = $row["customer_email"];
                    $ticket_subject = $row["ticket_subject"];
                    $ticket_status = $row["status"];
                    $ticket_created_date = $row["created_date"];
                    $ticket_found = true;
                }
            }
        }
        if (isset($_POST['message'])) {
            $customer_message = $_POST['message'];
            $customer_message = filter_var($customer_message, FILTER_SANITIZE_STRING);
            $myfile = fopen("../../media.northwestvideo.de/media/articles/tickets/$ticketID.txt", "r") or  $message = '<div class="alert alert-danger" role="alert">Fehler beim Speichern der Antwort(Fehlercode:001)</div>';;
            $ticket_content_raw = fread($myfile, filesize("../../media.northwestvideo.de/media/articles/tickets/$ticketID.txt"));
            fclose($myfile);

            // Convert JSON string to Array
            $ticket_content_array = (array) json_decode($ticket_content_raw, true);

            $someArray = array(
                "name" => $ticket_customer,
                "message" => $customer_message,
                "time" => time()
            );
            array_push($ticket_content_array, $someArray);
            $myfile = fopen("../../media.northwestvideo.de/media/articles/tickets/$ticketID.txt", "w") or $message = '<div class="alert alert-danger" role="alert">Fehler beim Speichern der Antwort(Fehlercode:002)</div>';
            fwrite($myfile, json_encode($ticket_content_array));
            fclose($myfile);
        }
        if (!isset($ticket_content_array)) {
            $ticket_file = fopen("../../media.northwestvideo.de/media/articles/tickets/$ticketID.txt", "r") or  $message = '<div class="alert alert-danger" role="alert">Fehler beim Lesen der Nachrichten(Fehlercode:003)</div>';
            $ticket_content_raw = fread($ticket_file, filesize("../../media.northwestvideo.de/media/articles/tickets/$ticketID.txt"));
            fclose($ticket_file);

            // Convert JSON string to Array
            $ticket_content_array = (array) json_decode($ticket_content_raw, true);
        }
    } else {
        $message = '<div class="alert alert-danger" role="alert">Das Ticket konnte nicht gefunden werden oder das Passwort ist falsch</div>';
    }
} ?>
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
                    <div class="float-left">
                        <a class="h4" href="/support"><i class="fas fa-undo-alt"></i> Zurück</a>
                    </div>
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
                    <div class="card-body elegant-color white-text" style="width:100%; min-height:50vh;vertical-align: middle;">
                        <!--Section: Contact v.2-->
                        <section class="mb-4">
                            <?php echo $message;
                            if (!$ticket_found) {
                            ?>
                                <!--Section heading-->
                                <h2 class="h1-responsive font-weight-bold text-center my-4">Existierendes Ticket ansehen</h2>
                                <!--Section description-->
                                <p class="text-center w-responsive mx-auto mb-5">Wenn du bereits ein Ticket erstellt hast, dann kannst du es dir hier anzeigen lassen oder darauf antworten.</p>
                                <form id="contact-form" name="contact-form" action="" method="POST">

                                    <!--Grid row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <input type="text" id="ticketID" name="ticketID" class="form-control white-text" required>
                                                <label for="ticketID" class="">Ticket ID</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Grid row-->

                                    <!--Grid row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <input type="text" id="ticketCode" name="ticketCode" class="form-control white-text" required>
                                                <label for="ticketCode" class="">Zugangscode</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Grid row-->
                                    <div class="text-center text-md-left">
                                        <input type="submit" class="btn btn-primary" value="Ansehen">
                                    </div>
                                </form>
                            <?php } else { ?>
                                <h1>Titel: <?php echo $ticket_subject; ?></h1>
                                <p>erstellt am <?php echo date("d.m.Y H:i", strtotime($ticket_created_date)); ?></p>
                                <p>Kunde: <?php echo $ticket_customer; ?></p>
                                <?php if ($ticket_status == "open") { ?>
                                    <p>Status: offen <i class="fas fa-user-clock" style="color:green;"></i></p><br>
                                <?php } else if ($ticket_status == "closed") { ?>
                                    <p>Status: geschlossen <i class="fas fa-times-circle" style="color:red;"></i></p><br>
                                <?php } ?>
                                <hr>
                                <?php


                                // Loop through Array
                                foreach ($ticket_content_array as $value) {

                                    $response_time = date("d.m.Y H:i", $value["time"]);
                                ?>
                                    <h2><?php echo $value["name"]; ?> <?php if (!empty($value["role"])) {
                                                                            echo "| " . $value["role"];
                                                                        } ?></h2>
                                    <p>am <?php echo $response_time; ?></p><br>
                                    <p><?php echo $value["message"]; ?></p>
                                    <hr>
                                <?php
                                }
                                ?>
                                <?php if ($ticket_status != "closed") { ?>
                                    <form id="contact-form" name="contact-form" action="" method="POST">

                                        <!--Grid row-->
                                        <div class="row">

                                            <!--Grid column-->
                                            <div class="col-md-12">

                                                <div class="md-form">
                                                    <textarea type="text" id="message" name="message" rows="2" class="form-control white-text md-textarea" required></textarea>
                                                    <label for="message">Deine Antwort</label>
                                                </div>
                                                <input type="hidden" value="<?php echo $ticketID; ?>" name="ticketID" />
                                                <input type="hidden" value="<?php echo $ticketCode; ?>" name="ticketCode" />

                                            </div>
                                        </div>
                                        <!--Grid row-->
                                        <div class="text-center text-md-left">
                                            <input type="submit" class="btn btn-primary" value="Senden">
                                        </div>
                                    </form>
                                    <form id="contact-form" name="contact-form" action="" method="POST">
                                        <input type="hidden" value="<?php echo $ticketID; ?>" name="ticketID" />
                                        <input type="hidden" value="<?php echo $ticketCode; ?>" name="ticketCode" />
                                        <input type="hidden" name="close" />
                                        <input type="submit" class="btn btn-danger" value="Ticket schließen">
                                    </form>
                                <?php } ?>
                            <?php } ?>
                        </section>
                        <!--Section: Contact v.2-->
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