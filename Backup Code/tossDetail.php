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

$select_match = $_POST['select_match'];

$sql = "SELECT t.*, m.match_teamA, m.match_teamB  FROM `toss` t JOIN `m_atch` m ON t.match_id = m.match_id WHERE t.match_id = $select_match";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$team_won = $row['team_toss_won'];
$decision = $row['team_decision'];

// echo ($team_won == $row['match_teamA']) ? $row['match_teamB'] : $row['match_teamA'];exit;   
$team_lost = ($team_won == $row['match_teamA']) ? $row['match_teamB'] : $row['match_teamA'];

$sql = "SELECT * FROM `team` where `team_id` = $team_won";
$result1 = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result1);
$team_tosswon = $row1['team_name'];

$sql = "SELECT * FROM `team` where `team_id` = $team_lost";
$result2 = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_assoc($result2);
$team_losttoss = $row2['team_name'];

$team_bat = ($decision == 'Bat') ? $team_won : $team_lost;
$team_bowl = ($decision == 'Bowl') ? $team_won : $team_lost;
?>

<div class="formwrapper">
    <div class="container">
        <?php
        // fetching batsamn and non striker
        $sql = "SELECT batsman, non_sriker FROM match_details WHERE match_id = $select_match ORDER BY match_details_id desc";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        //Setting bat 1 and 2
        if ($row) {
            $batsman1 = $row['batsman'];
            $batsman2 = $row['non_sriker'];
        }

        //fetching score
        $sql1 = "SELECT score from match_details WHERE match_id = $select_match ORDER BY match_details_id desc";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        if ($row1) {
            $lastScore = $row1['score'];
        }
        if (isset($lastScore)) {
            if ($lastScore % 2 == 1) {
                // Swap the positions of batsman1 and batsman2
                $temp = $batsman1;
                $batsman1 = $batsman2;
                $batsman2 = $temp;
            }
        }
        ?>

        <!-- //SELECT STARTING -->
        <label for="select_match" class="form-label">Select Batsman to Play</label>
        <select class="  " name="batsman1" id="batsman1">

            <option value='0'> -- Select a Batsman --</option>
            <?php
            $sql = "SELECT * FROM players WHERE team_id = '$team_bat' ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $playerid = $row['player_id'];
                $playername = $row['player_name'];

                // Set the selected attribute based on the player's ID
                $selected1 = ($playerid == $batsman1) ? 'selected' : '';

                echo "<option value='$playerid' $selected1>$playername (Batsman)</option>";
            }

            ?>
        </select>

        <select class=" " name="batsman2" id="batsman2">
            <option value='0'> -- Select a Batsman --</option>
            <?php
            $sql = "SELECT * FROM players WHERE team_id = '$team_bat'";
            $result = mysqli_query($conn, $sql);


            while ($row = mysqli_fetch_assoc($result)) {
                $playerid = $row['player_id'];
                $playername = $row['player_name'];

                // Set the selected attribute based on the player's ID
                $selected2 = ($playerid == $batsman2) ? 'selected' : '';

                echo "<option value='$playerid' $selected2>$playername (Non Striker)</option>";
            }
            ?>
        </select>

        <?php
        $sql = "SELECT batsman, non_sriker, bowler FROM match_details WHERE match_id = $select_match ORDER BY match_details_id desc";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $pre_bowler = $row['bowler'];
        }

        ?>

        <div class="my-3">
            <label for="bowler" class="form-label">Select Bowler to Bowl</label>
            <?php

            $sql = "SELECT * FROM players WHERE team_id = '$team_bowl' ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $bowlerid = $row['player_id'];

                $sql = "SELECT * FROM match_details WHERE match_id = $select_match ORDER BY match_details_id desc";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                
                if ($row['bowl_per_over'] !== 6) {
                    $selected = ($bowlerid == $pre_bowler) ? 'selected' : '';
                } else {
                    $selected = '';
                }
                
                echo $pre_bowler;
                echo "SELECT * FROM match_details WHERE match_id = $select_match ORDER BY match_details_id desc";
                exit;
                echo '<option value="' . $bowlerid . '" ' . $selected . '>' . $row['player_name'] . '</option>';
            }
            ?>
            <select class=" " name="bowler" id="bowler" required>
                <option value='0'> -- Select a Bowler --</option>
                <?php
                $sql = "SELECT * FROM players WHERE team_id = '$team_bowl' ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $bowlerid = $row['player_id'];

                    $sql = "SELECT * FROM match_details WHERE match_id = $select_match ORDER BY match_details_id desc";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);

                    if ($row['bowl_per_over'] !== 6) {
                        $selected = ($bowlerid == $pre_bowler) ? 'selected' : '';
                    } else {
                        $selected = '';
                    }

                    echo '<option value="' . $bowlerid . '" ' . $selected . '>' . $row['player_name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <hr>
        <!-- Ball by Ball .php -->
        <!-- <div class="ballbyball" id="ballbyball">
        </div> -->

    </div>
</div>
<hr>
<div class="bat">
    <?php
    $sql = "SELECT * from team WHERE team_id = $team_bat";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $teambat = $row['team_name'];
    ?>
    <h5 style="margin-left: 10px; padding-bottom: 5px; margin-bottom: 20px; "><?php echo $teambat;
                                                                                echo " (Bat)";
                                                                                ?></h5>
    <div class="container fcontainer">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th scope="col">Player</th>
                    <th scope="col">Player Desig</th>
                    <th scope="col">Status</th>
                    <th scope="col">6's</th>
                    <th scope="col">4's</th>
                    <th scope="col">S.R</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $srno = 0;
                $sql = "Select * from `players` where `team_id` = '$team_bat'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $srno = $srno + 1;
                        echo "<tr>
                            <td>" . $row['player_name'] . "</td>
                            <td>" . $row['player_desig'] . "</td>
                            <td > " ?><select class=" " name="status" id="status">
                            <option value='0'> -- Select --</option>
                            <option value="Yet to Bat">Yet to Bat</option>
                            <option value="Batting">Batting</option>
                            <option value="Runner Bat">Runner Bat</option>
                            <option value="Out">Out</option>
                        </select></td>
                        </select></td>
                        <?php
                        $sql = "SELECT * FROM match_details";
                        ?>
                        <td>0</td>

                        <td>0</td>
                        <td>0</td>
                <?php "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="left">
    <?php
    $sql = "SELECT * from team WHERE team_id = $team_bowl";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $teambowl = $row['team_name'];

    ?><h5 style="    
        background-color: var(--header);
        height: 45px;
        margin-top: 40px;
        padding-left: 10px;
        padding-bottom: 5px;
        padding-top: 13px;
        margin-bottom: 20px;
        "><?php echo $teambowl;

            echo " (Bowl)";
            ?></h5>
    <div class="container fcontainer">
        <table id="myTable1" class="table">
            <thead>
                <tr>
                    <th scope="col">Player</th>
                    <th scope="col">Player Desig</th>
                    <th scope="col">Status</th>
                    <th scope="col">O</th>
                    <th scope="col">M</th>
                    <th scope="col">W</th>
                    <th scope="col">Avg</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $srno = 0;
                $sql = "SELECT * FROM `players` WHERE `team_id` = '$team_bowl' AND (`player_desig` = 'Bowler' OR `player_desig` = 'All Rounder')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $srno = $srno + 1;
                        echo "<tr>
                            <td >" . $row['player_name'] . "</td>
                            <td >" . $row['player_desig'] . "</td>
                            <td > " ?><select class=" " name="status" id="status">
                            <option value='0'> -- Select --</option>
                            <option value="Bowling">Bowling</option>
                        </select>

                        <?php "</td>" ?>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    ballbyball();

    function ballbyball() {
        var select_match = $('#select_match').val();
        var batsman1 = $('#batsman1').val();
        var batsman2 = $('#batsman2').val();
        var bowler = $('#bowler').val();

        var request = $.ajax({
            url: 'ballbyball.php',
            type: "POST",
            data: {
                select_match: select_match,
                batsman1: batsman1,
                batsman2: batsman2,
                bowler: bowler
            },
            dataType: "html",
        });
        request.done(function(html) {
            // alert(html);
            $("#ballbyball").html(html);
        });
        request.fail(function(jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });

    }
</script>