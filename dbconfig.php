<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = mysqli_connect( $servername, $username, $password, $dbname );

if (mysqli_connect_errno()){

    die("not connecte". mysqli_connect_error());

}

?>