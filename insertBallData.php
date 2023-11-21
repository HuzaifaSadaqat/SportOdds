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
$typeofruns = $_POST['typeofruns'];
$outtype = $_POST['outtype'];
if ($outtype) {
    $wicket = 1;
}
$batsman1 = $_POST['batsman1'];
$batsman2 = $_POST['batsman2'];
$bowler = $_POST['bowler'];

$sql = "INSERT INTO `match_details` (`match_id`, `score`, `typeofrun`, `out_type`, `bowl_per_over`, `overs`, `batsman`, `non_sriker`, `bat_run`, `bowler`, `bowl_runs`, `wickets`) VALUES ('$select_match', '$scores', '$typeofruns', '$outtype', '$bowls', '$overs' , '$batsman1', '$batsman2' , '$scores', '$bowler', '$scores', '$wicket')";


if (mysqli_query($conn, $sql)) {
} else {
    // Error in data insertion 
    echo "Error: " . mysqli_error($conn);
}

header('Location: ballbyball.php');
