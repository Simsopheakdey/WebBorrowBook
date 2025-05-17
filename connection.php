
<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "php";

$conn = new mysqli($servername, $username, $password, $db_name,3306);

if ($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
}

echo "";
?>
