<?php

session_start();
$_SESSION['pas_verify_error'] = "";
$_SESSION['login_message'] = "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pax & Krem | Mobile Store</title>
    <link rel="icon" type="image" href="images/logo.png" />
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,300;1,200&family=Raleway:wght@300&family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- <script src="js/main.js"></script> -->
    <script src="js/phones_req.js"></script>
    <script src="js/pagin.js"></script>
    <link rel="stylesheet" href="css/phonesStyle.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" id="hidden-logo-large" href="#"><img src="images/logo.png" width=70px></a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target=".navigation-menu">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse navigation-menu" id="myNavbarToggler7">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mr-lg-3 order-2 order-lg-1">
                    <?php
                    if (!isset($_SESSION['logged'])) {
                        echo '<a class="nav-link" href="login.php">Login</a>';
                    } else {
                        echo '<a class="nav-link" href="do_logout.php">Logout</a>';
                    }
                    ?>

                </li>
                <li class="nav-item mr-lg-5 order-3 order-lg-2">
                    <a class="nav-link" href="phones.php">Mobile Phones</a>
                </li>
                <a class="navbar-brand order-1 order-lg-3" id="hidden-logo-collapse" href="index.php"><img src="images/logo.png" width=70px></a>

                <li class="nav-item ml-lg-5 order-4 order-lg-4">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item ml-lg-3 order-5 order-lg-5">
                    <?php
                    if (!isset($_SESSION['logged'])) {
                        echo '<a class="nav-link" href="register.php">Register</a>';
                    } else {
                        echo '<a class="nav-link" href="orders.php">My Orders</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>

        
            <div class="container mt-5 mb-5 ">
                <div class="card-content" style="display: none">
                    <div class="row mt-1" id="row"></div>
                </div>
                <div class="pagination">
                </div>
            </div>
       
    </header>


    <!-- FOOTER -->
    <div class="d-flex flex-column h-100">
        <footer class="w-100 py-4 flex-shrink-0">
            <div class="container py-4">
                <div class="row gy-4 gx-5">
                    <div class="col-lg-4 col-md-6">
                        <h5 class="h2 text-white">Pax & Krem Mobile Store</h5>
                        <p class="small text-muted">The store is located at the island of Crete Greece, but international orders areaccepted through certain conditions, feel free to contact us!</p>
                        <p class="text-muted mb-0">&copy; Copyrights. All rights reserved. <a class="text-primary" href="https://github.com/dimitrispaximadakis/mobile-eshop-lab-project">Charalambos Kremmydas & Dimitrios Paximadakis</a></p>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <h5 class="text-white mb-3">Contact Information</h5>
                        <ul class="list-unstyled text-muted">
                        <li><a href="#">Sapoutie 10, Heraklion, Crete, Greece </a></li>
                            <li>2810235900</li>
                            <li>Monday-Saturday:</li>
                            <li>09:00-21:00</li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <h5 class="text-white mb-3">Quick links</h5>
                        <ul class="list-unstyled text-muted">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="phones.php">Mobile Phones</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-3">Newsletter</h5>
                        <p class="text-muted">Subscribe to our Newsletter in order to get informed about discounts and promotional coupons first!</p>
                        <form action="#">
                            <div class="input-group mb-3">
                                <input class="form-control" type="email" placeholder="Enter your e-mail here" aria-label="Enter your e-mail here" aria-describedby="button-addon2">
                                <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>