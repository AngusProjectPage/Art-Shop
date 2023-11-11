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
<?php
if(isset($_POST["submitPainting"])) {
    $name           = $_POST["paintingName"];
    $completionDate = $_POST["completionDate"];
    $width          = $_POST["width"];
    $height         = $_POST["height"];
    $price          = $_POST["price"];
    $description    = $_POST["description"];

    $query = "INSERT INTO art VALUES (null, '$name', '$completionDate', '$width', '$height', '$price', '$description');";
    $conn->query($query);
?>
<main class="container d-flex align-items-center flex-column mt-5 pt-5">
    <div class="text-center">
        <i class="fa-regular fa-circle-check fa-6x text-success"></i>
        <div>
            <h1>Painting Uploaded</h1>
            <p>Painting <?php echo $name?> has been added to the database</p>
        </div>
    </div>
</main>
</body>
</html>
<?php } ?>
