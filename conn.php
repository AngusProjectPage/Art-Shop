<?php
$servername = "devweb2023.cis.strath/phpmyadmin";
$username = "fmb21117";
$password = "AhyieGhi2Eer";
$dbname = "fmb21117";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->close();
?> 