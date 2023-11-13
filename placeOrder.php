<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Order Placed</title>
</head>
<?php
include_once "includes/conn.php";
?>
<body>
<?php include_once "includes/header.php"; ?>
<main class="container d-flex align-items-center flex-column mt-5 pt-5">
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $artId          = isset($_POST["artId"]) ? $_POST["artId"] : "";
        $name           = $_POST["name"];
        $phoneNumber    = $_POST["phoneNumber"];
        $email          = $_POST["email"];
        $postcode       = $_POST["postcode"];
        $addressLine1   = $_POST["addressLine1"];
        $addressLine2   = $_POST["addressLine2"];
        $city           = $_POST["city"];

        // Escape Strings
        $name = $conn->real_escape_string($name);
        $phoneNumber = $conn->real_escape_string($phoneNumber);
        $email = $conn->real_escape_string($email);
        $postcode = $conn->real_escape_string($postcode);
        $addressLine1 = $conn->real_escape_string($addressLine1);
        $addressLine2 = $conn->real_escape_string($addressLine2);
        $city = $conn->real_escape_string($city);

        $nameExp        = '/^[A-Za-z]+ [A-Za-z]*$/';
        $phoneNumberExp = '/^(\+|\d)\d*$/';
        $emailExp       = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
        $postcodeExp    = '/^[a-zA-Z\d]+\s[a-zA-Z\d]*$/';
        $addressExp     = '/^$|\d\s[a-zA-Z\s]*$/';
        $cityExp        = '/^[A-Z]?[a-z]*$/';

        $nameResult              = preg_match($nameExp, $name);
        $phoneNumberResult       = preg_match($phoneNumberExp, $phoneNumber);
        $emailResult             = preg_match($emailExp, $email);
        $postcodeResult          = preg_match($postcodeExp, $postcode);
        $addressLine1Result      = preg_match($addressExp, $addressLine1);
        $addressLine2Result      = preg_match($addressExp, $addressLine2);
        $cityResult              = preg_match($cityExp, $city);

        if(empty($addressLine2)) {
            $addressLine2 = "null";
        }

        if($nameResult && $phoneNumberResult && $emailResult && $postcodeResult && $addressLine1Result && $addressLine2Result && $cityResult) {
            if(!isset($_SESSION['cart'])) {
                $query1 = "INSERT INTO orders VALUES ('$name', $phoneNumber, '$email', '$postcode', '$addressLine1', '$addressLine2', '$city', $artId);";
                $query2 = "UPDATE art SET available = 0 WHERE id = $artId;";
                $conn->query($query1);
                $conn->query($query2);
            }
            else {
                $idArray = $_SESSION['cart'];
                foreach($idArray as $artId) {
                    $query1 = "INSERT INTO orders VALUES ('$name', $phoneNumber, '$email', '$postcode', '$addressLine1', '$addressLine2', '$city', $artId);";
                    $query2 = "UPDATE art SET available = 0 WHERE id = $artId;";
                    $conn->query($query1);
                    $conn->query($query2);
                }
            }
            unset($_SESSION['cart']);
            header("Location: ../orderSuccess.php");
        }
        else {
            header("Location: ../orderFailure.php");
        }
    }
?>
</main>
</body>
</html>
