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
$bowler = $_POST['bowler'];
$bowls = $_POST['bowls'];
$overs = $_POST['overs'];
$scores = $_POST['score'];
$typeofruns = $_POST['typeofruns'];
$outtype = $_POST['outtype'];
$batsman1 = $_POST['batsman1'];
$batsman2 = $_POST['batsman2'];


$sql = "INSERT INTO `match_details` (`match_id`, `score`, `typeofrun`, `out_type`, `bowl_per_over`, `overs`, `batsman`, `non_sriker`, `bowler`, `bat_run`, `bowl_runs`) VALUES ('$select_match', '$scores', '$typeofruns', '$outtype', '$bowls', '$overs' , '$batsman1', '$batsman2' , '$bowler', '$scores', '$scores')";

if (mysqli_query($conn, $sql)) {
} else {
    // Error in data insertion 
    echo "Error: " . mysqli_error($conn);
}

header('Location: ballbyball.php');
// Redirect back to the scoring page or display a success message