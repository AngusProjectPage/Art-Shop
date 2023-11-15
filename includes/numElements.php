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

