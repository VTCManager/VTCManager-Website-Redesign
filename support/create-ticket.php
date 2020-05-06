<?php $current_page = "support";
include '../home/connect_mysql.php';
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['subject'])) {
    $sql = "SELECT id FROM support_tickets ORDER by id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $ticket_id = (int) $row["id"];
            $ticket_id++;
        }
    } else {
        $ticket_id = 1;
    }
    $digits = 4;
    $ticket_code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
    $message = '<div class="alert alert-success" role="alert">Dein Ticket(ID:' . $ticket_id . ', Code:' . $ticket_code . ') wurde erfolgreich erstellt!</div>';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $customer_message = $_POST['message'];
    $subject = $_POST['subject'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $customer_message = filter_var($customer_message, FILTER_SANITIZE_STRING);
        $subject = filter_var($subject, FILTER_SANITIZE_STRING);
        $name = $conn->real_escape_string($name);
        $customer_message = $conn->real_escape_string($customer_message);
        $subject = $conn->real_escape_string($subject);
        date_default_timezone_set("Europe/Berlin");

        $message_arr = array(

            // Every array will be converted 
            // to an object 
            array(
                "name" => $name,
                "message" => $customer_message,
                "time" => time()
            )
        );

        $myfile = fopen("../../media.northwestvideo.de/media/articles/tickets/$ticket_id.txt", "w") or die("Unable to open file!");
        fwrite($myfile, json_encode($message_arr));
        fclose($myfile);

        $sql = "INSERT INTO support_tickets (id, customer, customer_email, ticket_subject, ticket_code)
VALUES ($ticket_id, '$name', '$email', '$subject',$ticket_code)";

        if ($conn->query($sql) === TRUE) {
        } else {
            $message = '<div class="alert alert-danger" role="alert">Es ist ein Fehler bei der DB-Abfrage aufgetreten: ' . $conn->error . '</div>';
        }
        $subject = 'Neues Support Ticket erstellt | VTCManager'; // Give the email a subject 
        $email_message = '
        Hallo,
        dein Support-Ticket wurde erfolgreich erstellt. Du erhälst eine E-Mail, wenn wir auf dein Ticket antworten.
        ------------------------
        TicketID: ' . $ticket_id . '
        Zugangscode: ' . $ticket_code . '
        ------------------------
        Zum VTCManager Support Center:
        https://vtc.northwestvideo.de/support
        '; // Our message above including the link

        $headers = 'From: VTCManager <service@northwestvideo.de>';
        mail($email, $subject, $email_message, $headers); // Send our emai
    } else {
        $message = '<div class="alert alert-danger" role="alert">Die angegebene E-Mail Adresse ist ungültig!</div>';
    }


    /*$content = "From: $name \n Email: $email \n Message: $message";
    $recipient = "youremail@here.com";
    $mailheader = "From: $email \r\n";
    mail($recipient, $subject, $content, $mailheader) or die("Error!");*/
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
                    <div class="card-body elegant-color white-text text-center" style="width:100%; min-height:50vh;vertical-align: middle;">
                        <!--Section: Contact v.2-->
                        <section class="mb-4">
                            <?php echo $message; ?>
                            <!--Section heading-->
                            <h2 class="h1-responsive font-weight-bold text-center my-4">Neues Ticket erstellen</h2>
                            <!--Section description-->
                            <p class="text-center w-responsive mx-auto mb-5">Fragen? Vorschläge? Du brauchst
                                Unterstützung? Dann ab damit! Wir beantworten gerne alle fragen.</p>
                            <form id="contact-form" name="contact-form" action="" method="POST">

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="name" name="name" class="form-control white-text" maxlength="200" required>
                                            <label for="name" class="">Dein Name</label>
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="email" name="email" class="form-control white-text" maxlength="200" required>
                                            <label for="email" class="">E-Mail Adresse</label>
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <input type="text" id="subject" name="subject" class="form-control white-text" maxlength="200" required>
                                            <label for="subject" class="">Titel</label>
                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <textarea type="text" id="message" name="message" rows="2" class="form-control white-text md-textarea" required></textarea>
                                            <label for="message">Deine Nachricht</label>
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->
                                <div class="text-center text-md-left">
                                    <input type="submit" class="btn btn-primary" value="Senden">
                                </div>
                            </form>

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