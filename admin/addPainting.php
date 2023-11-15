<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Add Painting</title>
</head>
<?php
require_once "../includes/conn.php";
require_once "../includes/numElements.php";
?>
<body>
<?php require_once "./includes/header.php"; ?>

<main class="container d-flex align-items-center flex-column mt-5 pt-5">
<?php
if(isset($_POST["submitPainting"])) {
    $errors= array();
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileTmp  = $_FILES['image']['tmp_name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    $extensions= array("jpeg","jpg","png");

    if(in_array($fileExtension,$extensions) === false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($fileSize > 1000000){
        $errors[]='File size must not exceed 1Mb';
    }

    $name           = $_POST["paintingName"];
    $completionDate = $_POST["completionDate"];
    $width          = $_POST["width"];
    $height         = $_POST["height"];
    $price          = $_POST["price"];
    $description    = $_POST["description"];

    if(empty($errors)==true){
        $image = file_get_contents($fileTmp);
        $image = $conn->real_escape_string($image);

        $query = "INSERT INTO art VALUES (null, '$name', '$completionDate', '$width', '$height', '$price', '$description', 1, '$image');";
        $result = !$conn->query($query);

        // This will only work if the server turns off errors
        if(!$result === false) {
            header("Location: ../orderFailure.php");
        }
        ?>
    <div class="text-center">
        <i class="fa-regular fa-circle-check fa-6x text-success"></i>
        <div>
            <h1>Painting Uploaded</h1>
            <p>Painting <?php echo $name?> has been added to the database</p>
        </div>
    </div>
   <?php }
    else { ?>
    <div class="text-center">
        <i class="fa-solid fa-exclamation fa-6x text-danger"></i>
        <div>
            <h1>Something Went Wrong</h1>
            <p>Please Try Again</p>
        </div>
    </div>
<?php }} else { ?>
    <div class="text-center">
        <i class="fa-solid fa-exclamation fa-6x text-danger"></i>
        <div>
            <h1>Something Went Wrong</h1>
            <p>Please Try Again</p>
        </div>
    </div>
<?php } ?>
</main>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

