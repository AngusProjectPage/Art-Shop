<?php
if(isset($_GET['artId'])) {
    $artId = $_GET['artId'];
    $query = "DELETE FROM orders WHERE artId = '$artId'";
    $conn->query($query);

    $query = "UPDATE art SET available = 1 WHERE id = '$artId'";
    $conn->query($query);
}

