<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container  justify-content-between">
            <a href="../index.php" class="navbar-brand text-light"><img src="../Images/logo2.png" alt="Art shop logo" width="61" height="59" class="d-inline-block align-text-center">Art Shop</a>
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
                        <a href="../basket.php" class="nav-link text-light">Basket <i class="fa-solid fa-lg fa-cart-shopping numElements"><span><?php echo $numElements; ?></span></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="./admin.php" class="nav-link text-light">Admin Login</a>
                    </li>
                    <?php
                    if(isset($_SESSION['cart'])) {
                        echo '
                        <li class="nav-item">
                            <a href="../destroySession.php" class="nav-link text-light basket-reset">Reset Basket!</a>
                        </li>
                        ';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>