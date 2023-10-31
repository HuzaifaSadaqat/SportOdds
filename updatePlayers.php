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

$id = $_GET['updateplayer_id'];

$sql = "SELECT * from `players` where `player_id` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$team_id = $row['team_id'];
$player_name = $row['player_name'];
$player_desig = $row['player_desig'];
$player_status = $row['player_status'];



if (isset($_POST['edit'])) {
    $player_id = $_POST["edit"];
    $team_id = $_POST["team_id"];
    $player_name = $_POST["player_name"];
    $player_desig = $_POST["player_desig"];
    $player_status = $_POST["player_status"];
    // echo $_POST['team_id']; exit;

    $sql = "UPDATE `players` SET `team_id` = '$team_id', `player_name` = '$player_name', `player_desig` = '$player_desig' WHERE `player_id` = '$player_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> Your entry is updated successfuly.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        header('location:addPlayers.php');
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
    <title>Update Players</title>
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
                    <a href="addPlayers.php">Add Players...</a>
                </li>
                <li>
                    <a href="createUmpire.php">Create Umpire</a>
                </li>
                <li>
                    <a href="createMatch.php">Create Match</a>
                </li>
                <li>
                    <a href="">Play Match</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left nav bar end  -->

    <section>
        <div class="rightsection">
            <h4>Update Players</h4>
            <div class="container my-4">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="team_id" name="team_id" class="form-label">Team name</label>
                        <?php
                        $sql1 = "SELECT * FROM team WHERE team_id = $team_id";
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $team_name = $row1['team_name'];

                        ?>
                        <!-- <input type="name" class="form-control" id="team_id" autofocus name="team_id" aria-describedby="team_id" required value="<?php echo $team_id  ?>"> -->
                        <select class="bg-dark" name="team_id" id="team_id" value="<?php echo $team_name ?>" required>
                            <?php
                            $sql = "SELECT * FROM team";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $teamid = $row['team_id'];
                                $team_name = $row['team_name'];
                            ?><option value="<?php echo $teamid ?>" <?php if ($teamid == $team_id) {
                                                                        echo "selected";
                                                                    } ?>> <?php echo $row['team_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="player_name" name="player_name" class="form-label">Player Name</label>
                        <input type="name" class="form-control" id="player_name" name="player_name" aria-describedby="player_name" required value="<?php echo $player_name  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="player_desig" name="player_desig" class="form-label">Player Designation</label>
                        <select class="bg-dark" name="player_desig" id="player_desig" required value="<?php echo $player_desig  ?>">
                            <option disabled selected value> -- Select an option -- </option>

                            <option value="Batsman" <?php if ($player_desig == "Batsman") {
                                                        echo "selected";
                                                    } ?>>Batsman</option>
                            <option value="Batsman + Keeper" <?php if ($player_desig == "Batsman + Keeper") {
                                                                    echo "selected";
                                                                } ?>>Batsman + Keeper</option>
                            <option value="Bowler" <?php if ($player_desig == "Bowler") {
                                                        echo "selected";
                                                    } ?>>Bowler</option>
                            <option value="All Rounder" <?php if ($player_desig == "All Rounder") {
                                                            echo "selected";
                                                        } ?>>All Rounder</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="player_status" name="player_status" class="form-label">Player Status</label>
                        <select class="bg-dark" name="player_status" id="player_status" name="player_status" value="<?php echo $player_status  ?>">
                            <option value="Active" <?php if ($player_status == "Active") {
                                                        echo "selected";
                                                    } ?>>Active</option>
                            <option value="Unactive" <?php if ($player_status == "Unactive") {
                                                            echo "selected";
                                                        } ?>>Unactive</option>
                        </select>
                    </div>
                    <input type="hidden" name="edit" value="<?php echo $id ?>" id="hidden">

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>


</body>

</html>