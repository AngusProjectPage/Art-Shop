<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <title>Order Form</title>
</head>
<?php
include_once "./includes/conn.php"; ?>
<body>
<?php include_once "./includes/header.php"; ?>
    <main class="container">
        <form id="placeOrder" action="placeOrder.php" class="mt-3 mb-5" method="post">
            <section class="mb-5">
                <h2>Contact Information</h2>
                <p>Required fields are followed by <span aria-label="required">*</span>.</p>
                <p class="form-group">
                    <label for="name">Name: <span aria-label="required">*</span></label>
                    <input name="name" type="text" id="name" class="form-control">
                    <small></small>
                </p>
                <p class="form-group">
                    <label for="phoneNumber">Phone Number: <span aria-label="required">*</span></label>
                    <input name="phoneNumber" type="text" id="phoneNumber" class="form-control">
                    <small></small>
                </p>
                <p class="form-group">           
                    <label for="email">Email: <span aria-label="required">*</span></label>
                    <input name="email" type="text" id="email" class="form-control">
                    <small></small>
                </p>
                <p class="form-group">
                    <label for="postcode">Postcode: <span aria-label="required">*</span></label>
                    <input name="postcode" type="text" id="postcode" class="form-control">
                    <small></small>
                </p>
                <p class="form-group">
                    <label for="addressLine1">Address Line 1: <span aria-label="required">*</span></label>
                    <input name="addressLine1" type="text" id="addressLine1" class="form-control">
                    <small></small>
                </p>
                <p class="form-group">
                    <label for="addressLine2">Address Line 2: </label>
                    <input name="addressLine2" type="text" id="addressLine2" class="form-control">
                    <small></small>
                </p>
                <p class="form-group">
                    <label for="city">City: <span aria-label="required">*</span></label>
                    <input name="city" type="text" id="city" class="form-control">
                    <small></small>
                </p>
            </section>
                <?php
                if(!isset($_SESSION['cart'])) {
                ?>
                    <section class="mb-5">
                    <h2>Painting Details</h2>
                    <?php
                    $paintingId = $_GET["pId"];
                    $query = "SELECT name, completionDate, width, height, price, description, image FROM art WHERE id = $paintingId LIMIT 1";
                    $result = $conn->query($query);
                    $conn->close();
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $row = $result->fetch_assoc();
                        $paintingName   = $row["name"];
                        $completionDate = $row["completionDate"];
                        $width          = $row["width"];
                        $height         = $row["height"];
                        $price          = $row["price"];
                        $description    = $row["description"];
                        $imageBLOB      = $row["image"];
                    }
                    ?>
                    <input type="hidden" name="artId" value="<?php echo $paintingId?>">
                    <div class="bg-light border p-3">
                        <p>Name:            <?php echo $paintingName ?></p>
                        <p>Completion Date: <?php echo $completionDate ?></p>
                        <p>Width:           <?php echo $width . " (mm)" ?></p>
                        <p>Height:          <?php echo $height . " (mm)"?></p>
                        <p>Price:           <?php echo "£".$price ?></p>
                        <p>Description:     <?php echo $description ?></p>
                    </div>
                </section>
                <input type="hidden" name="artId" value="<?php echo $paintingId ?>">
                <section class="mb-3">
                    <h2>Painting</h2>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($imageBLOB); ?>" class="img-fluid" alt="Painting displayed">
                </section>
            <?php }
                else { ?>
                    <section class="mb-5">
                        <h2>Painting Details</h2>
                        <?php
                        $idString = '';
                        $idArray = $_SESSION['cart'];
                        $idString = implode(",", $idArray);

                        $idString = '(' . $idString . ')';
                        $query = "SELECT name, completionDate, width, height, price, description, image FROM art WHERE id IN $idString";
                        $result = $conn->query($query);
                        $conn->close();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // output data of each row
                                $paintingName = $row["name"];
                                $completionDate = $row["completionDate"];
                                $width = $row["width"];
                                $height = $row["height"];
                                $price = $row["price"];
                                $description = $row["description"];
                                $imageBLOB = $row["image"];
                        ?>
                        <div class="row">
                            <div class="border bg-light p-3 col-6">
                                <h4>Name:            <?php echo $paintingName ?></h4>
                                <h4>Completion Date: <?php echo $completionDate ?></h4>
                                <h4>Width:           <?php echo $width . " (mm)" ?></h4>
                                <h4>Height:          <?php echo $height . " (mm)"?></h4>
                                <h4>Price:           <?php echo "£".$price ?></h4>
                                <h4>Description:     <?php echo $description ?></h4>
                            </div>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($imageBLOB); ?>" class="img-thumbnail col-6" alt="Painting displayed">
                        </div>
                    </section>
               <?php }}}?>
            <section class="mt-3">
                <p>
                  <button type="submit" name="placeOrder" class="btn btn-primary">Place Order</button>
                </p>
            </section>              
        </form>
    </main>
<script src="js/app.js"></script>
</body>
</html>