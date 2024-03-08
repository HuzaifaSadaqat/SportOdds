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



$match_select = $_POST['select_match'];

$sql = "SELECT match_teamA, match_teamB,match_id from `m_atch` where match_id = $match_select";
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

    <option value="<?php echo $match_teamA ?>"><?php echo $row1['team_name']  ?></option>
    <option value="<?php echo $match_teamB ?>"><?php echo $row2['team_name']  ?></option>
<?php
}
?>