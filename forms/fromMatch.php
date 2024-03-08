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
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Chosen -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">


    <title>Form Match</title>
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
                    <a href="../admin.php">Dashboard</a>
                </li>
                <li>
                    <a href="../createTeams.php ">Add Teams..</a>
                </li>
                <li>
                    <a href="../addPlayers.php">Add Players</a>
                </li>
                <li>
                    <a href="../createUmpire.php">Add Umpire</a>
                </li>
                <li>
                    <a class="active" href="../createMatch.php">Add Match</a>
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

    <div class="rightsection ">
        <h4>Create Match</h4>

        <div class="formwrapper">
            <div class="container formcontainer my-4">
                <form action="../createMatch.php" method="post">
                    <div class="mb-3">
                        <label for="umpire_name" name="umpire_name" class="col-2 form-label">Umpire Name</label>
                        <select class="chosen-select  select_pad" autofocus name="umpire_id" id="umpire_id" required>
                            <option disabled selected value> -- Select an option -- </option>
                            <?php
                            $sql = "SELECT umpire_id, umpire_name FROM umpire ";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?><option value="<?php echo $row['umpire_id'] ?> "><?php echo $row['umpire_name'] ?></option>";
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="match_teamA" class="col-2 form-label">Match Teams</label>
                        <select class="chosen-select  select_pad" name="match_teamA" id="match_teamA" required>
                            <option disabled selected value> -- Select Team A -- </option>
                            <?php
                            $sql = "SELECT * from `team`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $team_id = $row['team_id'];
                                $team_name = $row['team_name'];
                                echo "
                                <option value='$team_id'>$team_name</option>";
                            }
                            ?>
                        </select>
                        <span>Vs</span>
                        <select class="chosen-select  select_pad" name="match_teamB" id="match_teamB" required>
                            <option disabled selected value> -- Select Team B -- </option>
                            <?php
                            $sql = "SELECT * from `team`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $team_id = $row['team_id'];
                                $team_name = $row['team_name'];
                                echo "
                                <option value='$team_id'>$team_name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="match_type" name="match_type" class="col-2 form-label">Match Type</label>
                        <select class="chosen-select select_pad" autofocus name="match_type" id="match_type" required>
                            <option disabled selected value> -- Select an option -- </option>
                            <option value="T10">T10</option>";
                            <option value="T20">T20</option>";
                            <option value="ODI">ODI</option>";
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="match_venue" name="match_venue" class="col-2 form-label">Match Venue</label>
                        <input type="name" class="form-control text_field" id="match_venue" name="match_venue" aria-describedby="match_venue" required>
                    </div>
                    <div class="mb-3">
                        <label for="match_dt" class="col-2 form-label">Match Date & Time</label>
                        <input type="datetime-local" class="form-control text_field" id="match_dt" name="match_dt" aria-describedby="match_dt" required>
                    </div>

                    <div class="mb-3">
                        <label for="match_status" name="match_status" class="col-2 form-label">Match Status</label>
                        <select class="chosen-select select_pad" name="match_status" id="match_status">
                            <option value="In Progress">In Progress</option>
                            <option value="Delayed">Delayed</option>
                            <option value="Ended">Ended</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <hr>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // let table = new DataTable('#myTable');
        $(document).ready(function() {
            $("#myTable").DataTable();
            $('.chosen-select').chosen();
            $('.select-2').select2();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>


</body>

</html>