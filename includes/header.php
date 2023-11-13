<?php 
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
                        <li class="nav-item">
                            <a href="./admin.php" class="nav-link">Admin Login</a>
                        </li>
                        <li>
                            <a href="./basket.php" class="nav-link">Basket</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
';
