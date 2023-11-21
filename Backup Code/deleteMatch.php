<?php
//connectong to db
$servername = "localhost";
$username = "root";
$password = "";
$database = "sportodds";

//create conncetion
$conn = mysqli_connect($servername, $username, $password, $database);

//die if !connected
if(!$conn)
{
    die("Sorry Connection unsuccessful". mysqli_connect_error());
}
  $id = $_GET['deletematch_id'];
  
if(!empty($id))
    {
        $sql = "DELETE from `m_atch` where match_id= $id";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            // echo 'Deleted succe/ssfly';
            header('location:createMatch.php');
        }
    }
