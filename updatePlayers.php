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
$player_img = $row['img_url'];


if (isset($_POST['edit'])) {
    $player_id = $_POST["edit"];
    $team_id = $_POST["team_id"];
    $player_name = $_POST["player_name"];
    $player_desig = $_POST["player_desig"];
    $player_status = $_POST["player_status"];
    $new_img_name = $_POST["old_img"];

    // echo "<pre>";
    // print_r($_FILES['my_image']);
    // echo "</pre>";
    if (isset($_FILES['my_image'])) {

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
        }
    }
    echo $_POST['edit'];

    echo "test";
    $sql = "UPDATE `players` SET `player_name` = '$player_name', `player_desig` = '$player_desig', `img_url` = '$new_img_name' WHERE `player_id` = '$player_id'";
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
    <style>
        .alb {
            width: 100px;
            height: 50px;
            padding: 5px;
        }

        .alb img {
            width: 20%;
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

    <div class="rightsection rightsection_addplayers">
        <h4>Update Players</h4>

        <div class="formwrapper">
            <div class="container formcontainer my-4">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="team_id" name="team_id" class="col-3 form-label">Team name</label>
                        <?php
                        $sql1 = "SELECT * FROM team WHERE team_id = $team_id";
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $team_name = $row1['team_name'];

                        ?>
                        <select class="select_pad" name="team_id" id="team_id" value="<?php echo $team_name ?>" required autofocus>
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
                        <label for="player_name" name="player_name" class="col-3 form-label">Player Name</label>
                        <input type="name" class="form-control text_field" id="player_name" name="player_name" aria-describedby="player_name" required value="<?php echo $player_name  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="player_desig" name="player_desig" class="col-3 form-label">Player Designation</label>
                        <select class="select_pad" name="player_desig" id="player_desig" required value="<?php echo $player_desig  ?>">
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
                        <label for="player_status" name="player_status" class="col-3 form-label">Player Status</label>
                        <select class="select_pad" name="player_status" id="player_status" name="player_status" value="<?php echo $player_status  ?>">
                            <option value="Active" <?php if ($player_status == "Active") {
                                                        echo "selected";
                                                    } ?>>Active</option>
                            <option value="Unactive" <?php if ($player_status == "Unactive") {
                                                            echo "selected";
                                                        } ?>>Unactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <?php
                        if (isset($_GET['error'])) : ?>
                            <p><?php echo $_GET['error']; ?></p>
                        <?php endif ?>

                        <label for="player_pic" class="col-3 form-label">Player Picture</label>
                        <span class="alb">
                            <img src="picUploads/<?= $player_img ?>">
                        </span>
                        <input type="hidden" name="old_img" value="<?php echo $player_img ?>">
                        <input type="file" class="text_field" name="my_image">
                    </div>

                    <input type="hidden" name="edit" value="<?php echo $id ?>" id="hidden">

                    <hr>
                    <button type="submit" name="submit" class="btn btn-primary submit_btn">Update</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>