<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <title>Admin Login</title>
</head>
<?php
include_once "includes/conn.php";
session_start();
?>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container  justify-content-between">
            <a href="index.php" class="navbar-brand"><img src="./Images/logo2.png" alt="Art shop logo" width="61.33" height="58.6666" class="d-inline-block align-text-center">Art Shop</a>
            <button type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    class="navbar-toggler"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="admin.php" class="nav-link active">Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Side navigation bar -->
<div class="row gx-0 admin-main-height mw-100">
    <nav class="col-1 col-sm-1 col-md-3 col-lg-3 bg-secondary" style="max-width: 275px">
        <ul class="nav flex-column nav-pills nav-fill mt-5">
            <li class="nav-item">
                <a href="admin.php?edit=True" class="nav-link p-3 text-white"><i class="fa-solid fa-pencil pe-2"></i><span class="d-none d-md-inline">Order Options</span></a>
            <li class="nav-item">
                <a href="admin.php?edit=False" class="nav-link p-3 text-white"><i class="fa-solid fa-plus pe-2"></i><span class="d-none d-md-inline">Add Painting</span></a>
            </li>
        </ul>
    </nav>


    <main class="col-11 col-sm-11 col-md-7 col-lg-8 pt-5 ps-5 table-responsive">
        <table class="table table-striped table-primary table-hover table-bordered border-white align-middle">
            <thead>
            <tr>
                <th scope="col">Art ID</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Postcode</th>
                <th scope="col">Address Line 1</th>
                <th scope="col">Address Line 2</th>
                <th scope="col">City</th>
                <th>Remove Order</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_GET['edit']) && ($_GET['edit'] == "True")) {
                    $query = "SELECT * FROM orders";
                    $result = $conn->query($query);
                    while($row = $result->fetch_assoc()) {
                        $name         = $row['name'];
                        $phoneNumber  = $row['phoneNumber'];
                        $email        = $row['email'];
                        $postcode     = $row['postcode'];
                        $addressLine1 = $row['addressLine1'];
                        $addressLine2 = $row['addressLine2'];
                        $city         = $row['city'];
                        $artId        = $row['artId'];
            ?>
                        <tr>
                            <td><?php echo $artId  ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $phoneNumber ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $postcode ?></td>
                            <td><?php echo $addressLine1 ?></td>
                            <td><?php echo $addressLine2 ?></td>
                            <td><?php echo $city ?></td>
                            <td><a href="#">Remove Order</a></td>
                        </tr>
            <?php } ?>
            </tbody>
            <?php }
            else { ?>


            <?php } ?>
    </main>
</div>


<?php
// If not logged in display login form
if (isset($_SESSION['user_role'])) {
    ?>
<main class="container mt-5">
    <form action="admin.php" class="mt-3 mb-4" method="post">
        <section class="mb-4">
            <h2>Admin Login</h2>
            <p>Required fields are followed by <span aria-label="required">*</span>.</p>
            <p class="form-group">
                <label for="password">Password: <span aria-label="required">*</span></label>
                <input name="password" type="password" id="password" class="form-control">
            </p>
        </section>
        <section>
            <p>
                <button type="submit" name="submitLogin" class="btn btn-primary">Login</button>
            </p>
        </section>
    </form>
</main>
<?php }
// Else display admin features
else { ?>

<?php } ?>

</body>
</html>