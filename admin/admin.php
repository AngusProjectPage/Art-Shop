<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Admin</title>
</head>
<?php
require_once "../includes/conn.php";
require_once "../includes/numElements.php";
require_once "./includes/removeOrder.php";
?>
<body>
<?php require_once "./includes/header.php"; ?>

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
        <?php require_once "./includes/sidenav.php";?>

        <!-- Admin main content -->
        <main class="col-11 col-sm-11 col-md-9 col-lg-8 pt-5 ps-3 pe-3 table-responsive main-content">
            <?php if(isset($_GET['edit']) && ($_GET['edit'] == "True")) {
                require_once "./includes/editOrder.php";
            }
            else {
                require_once "./includes/addPaintingForm.php";
            } ?>
        </main>
    </div>
<?php } ?>
<script src="../js/adminLogin.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>