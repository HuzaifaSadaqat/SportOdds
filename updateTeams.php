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

$id = $_GET['updateteam_id'];

$sql = "SELECT * from `team` where `team_id` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$team_name = $row['team_name'];
$team_coach = $row['team_coach'];
$team_captain = $row['team_captain'];



if (isset($_POST['edit'])) {
    $team_id = $_POST["edit"];
    $team_name = $_POST["team_name"];
    $team_coach = $_POST["team_coach"];
    $team_captain = $_POST["team_captain"];
    // echo $_POST['team_id']; exit;

    $sql = "UPDATE `team` SET `team_name` = '$team_name', `team_coach` = '$team_coach', `team_captain` = '$team_captain' WHERE `team_id` = '$team_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> Your entry is updated successfuly.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        header('location:createTeams.php');
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
    <title>Update Teams</title>
    <!--Shortcut Icon-->
    <link rel="icon" href="assets/img/logo/favicon.png">
    <!--Bootstrap Min Css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Main custom Css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- My css  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700;900&display=swap"rel="stylesheet" />
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
            <button class="button">Login</button>
            <button class="button signup">Admin</button>
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
                    <a href="">Update Teams...</a>
                </li>
                <li>
                    <a href="createUmpire.php">Create Umpire</a>
                </li>
                <li>
                    <a href="createMatch.php">Create Match</a>
                </li>
                <li>
                    <a href="matchToss.php">Match Toss</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left nav bar end  -->

    <section>
        <div class="rightsection">
            <h4>Update Teams</h4>
            <div class="container my-4">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="team_name" name="team_name" class="form-label">Team Name</label>
                        <input type="name" class="form-control" id="team_name" name="team_name" aria-describedby="team_name" required value="<?php echo $team_name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="team_coach" name="team_coach" class="form-label">Team Coach</label>
                        <input type="name" class="form-control" id="team_caoch" name="team_coach" aria-describedby="team_coach" required value="<?php echo $team_coach; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="team_captain" name="team_captain" class="form-label">Team Captain</label>
                        <input type="team_captain" class="form-control" id="team_captain" name="team_captain" aria-describedby="team_captain" required value="<?php echo $team_captain; ?>">
                    </div>

                    <input type="hidden" name="edit" value="<?php echo $id ?>" id="hidden">

                    <!-- <input type="button" class="btn btn-primary" name="submit" value="Submit"> -->
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>


</body>

</html>