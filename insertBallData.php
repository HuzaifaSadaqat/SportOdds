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

$select_match = $_POST['select_match'];
$bowls = $_POST['bowls'];
$overs = $_POST['overs'];
$scores = $_POST['score'];
$fours = '0';
$sixes = '0';

if ($scores == '4') {
    $fours = '1';
} elseif ($scores == '6') {
    $sixes = '1';
}

$typeofruns = $_POST['typeofruns'];
$outtype = $_POST['outtype'];

if ($outtype) {
    $wicket = 1;
} else {
    $wicket = 0;
}

$batsman1 = $_POST['batsman1'];
$batsman2 = $_POST['batsman2'];
$bowler = $_POST['bowler'];
$ballsPlayed = '1';

if ($typeofruns != "Batted") {
    $bat_run = 0;
    $ballsPlayed  = 0;
    $bowls--;
} else {
    $bat_run = $scores;
}

$sql1 = "SELECT total_score AS total_score FROM `match_details` WHERE `match_id` = $select_match ORDER BY match_details_id DESC";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$total_score = $row1['total_score'];
$tScore = $scores + $total_score;

$sql = "INSERT INTO `match_details` 
(`match_id`, `score`, `typeofrun`, `out_type`, `bowl_per_over`, `overs`, `batsman`, `non_sriker`, `bat_run`, `bowler`, `bowl_runs`, `wickets`, `played_balls`, `fours`, `sixes`, `total_score`)
VALUES
('$select_match', '$scores', '$typeofruns', '$outtype', '$bowls', '$overs' , '$batsman1', '$batsman2' , '$bat_run', '$bowler', '$scores', '$wicket', '$ballsPlayed', '$fours', '$sixes', '$tScore')";

if (mysqli_query($conn, $sql)) {
} else {
    // Error in data insertion 
    echo "Error: " . mysqli_error($conn);
}

// header('Location: ballbyball.php');
