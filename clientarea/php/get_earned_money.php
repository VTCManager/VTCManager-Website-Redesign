<?php
//connect and Check
include '../get_user_data.php'; 
//Abfrage aktuelle Woche
$day = date('w');
$week_start = date('Y-m-d', strtotime('-'.$day.' days + 1 day'));
$date = new DateTime();
$week = $date->format("W");
//hole Umsätze aus dieser Woche
$sql = "SELECT tour_id FROM tour_table WHERE username='$username_cookie' AND DATE( tour_date ) >= '$week_start'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //wenn Ergebnisse gefunden
    $array = [
    "week" => $week,
    "amount" => $result->num_rows,
    ];
}else{
    //wenn keine Ergebnisse gefunden
    $array = [
    "week" => $week,
    "amount" => 0,
    ];
 }
 //Geld zurücksetzen
$current_amount = 0;
//Abfrage letzte Woche
$day = date('w');
$week_start2 = date('Y-m-d',strtotime("$week_start -7 days",));
$week = date('W', strtotime('-7 days'));
//hole Umsätze
$sql = "SELECT tour_id FROM tour_table WHERE username='$username_cookie' AND DATE( tour_date ) >= '$week_start2'AND DATE( tour_date ) <= '$week_start'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //wenn Ergebnisse gefunden
    $array2 = [
    "week" => $week,
    "amount" => $result->num_rows,
    ];
}else{
    //wenn keine Ergebnisse gefunden
        $array2 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
//Geld zurücksetzen
$current_amount = 0;
//Abfrage vorletzte Woche
$day = date('w');
$week_start3 = date('Y-m-d',strtotime("$week_start2 -7 days",));
$week = date('W', strtotime('-14 days'));
//hole Umsätze
$sql = "SELECT tour_id FROM tour_table WHERE username='$username_cookie' AND DATE( tour_date ) >= '$week_start3'AND DATE( tour_date ) <= '$week_start2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    //wenn Ergebnisse gefunden
    $array3 = [
    "week" => $week,
    "amount" => $result->num_rows,
    ];
}else{
    //wenn keine Ergebnisse gefunden
        $array3 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
                $current_amount = 0;
                //Abfrage vorvorletzte Woche
        $day = date('w');
$week_start4 = date('Y-m-d',strtotime("$week_start3 -7 days",));
$week = date('W', strtotime('-21 days'));
$sql = "SELECT tour_id FROM tour_table WHERE username='$username_cookie' AND DATE( tour_date ) >= '$week_start4'AND DATE( tour_date ) <= '$week_start3'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $array4 = [
    "week" => $week,
    "amount" => $result->num_rows,
    ];
}else{
        $array4 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
                $current_amount = 0;
                //Abfrage vorvorvorletzte Woche
        $day = date('w');
$week_start3 = date('Y-m-d',strtotime("$week_start4 -7 days",));
$week = date('W', strtotime('-28 days'));
$sql = "SELECT tour_id FROM tour_table WHERE username='$username_cookie' AND DATE( tour_date ) >= '$week_start5'AND DATE( tour_date ) <= '$week_start4'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $array5 = [
    "week" => $week,
    "amount" => $result->num_rows,
    ];
}else{
        $array5 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
$final_array = [
    $array,
    $array2,
    $array3,
    $array4,
    $array5,
];
    echo json_encode($final_array);

?>
