<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Art Shop</title>
</head>
<?php 
include_once "includes/conn.php";
$query = "SELECT * FROM art";
$result = $conn->query($query);
$conn->close();
?>
<body>
    <?php include_once "includes/header.php"; ?>
    <main class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 h-100">
            <?php 
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
                if($available == "1") {
            ?>
            <div class="mb-5">
                <div class="bg-light border p-3 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <p>Name:            <?php echo $paintingName ?></p>
                        <p>Completion Date: <?php echo $completionDate ?></p>
                        <p>Width:           <?php echo $width . " (mm)" ?></p>
                        <p>Height:          <?php echo $height . " (mm)"?></p>
                        <p>Price:           <?php echo "£".$price ?></p>
                        <p>Description:     <?php echo $description ?></p>
                    </div>
                    <div class="text-center">
                        <a href="form.php?pId=<?php echo $paintingId?>" class="btn btn-primary text-center w-100">Order</a>
                    </div>
                </div>
            </div>
            <?php 
            }}}
            ?>
        </div>
    </main>
    <!--
<footer>
    <nav class="pagination" aria-label="Art results navigation">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</footer>
-->
</body>
</html>