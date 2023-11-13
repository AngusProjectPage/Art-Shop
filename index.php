<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="./styles/style.css" rel="stylesheet">
    <title>Art Shop</title>
</head>
<?php
// Used https://www.tutorialspoint.com/php/php_file_uploading.htm for inspiration on file uploading
include_once "includes/conn.php";
$postCountQuery = "SELECT * FROM art WHERE available = 1";
$result = $conn->query($postCountQuery);
$perPage = 12;
if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
if($page == 1) {
    $queryPage = 0;
    $previousPage = 1;
    $disabledClass1 = 'disabled';
} else {
    $disabledClass1 = '';
    $previousPage = $page-1;
    $queryPage = ($page * $perPage) - $perPage;
}

$count = $result->num_rows;
$count = ceil($count / $perPage); // This gives the number of pages
?>
<body>
    <?php include_once "includes/header.php"; ?>
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
                        <a href="./basket.php?pId=<?php echo $paintingId?>" class="btn btn-primary text-center w-50 me-3 <?php echo $maxBasket ?>">Order</a>
                        <a href="./index.php?pId=<?php echo $paintingId?>" class="btn btn-secondary text-center w-50 <?php if (isset($_GET['pId'])) {
                            if(isset($_SESSION['cart'])) {
                                $idArray = $_SESSION['cart'];
                                foreach($idArray as $artId) {
                                    if ($artId === $_GET['pId']) {
                                        echo "disabled";
                                        break;
                                    }
                                }
                            }
                        } echo $maxBasket ?>">Add to basket</a>
                    </div>
                </div>
            </div>
            <?php 
            }}
            $conn->close();
            ?>
        </div>
    </main>
<footer>
    <nav aria-label="Art results navigation">
        <?php
            if($page < $count) {
                $nextPage = $page + 1;
                $disabledClass2 = '';
            }
            else {
                $nextPage = $page;
                $disabledClass2 = 'disabled';
            }
        ?>
        <ul class="pagination justify-content-center pb-3">
            <li class="page-item"><a class="page-link <?php echo $disabledClass1 ?>" href="index.php?page=<?php echo $previousPage?>">Previous</a></li>
            <li class="page-item"><a class="page-link <?php echo $disabledClass2 ?>" href="index.php?page=<?php echo $nextPage?>">Next</a></li>
        </ul>
    </nav>
</footer>
</body>
</html>