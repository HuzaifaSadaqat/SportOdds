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
    $venue_name = $_POST['venue_name'];
    $venue_country = $_POST['venue_country'];
    $venue_city = $_POST['venue_city'];

    $sql = "INSERT INTO `venue` (`venue_name`, `venue_country`, `venue_city`) VALUES ('$venue_name', '$venue_country', '$venue_city')";
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
    <title>Add Venue</title>
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
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                    <a class="active" href="createVenue.php">Add Venue..</a>
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

    <section class="section_creatematch">
        <h3>Venues</h3>

        <hr>
        <a class="addnew" href="forms/formVenue.php">Add New</a>

        <div class="table-header">
            Results for "Venues"
        </div>

        <div class="container fcontainer">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th scope="col">S No</th>
                        <th scope="col">Venue Name</th>
                        <th scope="col">Venue Country</th>
                        <th scope="col">Venue City</th>
                        <th scope="col" style="text-align: right; padding-right: 60px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $srno = 0;
                    $sql = "Select * from `venue` ORDER BY venue_id desc";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $srno = $srno + 1;

                            echo "<tr>
                            <td scope='row'>" . $srno . "</td>   
                            <td>" . $row['venue_name'] . "</td>
                            <td>" . $row['venue_country'] . "</td>
                            <td>" . $row['venue_city'] . "</td>
                            "; ?>
                            <td style="text-align: right;">
                                <button class='edit btn btn-sm btn-primary'>
                                    <a href='updateVenue.php?updatevenue_id=<?php echo $row['venue_id'] ?>' class='text-light text-decoration-none'>Edit</a>
                                </button>
                                <button class='delete btn btn-sm btn-danger'>
                                    <a href='deleteVenue.php?deletevenue_id=<?php echo $row['venue_id']; ?>' class='text-light text-decoration-none' onclick='return deleteRecord("<?php echo $row['venue_id']; ?>")'>Delete</a>
                                </button>
                                </tr>
                        <?php
                        }
                    }
                        ?>

                </tbody>
            </table>
        </div>
    </section>

    <script>
        function deleteRecord(venue_id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location = 'deleteVenue.php?deletevenue_id=' + venue_id;
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