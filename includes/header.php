<?php
if(isset($_GET['pId'])) {
    $pId = $_GET['pId'];
    if(isset($_SESSION['cart'])) {
        $numElements = sizeof($_SESSION['cart']) + 1;
        if($numElements < 9) {
            array_push($_SESSION['cart'], $pId);
            $maxBasket = '';
        }
        else {
            $maxBasket = 'disabled';
        }
    }
    else {
        $_SESSION['cart'] = array($pId);
        $numElements = 1;
        $maxBasket = '';
    }
}
else {
    if(!isset($_SESSION['cart'])) {
        $maxBasket = '';
        $numElements = 0;
    }
    else {
        $numElements = sizeof($_SESSION['cart']) + 1;
        if($numElements < 9) {
            $maxBasket = '';
        }
        else {
            $maxBasket = 'disabled';
        }
    }
}
echo '
<header class="mb-4 sticky-top">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container  justify-content-between">
                <a href="./index.php" class="navbar-brand"><img src="./Images/logo2.png" alt="Art shop logo" width="61" height="59" class="d-inline-block align-text-center">Art Shop</a>
                <button type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#navbarNav" 
                        class="navbar-toggler"
                    >
                        <span class="navbar-toggler-icon"></span>
                </button>
               
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li>
                            <a href="./basket.php" class="nav-link">Basket <i class="fa-solid fa-lg fa-cart-shopping numElements"><span>'; echo $numElements; echo '</span></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="./admin.php" class="nav-link">Admin Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
';
