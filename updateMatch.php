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

$id = $_GET['updatematch_id'];

$sql = "SELECT * from `m_atch` where `match_id` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$umpire_id = $row['umpire_id'];
$match_teamA = $row['match_teamA'];
$match_teamB = $row['match_teamB'];
$match_type = $row['match_type'];
$match_venue = $row['match_venue'];
$match_dt = $row['match_dt'];
$match_status = $row['match_status'];
// echo $match_status; exit;

if (isset($_POST['edit1'])) {

    $umpire_id = $_POST['umpire_id'];
    $match_teamA = $_POST['match_teamA'];
    $match_teamB = $_POST['match_teamB'];
    $match_type = $_POST['match_type'];
    $match_venue = $_POST['match_venue'];
    $match_dte = $_POST['match_dt'];
    $match_status = $_POST['match_status'];

    $sql = "UPDATE `m_atch` SET `umpire_id` = '$umpire_id', `match_teamA` = '$match_teamA', `match_teamB` = '$match_teamB', `match_type` = '$match_type', `match_venue` = '$match_venue', `match_dt` = '$match_dte', `match_status` = '$match_status' WHERE `match_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> Your entry is updated successfuly.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        header('location:createMatch.php');
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
    <title>Update Match</title>
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
                    <a href="">Update Teams...</a>
                </li>
                <li>
                    <a href="createUmpire.php">Create Umpire</a>
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


    <div class="rightsection">
        <h4>Update Match</h4>

        <div class="formwrapper">
            <div class="container formcontainer my-4">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="umpire_name" class="col-2 form-label">Umpire Name</label>
                        <?php
                        $sql = "SELECT * FROM `umpire` where `umpire_id` = $umpire_id";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $umpire_name = $row['umpire_name'];
                        ?>
                        <select class="select_pad" autofocus name="umpire_id" id="umpire_id" required value="<?php echo $umpire_name; ?>">
                            <option disabled selected value> -- Select an option -- </option>

                            <?php
                            $sql = "SELECT * from `umpire`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $umpireid = $row['umpire_id'];
                                $umpirename = $row['umpire_name'];
                            ?>
                                <option value='<?php echo $umpireid ?>' <?php if ($umpireid == $umpire_id) {
                                                                            echo "selected";
                                                                        } ?>> <?php echo $umpirename ?> </option>
                            <?php }

                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="match_teamA" class="col-2 form-label">Match Teams</label>
                        <select class="select_pad" name="match_teamA" id="match_teamA" required value="<?php echo $match_teamA; ?>">
                            <option disabled selected value> -- Select Team A -- </option>

                            <?php
                            $sql = "SELECT * from `team`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $teamid = $row['team_id'];
                                $teamname = $row['team_name'];
                            ?>
                                <option value='<?php echo $teamid ?>' <?php if ($teamid == $match_teamA) {
                                                                            echo "selected";
                                                                        } ?>> <?php echo $teamname ?> </option>
                            <?php }
                            ?>
                        </select>
                        <span>Vs</span>
                        <select class="select_pad" name="match_teamB" id="match_teamB" required value="<?php echo $match_teamB; ?>">
                            <option disabled selected value> -- Select Team B -- </option>

                            <?php
                            $sql = "SELECT * from `team`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $teamid = $row['team_id'];
                                $team_name = $row['team_name'];
                            ?>
                                <option value='<?php echo $teamid ?>' <?php if ($teamid == $match_teamB) {
                                                                            echo "selected";
                                                                        } ?>> <?php echo $team_name ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="match_type" name="match_type" class="col-2 form-label">Match Type</label>
                        <select class="select_pad" autofocus name="match_type" id="match_type" required>
                            <option disabled selected value> -- Select an option -- </option>
                            <option value="T10" <?php if ($match_type == "T10") {
                                                    echo "selected";
                                                } ?>>T10</option>";
                            <option value="T20" <?php if ($match_type == "T20") {
                                                    echo "selected";
                                                } ?>>T20</option>";
                            <option value="ODI" <?php if ($match_type == "ODI") {
                                                    echo "selected";
                                                } ?>>ODI</option>";
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="match_venue" class="col-2 form-label">Match Venue</label>
                        <!-- <input type="name" class="text_field form-control" id="match_venue" name="match_venue" aria-describedby="match_venue" required value="<?php echo $match_venue; ?>"> -->
                        <select class="select_pad" name="match_venue" id="match_venue">
                            <?php
                            $sql = "SELECT * FROM venue";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $ven_id = $row['venue_id'];
                                $ven_name = $row['venue_name'];
                            ?>
                                <option value="<?php echo $ven_id ?>" <?php if ($ven_id == $match_venue) {
                                                                            echo "selected";
                                                                        } ?>> <?php echo $ven_name ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="match_dt" class="col-2 form-label">Match D&T</label>
                        <input type="datetime-local" class="form-control text_field" id="match_dt" name="match_dt" aria-describedby="match_dt" required value="<?php echo $match_dt ?>">
                    </div>

                    <div class="mb-3">
                        <label for="match_status" class="col-2 form-label">Match Status</label>
                        <select class="select_pad" name="match_status" id="match_">
                            <option value="In Progress" <?php if ($match_status == "In Progress") {
                                                            echo "selected";
                                                        } ?>>In Progress</option>
                            <option value="Delayed" <?php if ($match_status == "Delayed") {
                                                        echo "selected";
                                                    }
                                                    ?>>Delayed</option>
                            <option value="Ended" <?php if ($match_status == "Ended") {
                                                        echo "selected";
                                                    } ?>>Ended</option>
                        </select>
                    </div>

                    <input type="hidden" name="edit1" value="<?php echo $id ?>" id="hidden">

                    <hr>
                    <button type="submit" class="btn btn-primary submit_btn">Submit</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>