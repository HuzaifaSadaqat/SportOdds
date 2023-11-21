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
    $umpire_name = $_POST['umpire_name'];

    // Prepare and execute the SQL query to fetch existing data to check for uniqueness
    $stmt = $conn->prepare("SELECT * FROM umpire WHERE umpire_id = ? OR umpire_name = ?");
    $stmt->bind_param("ss", $umpire_id, $umpire_name);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the new input already exists in the database
    if ($result->num_rows > 0) {
        // The new input (name or email) already exists in the database, display an error message
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Input must be unique. Please enter different name and email.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else
        $sql = "INSERT INTO `umpire` ( `umpire_name`) VALUES ( '$umpire_name')";
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
    <title>Create Umpires</title>
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
                    <a class="active" href="createUmpire.php">Add Umpire..</a>
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

    <section>
        <h4>Umpires</h4>
        <hr>
        <a class="addnew" href="forms/formUmpire.php">Add New</a>

        <div class="table-header">
            Results for "Umpires"
        </div>

        <div class="container fcontainer">
            <table id="" class="table">
                <thead>
                    <tr>
                        <th scope="col">S No</th>
                        <th scope="col">Umpire Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $srno = 0;
                    $sql = "Select * from `umpire`";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $srno = $srno + 1;
                            $umpire_id = $row['umpire_id'];
                            echo "<tr>
                            <td scope='row'>" . $srno . "</td>                                
                            <td>" . $row['umpire_name'] . "</td>
                            <td> 
                            <button class='edit btn btn-sm btn-primary'><a href='updateUmpire.php?updateumpire_id=" . $row['umpire_id'] . "' class='text-light text-decoration-none'>Edit</a></button>
                            <button class='delete btn btn-sm btn-danger'><a href='deleteUmpire.php?deleteumpire_id=" . $row['umpire_id'] . "' class='text-light text-decoration-none' onclick='return deleteRecord(" . $row['umpire_id'] . ")'>Delete</a></button>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        </div>
    </section>

    <script>
        function deleteRecord(umpire_id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location = 'deleteUmpire.php?deleteumpire_id=' + umpire_id;
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