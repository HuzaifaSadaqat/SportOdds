<?php
//conn db        
$servername = "localhost";
$username = "root";
$password = "";
$database = "sportodds";

//create conncetion
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry Connection unsuccessful" . mysqli_connect_error());
} else {
    // echo'Connection was successful<br>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $team_toss_won = $_POST['team_toss_won'];
    $team_decision = $_POST['team_decision'];
    $match_id = $_POST['select_match'];


    $sql = "INSERT INTO `toss` (`team_toss_won`,`team_decision`, `match_id`) VALUES ('$team_toss_won', '$team_decision', '$match_id')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>SUCCESS!</strong> Your entry is submitted successfuly.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header('location:matchToss.php');
        } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR!</strong> Your entry was not submitted successfuly.We are sorry for inconvenience.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}
