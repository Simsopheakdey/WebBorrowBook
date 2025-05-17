<?php

$servername = "sql311.infinityfree.com";
$username = "if0_39008007";
$password = "FEOhYiqc23d";
$db_name = "if0_39008007_php1";

$conn = new mysqli($servername, $username, $password, $db_name,3306);

if ($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
}

echo "";
?>