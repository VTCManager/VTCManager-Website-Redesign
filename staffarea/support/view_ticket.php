<?php
//aktuelle Seite für Nav und Sidebar
$page_now = "staffarea/support";
$page_now_navbar = "management/dashboard/employees";
//Connect and Check
include '../get_user_data.php';
date_default_timezone_set("Europe/Berlin");
if (isset($_GET['ticketID'])) {
    $ticketID = $_GET['ticketID'];

    $ticketID = filter_var($ticketID, FILTER_SANITIZE_NUMBER_INT);
    $ticketID = $conn->real_escape_string($ticketID);

    $sql = "SELECT * FROM support_tickets WHERE id=$ticketID";
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
            $sql = "UPDATE support_tickets SET status='closed' WHERE id=$ticketID";

            if ($conn->query($sql) === TRUE) {
                $message = '<div class="alert alert-success" role="alert">Das Ticket(ID:' . $ticketID . ') wurde erfolgreich geschlossen!</div>';
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
            $myfile = fopen("../../../media.northwestvideo.de/media/articles/tickets/$ticketID.txt", "r") or  $message = '<div class="alert alert-danger" role="alert">Fehler beim Speichern der Antwort(Fehlercode:001)</div>';
            $ticket_content_raw = fread($myfile, filesize("../../../media.northwestvideo.de/media/articles/tickets/$ticketID.txt"));
            fclose($myfile);

            // Convert JSON string to Array
            $ticket_content_array = (array) json_decode($ticket_content_raw, true);

            $someArray = array(
                "name" => $username_cookie,
                "role" => $user_staff_role,
                "message" => $customer_message,
                "time" => time()
            );
            array_push($ticket_content_array, $someArray);
            $myfile = fopen("../../../media.northwestvideo.de/media/articles/tickets/$ticketID.txt", "w") or $message = '<div class="alert alert-danger" role="alert">Fehler beim Speichern der Antwort(Fehlercode:002)</div>';
            fwrite($myfile, json_encode($ticket_content_array));
            fclose($myfile);
            $subject = 'Neues Antwort auf dein Ticket | VTCManager'; // Give the email a subject 
            $email_message = '
        Hallo,
        unser Support-Team hat gerade auf dein Ticket geantwortet.
        ------------------------
        TicketID: ' . $ticketID . '
        ------------------------
        Zum VTCManager Support Center:
        https://vtc.northwestvideo.de/support
        '; // Our message above including the link

            $headers = 'From: VTCManager <service@northwestvideo.de>';
            mail($ticket_email, $subject, $email_message, $headers); // Send our emai
        }
        if (!isset($ticket_content_array)) {
            $ticket_file = fopen("../../../media.northwestvideo.de/media/articles/tickets/$ticketID.txt", "r") or  $message = '<div class="alert alert-danger" role="alert">Fehler beim Lesen der Nachrichten(Fehlercode:003)</div>';
            $ticket_content_raw = fread($ticket_file, filesize("../../../media.northwestvideo.de/media/articles/tickets/$ticketID.txt"));
            fclose($ticket_file);

            // Convert JSON string to Array
            $ticket_content_array = (array) json_decode($ticket_content_raw, true);
        }
    } else {
        $message = '<div class="alert alert-danger" role="alert">Das Ticket konnte nicht gefunden werden oder das Passwort ist falsch</div>';
    }
} ?>
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