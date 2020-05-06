<?php
include '../get_user_data.php';
if($user_rank != "owner") {
    header("404");
    die();
}
unlink('../../../../media.northwestvideo.de/media/articles/company_about_us/'.$user_company_id.'.txt');

$sql = "SELECT * FROM company_information_table WHERE id=$user_company_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if($row["company_pic_url"] != "https://vtc.northwestvideo.de/media/profile_pictures/default_avatar.png" || $row["company_pic_url"] != "https://media.northwestvideo.de/media/profile_pictures/default_avatar.png"){
            $company_pic_url = str_replace("https://", "", $row["company_pic_url"]);
            unlink('../../../../'. $company_pic_url);
        }
    }
}

$sql = "SELECT * FROM user_data WHERE userCompanyID=$user_company_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $sql2 = "UPDATE user_data SET userCompanyID = 0,rank='Fahrer' WHERE userID=".$row["userID"];

        if ($conn->query($sql2) === TRUE) {
            echo "Record for username: ".$row["username"]." updated.";
        } else {
            echo "Error updating record for username: ".$row["username"]." ". $conn->error;
        }
        $sql3 = "UPDATE career_table SET end_date=NOW(), fire_reason='Firmenauflösung',atCompanyName='$user_company_name' WHERE userID=" . $row["userID"]. " AND atCompanyID=$user_company_id AND end_date='0000-00-00 00:00:00'";

        if ($conn->query($sql3) === TRUE) {
            echo "Record career for username: " . $row["username"] . " updated.";
        } else {
            echo "Error updating career record for username: " . $row["username"] . " " . $conn->error;
        }
    }
}
$sql = "SELECT * FROM rank WHERE forCompanyID=$user_company_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $sql2 = "DELETE FROM rank WHERE forCompanyID=$user_company_id AND name='".$row["name"]."'";

        if ($conn->query($sql2) === TRUE) {
            echo "Rank " . $row["name"] . " deleted successfully";
        } else {
            echo "Error deleting rank: " . $row["name"] . " " . $conn->error;
        }
    }
}

$sql2 = "DELETE FROM job_market WHERE byCompanyID=$user_company_id";

if ($conn->query($sql2) === TRUE) {
    echo "Job market entries deleted successfully";
} else {
    echo "Error deleting job market entries: " . $conn->error;
}

$sql2 = "DELETE FROM company_information_table WHERE id=$user_company_id";

if ($conn->query($sql2) === TRUE) {
    echo "Company deleted successfully";
} else {
    echo "Error deleting company: " . $conn->error;
}
?>