<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "./includes/head.php"; ?>
    <title>Art Shop</title>
</head>
<?php
// Used https://www.tutorialspoint.com/php/php_file_uploading.htm for inspiration on file uploading
// Used https://www.javascripttutorial.net/javascript-dom/javascript-form-validation/ for inspiration on form validation
require_once "./includes/conn.php";
require_once "./includes/page.php";
require_once "./includes/numElements.php";
?>
<body>
    <?php require_once "./includes/header.php"; ?>
    <main class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 h-100">
            <?php
            $query = "SELECT * FROM art WHERE available = 1 LIMIT $queryPage, $perPage;";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $paintingId     = $row["id"];
                $paintingName   = $row["name"];
                $completionDate = $row["completionDate"];
                $width          = $row["width"];
                $height         = $row["height"];
                $price          = $row["price"];
                $description    = $row["description"];
                $available      = $row["available"];
                $imageBLOB      = $row["image"];
            ?>
            <div class="mb-5">
                <div class="card bg-light border p-3 h-100 d-flex flex-column justify-content-between">
                    <div class="mb-1">
                        <h5 class="cardTitle">Name: <?php echo $paintingName ?></h5>
                    </div>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($imageBLOB); ?>" class="img-thumbnail" alt="image">
                    <div class="text-center mt-3 d-flex justify-content-around">
                        <?php
                        $disable = '';
                        if(isset($_SESSION['cart'])) {
                            $idArray = $_SESSION['cart'];
                            foreach($idArray as $artId) {
                                if ($artId === $paintingId) {
                                    $disable = "disabled";
                                    break;
                                }
                            }
                        }
                        ?>
                        <a href="./basket.php?pId=<?php echo $paintingId?>" class="btn btn-primary text-center w-50 me-3 <?php echo ($numElements == 9) ? 'disabled' : $disable;?>">Order</a>
                        <a href="./index.php?pId=<?php echo $paintingId?>&page=<?php echo $page ?>" class="btn btn-secondary text-center w-50 <?php echo ($numElements == 9) ? 'disabled' : $disable;?>">Add to basket</a>
                    </div>
                </div>
            </div>
            <?php 
            }}
            $conn->close();
            ?>
        </div>
    </main>
    <?php include_once "./includes/footer.php"; ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>