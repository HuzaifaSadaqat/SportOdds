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
                    <a href="createMatch.php">Add Match</a>
                </li>
                <li>
                    <a href="matchToss.php">Match Toss</a>
                </li>
                <li>
                    <a class="active" href="playMatch.php">Play Match..</a>
                </li>

            </ul>
        </div>
    </div>
    <!-- Left nav bar end  -->

    <section class="section_playmatch">
        <div class="rightsection rightsection_playmatch">
            <h3>Play Match</h3>

            <div class="formwrapper">
                <div class="container  my-3">
                    <form action="" method="post"> 
                        <div class="mb-3">
                            <label for="select_match" class="form-label">Select Match to Play</label>
                            <select class="" autofocus name="select_match" id="select_match" onchange="tossDetail();">
                                <option value='0'> -- Select a Match --</option>
                                <?php
                                $sql = "SELECT match_teamA, match_teamB,match_id from `m_atch`";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $match_teamA = $row['match_teamA'];
                                    $match_teamB = $row['match_teamB'];

                                    $sql = "SELECT * from `team` where `team_id` = $match_teamA";
                                    $result1 = mysqli_query($conn, $sql);
                                    $row1 = mysqli_fetch_assoc($result1);

                                    $sql = "SELECT * from `team` where `team_id` = $match_teamB";
                                    $result2 = mysqli_query($conn, $sql);
                                    $row2 = mysqli_fetch_assoc($result2);
                                ?>
                                    <option value="<?php echo $row['match_id'] ?>"><?php echo $row1['team_name'] . ' Vs ' . $row2['team_name']  ?></option>
                                <?php }
                                ?>

                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="left_right_container my-4" id="left_right_container">
                <div class="bat">
                    <!-- BAT -->
                </div>
            </div>
        </div>
    </section>

    <script>
        function tossDetail() {
            var select_match = $('#select_match').val();
            var request = $.ajax({
                url: 'tossDetail.php',
                type: "POST",
                data: {
                    select_match: select_match
                },
                dataType: "html",
            });
            request.done(function(html) {
                // alert(html);
                $("#left_right_container").html(html);
            });
            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });

        }
    </script>
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
        });
    </script>

</body>

</html>