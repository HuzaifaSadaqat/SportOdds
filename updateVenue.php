<?php
//connectong to db
$servername = "localhost";
$username = "root";
$password = "";
$database = "sportodds";

//create conncetion
$conn = mysqli_connect($servername, $username, $password, $database);

//die if !connected
if (!$conn) {
    die("Sorry Connection unsuccessful" . mysqli_connect_error());
}

$id = $_GET['updatevenue_id'];


$sql = "SELECT * from `venue` where `venue_id` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
    $venue_name = $row['venue_name'];
    $venue_country = $row['venue_country'];
    $venue_city = $row['venue_city'];

if (isset($_POST['edit'])) {
    $venue_id = $_POST["edit"];
    $venue_name = $_POST["venue_name"];
    $venue_country = $_POST["venue_country"];
    $venue_city = $_POST["venue_city"];

    $sql = "UPDATE `venue` SET `venue_name` = '$venue_name', `venue_country` = '$venue_country', `venue_city` = '$venue_city' WHERE `venue_id` = '$venue_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> Your entry is updated successfuly.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        header('location:createVenue.php');
    } else {
        echo "Record was not inserted successfuly because " . mysqli_error($conn);
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong> Your entry was not updated successfuly.We are sorry for inconvenience.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Venue</title>
    <!--Shortcut Icon-->
    <link rel="icon" href="assets/img/logo/favicon.png">
    <!--Bootstrap Min Css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Main custom Css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- My css  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Datatables  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

</head>

<body>
    <header>
        <img src="assets/img/logo/logo.png" alt="logo">
        <nav>
            <ul>
                <!-- <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li> -->
            </ul>

        </nav>

        <div class="btn">
            <a href="logout.php" class="cmn--btn" data-bs-toggle="" data-bs-target="">
                <span>Logout</span>
            </a>
            <a href="#0" class="cmn--btn2" data-bs-toggle="" data-bs-target="">
                <span>Admin</span>
            </a>
        </div>
    </header>
    <!--Header End-->

    <!-- Left navbar -->
    <div class="left_navbar_container">
        <div class="left_navbar">
            <ul>
                <li>
                    <a href="admin.php">Dashboard</a>
                </li>
                <li>
                    <a href="createTeams.php ">Create Teams</a>
                </li>
                <li>
                    <a href="addPlayers.php">Add Players</a>
                </li>
                <li>
                    <a href="createUmpire.php">Create Umpire..</a>
                </li>
                <li>
                    <a href="createMatch.php">Create Match</a>
                </li>
                <li>
                    <a href="playMatch.php">Play Match</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left nav bar end  -->

    <div class="rightsection">
        <h4>Update Venue</h4>

        <div class="formwrapper">
            <div class="container formcontainer my-4">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="venue_name" class="col-3 form-label">Venue name</label>
                        <input type="text" class="form-control text_field" id="venue_name" autofocus name="venue_name" aria-describedby="venue_name" required value="<?php echo $venue_name ?>">
                    </div>
                    <div class="mb-3">
                        <label for="venue_country" class="col-3 form-label">Venue Country</label>
                        <input type="text" class="form-control text_field" id="venue_country" autofocus name="venue_country" aria-describedby="venue_country" required value="<?php echo $venue_country ?>">
                    </div>
                    <div class="mb-3">
                        <label for="venue_city" class="col-3 form-label">Venue City</label>
                        <input type="text" class="form-control text_field" id="venue_city" autofocus name="venue_city" aria-describedby="venue_city" required value="<?php echo $venue_city ?>">
                    </div>
                    <input type="hidden" name="edit" value="<?php echo $id ?>" id="hidden">

                    <hr>
                    <!-- <input type="button" class="btn btn-primary" name="submit" value="Submit"> -->
                    <button type="submit" class="btn btn-primary submit_btn">Submit</button>
                </form>
            </div>
        </div>
    </div>