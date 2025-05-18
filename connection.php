<?php
$servername = "sql103.infinityfree.com";
$username = "if0_39015672";
$password = "Re9tdMYu2jOkY12";
$db_name = "if0_39015672_eykorban";

$conn = new mysqli($servername, $username, $password, $db_name,3306);

if ($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
}


echo "";
?>