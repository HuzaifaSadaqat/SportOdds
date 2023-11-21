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

    $sql1 = "SELECT * FROM match_details WHERE match_id = $select_match ORDER BY match_details_id desc";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    if ($row1) {
        $total_overs = $row1['total_overs'];
    }

    $sql = "SELECT * FROM match_details WHERE match_id = $select_match ORDER BY match_details_id desc";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $overs = $row['overs'];
        $bowls = $row['bowl_per_over'];
        $runType = $row['typeofrun'];
        if ($overs === NULL && $bowls === NULL) {
            $overs = 0;
            $bowls = 1;
        } elseif ($bowls == 6 && $runType == 'Batted') {
            $bowls = 1;
            $overs++;
        } elseif ($runType == 'Batted') {
            $bowls++;
        }
    }
    ?>

    <div style="border: 5px solid var(--body-color);" class="container my-3">
        <h5 style="padding-top: 5px;">Ball <?php echo $bowls ?> of Over <?php echo $overs ?></h5>
        <div class="" id="ballData">
            <div class="mb-3 my-3">
                <input type="hidden" id="match_id" name="match_id" value="<?php echo $select_match; ?>">
                <input type="hidden" id="bowl" name="bowl" value="<?php echo $bowls; ?>">
                <input type="hidden" id="over" name="over" value="<?php echo $overs; ?>">
                <input type="hidden" id="batsman1" name="batsman1" value="<?php echo $batsman1; ?>">
                <input type="hidden" id="batsman2" name="batsman2" value="<?php echo $batsman2; ?>">
                <input type="hidden" id="bowler" name="bowler" value="<?php echo $bowler; ?>">

                <label for="team_name" name="team_name" class="form-label">Score</label>
                <select style="border-radius: 5px;" class=" " name="score" id="score" autofocus required>
                    <option disabled selected value> -- Select-- </option>
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
                <label for="team_name" name="team_name" class="form-label">Type of Runs</label>
                <select style="border-radius: 5px;" class=" " name="typeofruns" id="typeofruns" required>
                    <option disabled selected value> -- Select-- </option>
                    <option value="Batted">Batted</option>
                    <option value="Wide">Wide</option>
                    <option value="No Ball">No Ball</option>
                    <option value="Extra">Extra</option>
                    <option value="Extra + Batted">Extra + Batted</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="team_name" name="team_name" class="form-label">If Wicket</label>
                <select style="border-radius: 5px;" class=" " name="outtype" id="outtype">
                    <option disabled selected value> -- Select -- </option>
                    <option value="Bowled">Bowled</option>
                    <option value="Catch">Catch</option>
                    <option value="LBW">LBW</option>
                    <option value="Run Out">Run Out</option>
                    <option value="Stumps">Stumps</option>
                    <option value="Hit Wicket">Hit Wicket</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-primary" onclick="ball_data()">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    function ball_data() {
        var select_match = $("#match_id").val();
        var bowler = $("#bowler").val();
        var bowls = $("#bowl").val();
        var overs = $("#over").val();
        var score = $("#score").val();
        var typeofruns = $("#typeofruns").val();
        var outtype = $("#outtype").val();
        var batsman1 = $("#batsman1").val();
        var batsman2 = $("#batsman2").val();

        $.ajax({
            type: 'POST',
            url: 'insertBallData.php',
            data: {
                select_match: select_match,
                bowler: bowler,
                bowls: bowls,
                overs: overs,
                score: score,
                typeofruns: typeofruns,
                outtype: outtype,
                batsman1: batsman1,
                batsman2: batsman2
            },
            success: function(response) {
                ballbyball();
                tossDetail();
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error('Request failed:', xhr.status, error);
            }
        });
    }
</script>