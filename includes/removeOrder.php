<?php
include_once "includes/conn.php";
if(isset($_GET['artId'])) {
    $artId = $_GET['artId'];
    $query = "DELETE FROM orders WHERE artId = '$artId'";
    $conn->query($query);
}

