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

$id = $_GET['updateumpire_id'];

$sql = "SELECT * from `umpire` where `umpire_id` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$umpire_name = $row['umpire_name'];

if (isset($_POST['edit'])) {
    $umpire_id = $_POST["edit"];
    $umpire_name = $_POST["umpire_name"];
    // echo $_POST['team_id']; exit;

    $sql = "UPDATE `umpire` SET `umpire_name` = '$umpire_name' WHERE `umpire_id` = '$umpire_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> Your entry is updated successfuly.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        header('location:createUmpire.php');
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
    <title>Update Umpire</title>
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

    <section class="section_createumpire">
        <div class="rightsection">
            <h4>Add Umpires</h4>

            <div class="container my-4">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="umpire_name" name="umpire_name" class="form-label">Umpire name</label>
                        <input type="name" class="form-control" id="umpire_name" autofocus name="umpire_name" aria-describedby="umpire_name" required value="<?php echo $umpire_name?>">
                    </div>

                    <input type="hidden" name="edit" value="<?php echo $id ?>" id="hidden">

                    <!-- <input type="button" class="btn btn-primary" name="submit" value="Submit"> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>


</body>

</html>