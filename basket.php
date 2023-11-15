<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "./includes/head.php"; ?>
    <title>Basket</title>
</head>
    <?php
        require_once "./includes/conn.php";
        require_once "./includes/numElements.php";
    ?>
<body>
    <?php require_once "./includes/header.php"; ?>
    <main class="container">
        <?php if (isset($_SESSION['cart'])) { ?>
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
                if(isset($_SESSION['cart'])) {
                ?>
                    <section>
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
                                $paintingName   = $row["name"];
                                $completionDate = $row["completionDate"];
                                $width          = $row["width"];
                                $height         = $row["height"];
                                $price          = $row["price"];
                                $description    = $row["description"];
                                $imageBLOB      = $row["image"];

                                // Convert date from SQL format to British format
                                $completionDate = DateTime::createFromFormat('Y-m-d', $completionDate);
                                $completionDate = $completionDate->format('d/m/Y');
                        ?>
                        <div class="row mb-3">
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
        <?php }
        else { ?>
        <div class="text-center">
            <i class="fa-solid fa-exclamation fa-6x text-danger"></i>
            <div>
                <h1>You need to either order a singular item or add items to basket first.</h1>
                <p>Please return to homescreen.</p>
            </div>
        </div>
        </main>
        <?php }  ?>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>