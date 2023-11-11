<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Order Form</title>
</head>
<?php
include_once "includes/conn.php"; ?>
<body>
<?php include_once "includes/header.php"; ?>
    <main class="container">
        <form action="placeOrder.php" class="mt-3 mb-5" method="post">
            <section class="mb-4">
                <h2>Contact Information</h2>
                <p>Required fields are followed by <span aria-label="required">*</span>.</p>
                <p class="form-group">
                    <label for="name">Name: <span aria-label="required">*</span></label>
                    <input name="name" type="text" id="name" class="form-control">
                </p>
                <p class="form-group">
                    <label for="phoneNumber">Phone Number: <span aria-label="required">*</span></label>
                    <input name="phoneNumber" type="text" id="phoneNumber" class="form-control">
                </p>
                <p class="form-group">           
                    <label for="email">Email: <span aria-label="required">*</span></label>
                    <input name="email" type="text" id="email" class="form-control">
                </p>
                <p class="form-group">
                    <label for="postcode">Postcode: <span aria-label="required">*</span></label>
                    <input name="postcode" type="text" id="postcode" class="form-control">
                </p>
                <p class="form-group">
                    <label for="addressLine1">Address Line 1: <span aria-label="required">*</span></label>
                    <input name="addressLine1" type="text" id="addressLine1" class="form-control">
                </p>
                <p class="form-group">
                    <label for="addressLine2">Address Line 2: <span aria-label="required">*</span></label>
                    <input name="addressLine2" type="text" id="addressLine2" class="form-control">
                </p>
                <p class="form-group">
                    <label for="city">City: <span aria-label="required">*</span></label>
                    <input name="city" type="text" id="city" class="form-control">
                </p>
            </section>
            <section class="mb-3">
                <h2>Painting Details</h2>
                <?php
                $paintingId = $_GET["pId"];
                $query = "SELECT name, completionDate, width, height, price, description FROM art WHERE id = $paintingId LIMIT 1";
                $result = $conn->query($query);
                $conn->close();
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    $paintingName = $row["name"];
                    $completionDate = $row["completionDate"];
                    $width = $row["width"];
                    $height = $row["height"];
                    $price = $row["price"];
                    $description = $row["description"];
                }
                ?>
                <input type="hidden" name="artId" value="<?php echo $paintingId?>">
                <div class="bg-light border p-3">
                    <p>Name:            <?php echo $paintingName ?></p>
                    <p>Completion Date: <?php echo $completionDate ?></p>
                    <p>Width:           <?php echo $width ?></p>
                    <p>Height:          <?php echo $height ?></p>
                    <p>Price:           <?php echo "£".$price ?></p>
                    <p>Description:     <?php echo $description ?></p>
                <div>
            </section>
            <section>
                <p>
                  <button type="submit" name="placeOrder" class="btn btn-primary">Place Order</button>
                </p>
            </section>              
        </form>
    </main>
</body>
</html>