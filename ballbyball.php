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
<div class="ballbyball" id="ballbyball">
    <?php
    $select_match = $_POST['select_match'];
    $batsman1 = $_POST['batsman1'];
    $batsman2 = $_POST['batsman2'];
    $bowler = $_POST['bowler'];


    $sql = "SELECT * FROM match_details WHERE match_id = $select_match ORDER BY match_details_id desc";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql = "SELECT * FROM m_atch WHERE match_id = $select_match";
    $result2 = mysqli_query($conn, $sql);
    $row2 = mysqli_fetch_assoc($result2);
    $tOvers = $row2['overs'];
    $tOvers--;

    if ($row) {
        $overs = $row['overs'];
        $bowls = $row['bowl_per_over'];

        if ($overs == $tOvers && $bowls == '6') {
            $bowls = 0;
            $overs++; ?>
            <script>
                $("#submit").html('<span class="innings_ended">Innings Ended</span>');
            </script>
    <?php
        } elseif ($overs === NULL && $bowls === NULL) {
            $overs = 0;
            $bowls = 1;
        } elseif ($bowls == 6) {
            $bowls = 1;
            $overs++;
        } else {
            $bowls++;
        }
    } else {
        $overs = 0;
        $bowls = 1;
    }
    ?>

    <div style="border: 5px solid var(--body-color);" class="">
        <h5 style="padding-top: 5px;">Ball <?php echo $bowls ?> of Over <?php echo $overs ?></h5>
        <div class="" id="ballData">
            <div class="mb-3 my-3">
                <input type="hidden" id="match_id" name="match_id" value="<?php echo $select_match; ?>">
                <input type="hidden" id="bowl" name="bowl" value="<?php echo $bowls; ?>">
                <input type="hidden" id="over" name="over" value="<?php echo $overs; ?>">
                <input type="hidden" id="batsman1" name="batsman1" value="<?php echo $batsman1; ?>">
                <input type="hidden" id="batsman2" name="batsman2" value="<?php echo $batsman2; ?>">
                <input type="hidden" id="bowler" name="bowler" value="<?php echo $bowler; ?>">

                <label for="team_name" name="team_name" class="col-2 form-label">Score</label>
                <select class="chosen-select  col-4 select_pad" name="score" id="score" autofocus required>
                    <option disabled selected value> -- Select-- </option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="team_name" name="team_name" class="col-2 form-label">Type of Runs</label>
                <select class="chosen-select  col-4 select_pad" name="typeofruns" id="typeofruns" required>
                    <option disabled selected value> -- Select-- </option>
                    <option value="Batted">Batted</option>
                    <option value="Wide">Wide</option>
                    <option value="No Ball">No Ball</option>
                    <option value="Extra">Extra</option>
                    <option value="Extra + Batted">Extra + Batted</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="team_name" name="team_name" class="col-2 form-label">If Wicket</label>
                <select class="chosen-select  col-4 select_pad" name="outtype" id="outtype">
                    <option disabled selected value> -- Select -- </option>
                    <option value="Bowled">Bowled</option>
                    <option value="Catch">Catch</option>
                    <option value="LBW">LBW</option>
                    <option value="Run Out">Run Out</option>
                    <option value="Stumps">Stumps</option>D
                    <option value="Hit Wicket">Hit Wicket</option>
                </select>
            </div>
            <div class="" id="submit">
                <button type="submit" class="btn btn-primary btn-sm submit_btn" onclick="ball_data()">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    function ball_data() {
        var select_match = $("#match_id").val();
        var bowls = $("#bowl").val();
        var bowler = $("#bowler").val();
        var overs = $("#over").val();
        var score = $("#score").val();
        var typeofruns = $("#typeofruns").val();
        var outtype = $("#outtype").val();
        var batsman1 = $("#batsman1").val();
        var batsman2 = $("#batsman2").val();

        if (!batsman1 || batsman1 == 0) {
            alert("Batsman field is required. Please select a value.");
            return;
        }
        if (!batsman2 || batsman2 == 0) {
            alert("Non striker field is required. Please select a value.");
            return;
        }
        if (!bowler || bowler == 0) {
            alert("Bowler field is required. Please select a value.");
            return;
        }
        if (!score) {
            alert("Score field is required. Please select a value.");
            return;
        }
        if (!typeofruns) {
            alert("Type of Runs field is required. Please select a value.");
            return;
        }
        $.ajax({

            type: 'POST',
            url: 'insertBallData.php',

            data: {
                select_match: select_match,
                bowls: bowls,
                bowler: bowler,
                overs: overs,
                score: score,
                typeofruns: typeofruns,
                outtype: outtype,
                batsman1: batsman1,
                batsman2: batsman2
            },
            success: function(response) {
                // alert(response);
                ballbyball();
                tossDetail();
            },
            error: function(xhr, status, error) {
                console.error('Request failed:', xhr.status, error);
            }
        });
    }
    $(document).ready(function() {
        $('.chosen-select').chosen();
    });
</script>

</script>