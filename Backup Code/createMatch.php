<?php
//conn db        
$servername = "localhost";
$username = "root";
$password = "";
$database = "sportodds";

//create conncetion
$conn = mysqli_connect($servername, $username, $password, $database);
// echo "SELECT umpire_id, umpire_name FROM umpire WHERE umpire_id = $umpire_id";
// exit;

if (!$conn) {
    die("Sorry Connection unsuccessful" . mysqli_connect_error());
} else {
    // echo'Connection was successful<br>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $umpire_id = $_POST['umpire_id'];
    $match_teamA = $_POST['match_teamA'];
    $match_teamB = $_POST['match_teamB'];
    $match_type = $_POST['match_type'];
    $match_venue = $_POST['match_venue'];
    $match_status = $_POST['match_status'];

    $sql = "INSERT INTO `m_atch` (`umpire_id`, `match_teamA`, `match_teamB`, `match_type`, `match_venue`, `match_status`) VALUES ('$umpire_id', '$match_teamA', '$match_teamB', '$match_type', '$match_venue', '$match_status')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUCCESS!</strong> Your entry is submitted successfuly.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else {
        //echo"Record was not inserted successfuly because ". mysqli_error($conn) ;
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERROR!</strong> Your entry was not submitted successfuly.We are sorry for inconvenience.
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
    <title>Create Match</title>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

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
                    <a href="createTeams.php ">Add Teams</a>
                </li>
                <li>
                    <a href="addPlayers.php">Add Players</a>
                </li>
                <li>
                    <a href="createUmpire.php">Add Umpire</a>
                </li>
                <li>
                    <a class="active" href="createMatch.php">Add Match..</a>
                </li>
                <li>
                    <a href="matchToss.php">Match Toss</a>
                </li>
                <li>
                    <a href="playMatch.php">Play Match</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left nav bar end  -->

    <section class="section_creatematch">
        <h3>Matches</h3>

        <hr>
        <a class="addnew" href="forms/fromMatch.php">Add New</a>

        <div class="table-header">
            Results for "Matches"
        </div>

        <div class="container fcontainer">
            <table id="" class="table">
                <thead>
                    <tr>
                        <th scope="col">S No</th>
                        <th scope="col">Umpire Name</th>
                        <th scope="col">Team A</th>
                        <th scope="col">Team B</th>
                        <th scope="col">Match Type</th>
                        <th scope="col">Match Venue</th>
                        <th scope="col">Match Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $srno = 0;
                    $sql = "Select * from `m_atch`";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $srno = $srno + 1;
                            $teamA = $row['match_teamA'];
                            $teamB = $row['match_teamB'];

                            $sql = "SELECT * FROM `team` where `team_id` = '$teamA'";
                            $result1 = mysqli_query($conn, $sql);
                            $row1 = mysqli_fetch_assoc($result1);


                            $sql = "SELECT * FROM `team` where `team_id` = '$teamB'";
                            $result2 = mysqli_query($conn, $sql);
                            $row2 = mysqli_fetch_assoc($result2);
                            //  print_r ($result2);exit;

                            echo "<tr>
                            <td scope='row'>" . $srno . "</td>   
                            <td>" . $row['umpire_id'] . "</td>
                            <td>" . $row1['team_name'] . "</td>
                            <td>" . $row2['team_name'] . "</td>
                            <td>" . $row['match_type'] . "</td>
                            <td>" . $row['match_venue'] . "</td>
                            <td>" . $row['match_status'] . "</td>
                            <td> 
                            <button class='edit btn btn-sm btn-primary'><a href='updateMatch.php?updatematch_id=" . $row['match_id'] . "' class='text-light text-decoration-none'>Edit</a></button>
                            <button class='delete btn btn-sm btn-danger'><a href='deleteMatch.php?deletematch_id=" . $row['match_id'] . "' class='text-light text-decoration-none' onclick='return deleteRecord(" . $row['match_id'] . ")'>Delete</a></button>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </section>

    <script>
        function deleteRecord(match_id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location = 'deleteMatch.php?deletematch_id=' + match_id;
            } else {
                return false;
            }
        }
    </script>

    <script>
        // let table = new DataTable('#myTable');
        $(document).ready(function() {
            $("#myTable").DataTable();
        });
    </script>




</body>

</html>