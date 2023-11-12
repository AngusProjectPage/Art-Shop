<?php session_start();?>
<?php include "conn.php"; ?>
<?php
  if($_SERVER['REQUEST_METHOD'] === "POST") {
      $password = $_POST['password'];

      //Escape String
      $password = $conn->real_escape_string($password);

      $query = "SELECT password FROM admin";
      $result = $conn->query($query);

      $row = $result->fetch_assoc();
      $dbUserPassword = $row['password'];

      $hashFormat = "$2y$10$";
      $salt = "thisisthesalthere12345";
      $hashAndSalt = $hashFormat . $salt;

      $encryptedPassword = crypt($password, $hashAndSalt);

      if(hash_equals($dbUserPassword, $encryptedPassword)) {
          $_SESSION['userRole'] = "admin";
      }
      header("Location: ../admin.php?passwordIncorrect");
  }

