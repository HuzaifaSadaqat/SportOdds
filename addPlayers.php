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
    $team_id = $_POST['team_id'];
    $player_name = $_POST['player_name'];
    $player_desig = $_POST['player_desig'];
    $player_status = $_POST['player_status'];
    // $player_pic = $_POST['my_image'];

    // Prepare and execute the SQL query to fetch existing data to check for uniqueness
    $stmt = $conn->prepare("SELECT * FROM players WHERE player_id = ? OR player_name = ?");
    $stmt->bind_param("ss", $player_id, $player_name);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the new input already exists in the database
    if ($result->num_rows > 0) {
        // The new input (name or email) already exists in the database, display an error message
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Input must be unique. Please enter different name and email.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else {
        if (isset($_FILES['my_image'])) {
            // echo "<pre>";
            // print_r($_FILES['my_image']);
            // echo "</pre>";

            $img_name = $_FILES['my_image']['name'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $img_size = $_FILES['my_image']['size'];
            $error = $_FILES['my_image']['error'];

            if ($error === 0) {
                if ($img_size > 1250000) {
                    $em = "File is too large";
                    header("Location: formPlayer.php?error=$em");
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "png", "jpeg");
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_upload_path = 'picUploads/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                    }
                }
            } else {
                $em = "You can not upload this type of file";
                header("Location: formPlayer.php?error=$em");
            }

            $sql = "INSERT INTO `players` (`team_id`, `player_name`, `player_desig`, `player_status`, `img_url`) VALUES ('$team_id' , '$player_name', '$player_desig', '$player_status', '$new_img_name')";
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
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Players</title>
    <!--Shortcut Icon-->
    <link rel="icon" href="assets/img/logo/favicon.png">
    <!--Bootstrap Min Css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Main custom Css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Datatables  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- Chosen -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <!-- My css  -->
    <link rel="stylesheet" href="assets/css/style.css">


    <style>
        .alb {
            width: 95px;
            height: 50px;
            padding: 5px;
        }

        .alb img {
            width: 70%;
            height: 100%;
        }
    </style>

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
                    <a class="active" href="addPlayers.php">Add Players..</a>
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
                    <a href="matchToss.php">Match Toss</a>
                </li>
                <li>
                    <a href="playMatch.php">Play Match</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left nav bar end  -->

    <section class="section_addplayers">
        <h3>Players</h4>
            <hr>
            <a class="addnew" href="forms/formPlayer.php">Add New</a>

            <div class="table-header">
                Results for "Players"
            </div>

            <div class="container fcontainer ">
                <table id="myTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col">S No</th>
                            <th scope="col">Team Name</th>
                            <th scope="col">Player name</th>
                            <th scope="col">Player Designation</th>
                            <th scope="col">Player Status</th>
                            <th scope="col">Player Picture</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $srno = 0;
                        $sql = "SELECT * FROM `players` ORDER BY player_id DESC";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                $team_id = $row['team_id'];
                                $sql1 = "SELECT * FROM team WHERE team_id = $team_id";
                                $result1 = mysqli_query($conn, $sql1);
                                $row1 = mysqli_fetch_assoc($result1);

                                $srno = $srno + 1;
                                $player_id = $row['player_id'];

                                echo "<tr>
                                <td>" . $srno . "</td>                                
                                <td>" . $row1['team_name'] . "</td>
                                <td>" . $row['player_name'] . "</td>
                                <td>" . $row['player_desig'] . "</td>
                                <td>" . $row['player_status'] . "</td>
                                <td>
                                    <div class='alb'>
                                        <img src='picUploads/" . $row['img_url'] . "' alt=''>
                                    </div>
                                </td>";

                                $sql2 = "SELECT team_id FROM players WHERE player_id = $player_id";
                                $result2 = mysqli_query($conn, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                $team = $row2['team_id'];

                                $sql3 = "SELECT match_teamA, match_teamB FROM m_atch WHERE (match_teamA = $team OR match_teamB = $team) AND match_status != 'Ended'";
                                $result3 = mysqli_query($conn, $sql3);
                                $row3 = mysqli_fetch_assoc($result3);

                                if (!$row3) {
                                    echo "<td>";
                                    echo "
                                    <button class='edit btn btn-sm btn-primary'><a href='updatePlayers.php?updateplayer_id=" . $row['player_id'] . "' class='text-light text-decoration-none'>Edit</a></button>
                                    <button class='delete btn btn-sm btn-danger'><a href='deletePlayers.php?deleteplayer_id=" . $row['player_id'] . "' class='text-light text-decoration-none' onclick='return deleteRecord(" . $row['player_id'] . ")'>Delete</a></button>";
                                    echo "</td>";
                                } else {
                                    echo "<td>";
                                    echo "Player already in a match";
                                    echo "</td>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="my-4" style="color: whitesmoke;">
                END OF PAGE
            </div>
    </section>

    <script>
        function deleteRecord(player_id) {
            if (confirm("Are you sure you want to delete this player?")) {
                window.location = 'deletePlayers.php?deleteplayer_id=' + player_id;
            } else {
                return false;
            }
        }
    </script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
            $('.chosen-select').chosen();
        });
    </script>



</body>

</html>