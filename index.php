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
include "conn.php";
$sql = "SELECT name, completionDate, width, height, price, description FROM art";
$result = $conn->query($sql);
$conn->close();
?>
<body>
    <?php include_once "header.php"; ?>
    <main class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
            <?php 
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $paintingName   = $row["name"];
                $completionDate = $row["completionDate"];
                $width          = $row["width"];
                $height         = $row["height"];
                $price          = $row["price"];
                $description    = $row["description"];
            ?>
            <form action="form.php" class="col" method="get">
                <div class="bg-light border p-3">
                    <p>Name:            <?php echo $paintingName ?></p>
                    <p>Completion Date: <?php echo $completionDate ?></p>
                    <p>Width:           <?php echo $width ?></p>
                    <p>Height:          <?php echo $height ?></p>
                    <p>Price:           <?php echo "£".$price ?></p>
                    <p>Description:     <?php echo $description ?></p>
                    <div class="text-center">
                        <button name="orderArt" class="btn btn-primary text-center w-100">Order</button>
                    </div>
                </div>
            </form>
            <?php 
            }}
            ?>
        </div>
    </main>
<footer>
    <nav class="pagination" aria-label="Art results navigation">
        <ul class="pagination">

        </ul>
    </nav>
</footer>
</body>
</html>