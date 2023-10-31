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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Shortcut Icon-->
    <link rel="icon" href="../assets/img/logo/favicon.png">
    <!--Bootstrap Min Css-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!--Main custom Css-->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- My css  -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Datatables  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <title>Add Players Form</title>
</head>

<body>
    <header>
        <img src="../assets/img/logo/logo.png" alt="logo">
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
                    <a href="../admin.php">Dashboard</a>
                </li>
                <li>
                    <a href="../createTeams.php ">Add Teams..</a>
                </li>
                <li>
                    <a class="active" href="../addPlayers.php">Add Players</a>
                </li>
                <li>
                    <a href="../createUmpire.php">Add Umpire</a>
                </li>
                <li>
                    <a href="../createMatch.php">Add Match</a>
                </li>
                <li>
                    <a href="../matchToss.php">Match Toss</a>
                </li>
                <li>
                    <a href="../playMatch.php">Play Match</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left nav bar end  -->

    <div class="rightsection rightsection_addplayers">
        <h4>Add Players</h4>

        <div class="formwrapper">
            <div class="container formcontainer my-4">
                <form action="../addPlayers.php" method="post">
                    <div class="mb-3">
                        <label for="team_id" name="team_id" class="form-label">Team name</label>
                        <select class=" " name="team_id" id="team_id">
                            <option disabled selected value> -- Select a Team -- </option>
                            <?php
                            $sql = "SELECT * FROM team";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['team_id'] ?>"><?php echo $row['team_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="player_name" name="player_name" class="form-label">Player Name</label>
                        <input type="name" class="form-control" id="player_name" name="player_name" aria-describedby="player_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="player_desig" name="player_desig" class="form-label">Player Designation</label>
                        <select class=" " name="player_desig" id="player_desig" required>
                            <option disabled selected value> -- Select an option -- </option>
                            <option value="Batsman">Batsman</option>
                            <option value="Batsman + Keeper">Batsman + Keeper</option>
                            <option value="Bowler">Bowler</option>
                            <option value="All Rounder">All Rounder</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="player_status" name="player_status" class="form-label">Player Status</label>
                        <select class=" " name="player_status" id="player_status" name="player_status">
                            <option value="Active">Active</option>
                            <option value="Unactive">Unactive</option>
                        </select>
                    </div>
<hr>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

</body>

</html>