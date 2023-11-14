<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Admin</title>
</head>
<?php
include_once "includes/conn.php";
include_once "includes/removeOrder.php";
?>
<?php
// Updates basket variable with a max of nine items
if(isset($_GET['pId'])) {
    $pId = $_GET['pId'];
    if(isset($_SESSION['cart'])) {
        $numElements = sizeof($_SESSION['cart']);
        if($numElements < 9) {
            $numElements = sizeof($_SESSION['cart']) + 1;
            array_push($_SESSION['cart'], $pId);
        }
    }
    else {
        $_SESSION['cart'] = array($pId);
        $numElements = 1;
    }
}
else {
    if(!isset($_SESSION['cart'])) {
        $numElements = 0;
    }
    else {
        $numElements = sizeof($_SESSION['cart']);
    }
}
?>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container  justify-content-between">
            <a href="./index.php" class="navbar-brand text-light"><img src="./Images/logo2.png" alt="Art shop logo" width="61" height="59" class="d-inline-block align-text-center">Art Shop</a>
            <button type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    class="navbar-toggler"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li>
                        <a href="./basket.php" class="nav-link text-light">Basket <i class="fa-solid fa-lg fa-cart-shopping numElements"><span><?php echo $numElements; ?></span></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="./admin.php" class="nav-link text-light">Admin Login</a>
                    </li>
                <?php
                if(isset($_SESSION['cart'])) {
                    echo '
                    <li class="nav-item">
                        <a href="./destroySession.php" class="nav-link text-light">Reset Basket!</a>
                    </li>
                    '; };
                ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php
// If not logged in display login form
if (!isset($_SESSION['userRole'])) {
    ?>
<main class="container mt-5">
    <form id="login" action="./includes/login.php" class="mt-3 mb-4" method="post">
        <section class="mb-4">
            <h2>Admin Login</h2>
            <p>Required fields are followed by <span aria-label="required">*</span>.</p>
            <p class="form-group">
                <?php if(isset($_GET['passwordIncorrect'])) { ?>
                    <label class="text-danger" for="password">Password: <span aria-label="required">*</span></label>
                    <input name="password" type="password" id="password" class="form-control border-error">
                    <small class="text-danger">Incorrect Password: Please Try Again</small>
                <?php } else { ?>
                    <label for="password">Password: <span aria-label="required">*</span></label>
                    <input name="password" type="password" id="password" class="form-control">
                    <small></small>
                <?php } ?>
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
    <div class="row gx-0 admin-main-height mw-100">
        <!-- Side navigation bar -->
        <?php include_once "includes/sidenav.php";?>

        <!-- Admin main content -->
        <main class="col-11 col-sm-11 col-md-9 col-lg-8 pt-5 ps-3 pe-3 table-responsive main-content">
            <?php if(isset($_GET['edit']) && ($_GET['edit'] == "True")) {
                include_once "includes/editOrder.php";
            }
            else {
                include_once "includes/addPainting.php";
            } ?>
        </main>
    </div>
<?php } ?>
<script src="js/adminLogin.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>