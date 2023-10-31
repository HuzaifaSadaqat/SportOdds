<?php
session_start();

//conn db        
$servername = "localhost";
$username = "root";
$password = "";
$database = "class_activity";

//create conncetion
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry Connection unsuccessful" . mysqli_connect_error());
} else {
    // echo'Connection was successful<br>';
}

?>