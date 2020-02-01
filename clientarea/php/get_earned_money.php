
<?php
//es fehlt GET mit companyID
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
if(! $conn )  
{  
  die("2");  
}  
$day = date('w');
$week_start = date('Y-m-d', strtotime('-'.$day.' days + 1 day'));
$date = new DateTime();
$week = $date->format("W");
$sql = "SELECT amount FROM money_transfer WHERE receiver='VTCManager Beta Company' AND DATE( date_sent ) >= '$week_start'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_amount = $current_amount + (int)$row["amount"];
    }
    $array = [
    "week" => $week,
    "amount" => $current_amount,
    ];
    }else{
        $array = [
    "week" => $week,
    "amount" => 0,
    ];
        }
        $current_amount = 0;
    $day = date('w');
$week_start2 = date('Y-m-d',strtotime("$week_start -7 days",));
$week = date('W', strtotime('-7 days'));
$sql = "SELECT amount FROM money_transfer WHERE receiver='VTCManager Beta Company' AND DATE( date_sent ) >= '$week_start2'AND DATE( date_sent ) <= '$week_start'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_amount = $current_amount + (int)$row["amount"];
    }
    $array2 = [
    "week" => $week,
    "amount" => $current_amount,
    ];
}else{
        $array2 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
        $current_amount = 0;
        $day = date('w');
$week_start3 = date('Y-m-d',strtotime("$week_start2 -7 days",));
$week = date('W', strtotime('-14 days'));
$sql = "SELECT amount FROM money_transfer WHERE receiver='VTCManager Beta Company' AND DATE( date_sent ) >= '$week_start3'AND DATE( date_sent ) <= '$week_start2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_amount = $current_amount + (int)$row["amount"];
    }
    $array3 = [
    "week" => $week,
    "amount" => $current_amount,
    ];
}else{
        $array3 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
                $current_amount = 0;
        $day = date('w');
$week_start4 = date('Y-m-d',strtotime("$week_start3 -7 days",));
$week = date('W', strtotime('-21 days'));
$sql = "SELECT amount FROM money_transfer WHERE receiver='VTCManager Beta Company' AND DATE( date_sent ) >= '$week_start4'AND DATE( date_sent ) <= '$week_start3'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_amount = $current_amount + (int)$row["amount"];
    }
    $array4 = [
    "week" => $week,
    "amount" => $current_amount,
    ];
}else{
        $array4 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
                $current_amount = 0;
        $day = date('w');
$week_start3 = date('Y-m-d',strtotime("$week_start4 -7 days",));
$week = date('W', strtotime('-28 days'));
$sql = "SELECT amount FROM money_transfer WHERE receiver='VTCManager Beta Company' AND DATE( date_sent ) >= '$week_start5'AND DATE( date_sent ) <= '$week_start4'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_amount = $current_amount + (int)$row["amount"];
    }
    $array5 = [
    "week" => $week,
    "amount" => $current_amount,
    ];
}else{
        $array4 = [
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
