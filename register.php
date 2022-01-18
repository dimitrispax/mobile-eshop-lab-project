<?php 

session_start();
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
    <script src="js/main.js"></script>
    <script src="js/verifyPassword.js"></script>
    <link rel="stylesheet" href="css/registerStyle.css">

</head>

<body>

    <!-- NAVBAR -->
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
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item mr-lg-5 order-3 order-lg-2">
                    <a class="nav-link" href="phones.php">Mobile Phones</a>
                </li>
                <a class="navbar-brand order-1 order-lg-3" id="hidden-logo-collapse" href="index.php"><img src="images/logo.png" width=70px></a>

                <li class="nav-item ml-lg-5 order-4 order-lg-4">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item ml-lg-3 order-5 order-lg-5">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- HEADER -->
    <header class="page-header header container-fluid">
        <div class="overlay"></div>
        <div class="container form">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 my-2">
                        <div class="card-body p-4 p-sm-5">
                            <form action="do_register.php" method="post">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputFname">First Name</label>
                                        <input type="text" class="form-control" id="inputFname" name="inputFname" placeholder="John">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputLname">Last Name</label>
                                        <input type="text" class="form-control" id="inputLname" name="inputLname" placeholder="Doe">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="example@email.com">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                                        <?php 
                                            if(isset($_SESSION['pas_verify_error'])) {
                                                if(!empty($_SESSION['pas_verify_error'])) {
                                                    echo '<p id="pwdMessage">'.$_SESSION['pas_verify_error'].'</p>';
                                                }
                                            } else {
                                                echo '<p id="pwdMessage"></p>';
                                            }
                                        ?>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputRePassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="inputRePassword" name="inputRePassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Street 123">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">City</label>
                                        <input type="text" class="form-control" id="inputCity" name="inputCity">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPostal">Postal Code</label>
                                        <input type="text" class="form-control" id="inputPostal" name="inputPostal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone">Mobile Phone</label>
                                    <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="">
                                </div>
                                <div class="d-flex justify-content-center btn-sm register">
                                    <button class="btn btn-primary text-center" type="submit" onclick="">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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