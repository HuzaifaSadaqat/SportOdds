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
    <!-- Chosen -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>Add Players Form</title>
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
                    <a href="../createTeams.php ">Add Teams</a>
                </li>
                <li>
                    <a href="../addPlayers.php">Add Players</a>
                </li>
                <li>
                    <a href="../createUmpire.php">Add Umpire</a>
                </li>
                <li>
                    <a href="../createMatch.php">Add Match</a>
                </li>
                <li>
                    <a class="active" href="../matchToss.php">Match Toss..</a>
                </li>
                <li>
                    <a href="../playMatch.php">Play Match</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left nav bar end  -->

    <div class="rightsection rightsection_addplayers">
        <h4>Add Toss</h4>

        <div class="formwrapper">
            <div class="container formcontainer my-3">
                <form action="../insert_toss.php" method="post">
                    <div class="mb-3">
                        <label for="select_match" class="col-3 form-label">Select Match to Play</label>
                        <select class="select-2" autofocus name="select_match" id="select_match" onchange="toss3();">
                            <option value='0'> -- Select a Match --</option>
                            <?php
                            $sql = "SELECT * FROM `m_atch` WHERE match_id NOT IN (SELECT match_id FROM toss)";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row) {
                                    $match_teamA = $row['match_teamA'];
                                    $match_teamB = $row['match_teamB'];

                                    $sql = "SELECT * from `team` where `team_id` = $match_teamA";
                                    $result1 = mysqli_query($conn, $sql);
                                    $row1 = mysqli_fetch_assoc($result1);

                                    $sql = "SELECT * from `team` where `team_id` = $match_teamB";
                                    $result2 = mysqli_query($conn, $sql);
                                    $row2 = mysqli_fetch_assoc($result2);
                                }
                            ?>
                                <option value="<?php echo $row['match_id'] ?>"><?php echo $row1['team_name'] . ' Vs ' . $row2['team_name']  ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="team_toss_won" class="col-3 form-label">Toss</label>
                        <select class="select-2" name="team_toss_won" id="team_toss_won">
                            <option value='0'> -- Select --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="team_decision" class="col-3 form-label">Team Decision</label>
                        <select class=" select-2" name="team_decision" id="team_decision">
                            <option disabled selected value> -- Select Team Decision --</option>
                            <option value='Bat'>Bat</option>;
                            <option value='Bowl'>Bowl</option>;
                        </select>
                    </div>

                    <?php
                    if ($row) {
                        $sql = "SELECT * FROM `m_atch` WHERE (`match_teamA` = $match_teamA AND `match_teamB` = $match_teamB)";
                        $result3 = mysqli_query($conn, $sql);
                        $row3 = mysqli_fetch_assoc($result3);
                        $match_id = $row3['match_id'];
                    }
                    ?>
                    <div class="mb-4">
                        <hr>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <script>
        function toss3() {
            var select_match = $('#select_match').val();
            // alert(select_match);
            var request = $.ajax({
                url: '../insert.php',
                type: "POST",
                data: {
                    select_match: select_match
                },
                dataType: "html",
            });
            request.done(function(html) {
                // alert(html);
                console.log(html);
                $("#team_toss_won").html(html);
            });
            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }


        $(document).ready(function() {
            $('.chosen-select').chosen();
            $('.select-2').select2();
        });


        // Chosen select through jquery after assigning values
        $("#team_toss_won").html(html);
        $("#team_toss_won").attr("class", "chosen-select");
        jQuery(function($) {
            $('#team_toss_won').trigger("chosen:updated");
            var $mySelect = $('#team_toss_won');
            $mySelect.chosen();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>


</body>

</html>