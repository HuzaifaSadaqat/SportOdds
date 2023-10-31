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
  $id = $_GET['deleteumpire_id'];
  
if(!empty($id))
    {
        $sql = "DELETE from `umpire` where umpire_id= $id";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            // echo 'Deleted succe/ssfly';
            header('location:createUmpire.php');
        }
    }
