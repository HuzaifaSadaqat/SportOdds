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

    // Prepare and execute the SQL query to fetch existing data to check for uniqueness
    $stmt = $conn->prepare("SELECT * FROM toss WHERE toss_id = ?");
    $stmt->bind_param("s", $match_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the new input already exists in the database
    if ($result->num_rows > 0) {
        // The new input (name or email) already exists in the database, display an error message
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Toss already exists for this match.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else {
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
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Toss</title>
    <!--Shortcut Icon-->
    <link rel="icon" href="../assets/img/logo/favicon.png">
    <!--Bootstrap Min Css-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>

<body>

</body>

</html>