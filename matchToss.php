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
    <title>Play Match</title>
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
                    <a href="createTeams.php ">Add Teams</a>
                </li>
                <li>
                    <a href="addPlayers.php">Add Players</a>
                </li>
                <li>
                    <a href="createUmpire.php">Add Umpire</a>
                </li>
                <li>
                    <a href="createVenue.php">Add Venue</a>
                </li>
                <li>
                    <a href="createMatch.php">Add Match</a>
                </li>
                <li>
                    <a class="active" href="matchToss.php">Match Toss...</a>
                </li>
                <li>
                    <a href="playMatch.php">Play Match</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left nav bar end  -->

    <section class="section_createteams">
        <h3>Match Toss</h3>

        <hr>
        <a class="addnew" href="forms/formToss.php">Add New</a>

        <div class="table-header">
            Results for "Match Tosses"
        </div>

        <div class="container fcontainer">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th scope="col">S No</th>
                        <th scope="col">Match Teams</th>
                        <th scope="col">Team Toss Won</th>
                        <th scope="col">Team Decision</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $srno = 0;
                    $sql = "SELECT * from `toss` ORDER BY toss_id desc";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $srno = $srno + 1;

                            $sql = "SELECT * FROM `m_atch` WHERE `match_id` = " . $row['match_id'];
                            $result1 = mysqli_query($conn, $sql);
                            $row1 = mysqli_fetch_assoc($result1);
                            $teamA = $row1['match_teamA'];
                            $teamB = $row1['match_teamB'];

                            $sql = "SELECT * from  `team` WHERE team_id = $teamA";
                            $result2 = mysqli_query($conn, $sql);
                            $row2 = mysqli_fetch_assoc($result2);
                            $teamAName = $row2['team_name'];

                            $sql = "SELECT * from  `team` WHERE team_id = $teamB";
                            $result3 = mysqli_query($conn, $sql);
                            $row3 = mysqli_fetch_assoc($result3);
                            $teamBName = $row3['team_name'];

                            $sql = "SELECT * from  `team` WHERE team_id = " . $row['team_toss_won'];
                            $result4 = mysqli_query($conn, $sql);
                            $row4 = mysqli_fetch_assoc($result4);
                            $teamTossWon = $row4['team_name'];


                    ?>
                            <tr>
                                <td scope='row'><?= $srno ?> </td>
                                <td><?= $teamAName . " Vs " . $teamBName ?></td>
                                <td><?= $teamTossWon ?></td>
                                <td><?= $row['team_decision'] ?></td>
                        <?php
                            echo "<td>
                                    <button class='delete btn btn-sm btn-danger'><a href='deleteToss.php?deleteToss_id=" . $row['toss_id'] . "' class='text-light text-decoration-none' onclick='return deleteRecord(" . $row['toss_id'] . ")'>Delete</a></button>
                                </td>
                            </tr>";
                        }
                    }
                        ?>
                </tbody>
            </table>
        </div>
        


    </section> 

    <script>
        function toss3() {
            var select_match = $('#select_match').val();
            var request = $.ajax({
                url: 'insert.php',
                type: "POST",
                data: {
                    select_match: select_match
                },
                dataType: "html",
            });
            request.done(function(html) {
                // alert(html);
                $("#team_toss_won").html(html);
            });
            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }
    </script>

    <script>
        function deleteRecord(toss_id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location = 'deleteToss.php?deleteToss_id=' + toss_id;
            } else {
                return false;
            }
        }

        $(document).ready(function() {
            $("#myTable").DataTable();
        });
    </script>

</body>

</html>