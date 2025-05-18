<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use proper SQL syntax (no quotes around table name)
    $sql = "DELETE FROM php1 WHERE id = $id";

    // Run the query
    $conn->query($sql);

    // Redirect back to index after deleting
    header('Location: index.php');
    exit;
}
?>