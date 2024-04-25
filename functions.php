<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'shoppingcart';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Template header, feel free to customize this
function template_header($title) {
// Get the number of items in the shopping cart, which will be displayed in the header.
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo <<<EOT
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Könyvesbolt</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!--<div id="preloder">
        <div class="loader"></div>
    </div>-->

   

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li>Ingyenes szállítás minden péntekenként</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a target="_blank" href="https://www.crazygames.com/game/cubes-2048-io"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" href="https://www.hasznaltauto.hu/szemelyauto/bmw/730/bmw_730ld_automata-20553496#sid=8701ddbe-e5cc-45d5-82c5-8e8ffd9e2819"><i class="fa fa-twitter"></i></a>
                                <a target="_blank" href="https://bloch.suli.hu/"><i class="fa fa-linkedin"></i></a>
                                <a target="_blank" href="https://csepel.hu/#/"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                           
                            <div class="header__top__right__auth">
                                <a ><i class="fa fa-user"></i> Bejelentkezés</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php?page=main"> <img src="img/Open_book_nae_02.svg.png" alt="book"></a>
                    </div>
                </div>
                <div class="col-lg-6" >
                    <nav class="header__menu" >
                        <ul >
                            <li><a href="index.php?page=main">Főoldal</a></li>
                            <li><a href="index.php?page=products">Termékek</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="index.php?page=cart"><i class="fa fa-shopping-bag"></i> <span>$num_items_in_cart</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Halásztelek 2314 Kisgyár u. 98</li>
                            <li>Phone: +36 70 425 9419</li>
                            <li>Email: szalaionthelow@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Linkek</h6>
                        <ul>
                            <li><a href="#">Rólunk</a></li>
                            <li><a href="#">A webáruházról</a></li>
                            <li><a href="#">Biztonságos vásárlás</a></li>
                            <li><a href="#">Szállítás információ</a></li>
                            <li><a href="#">Adatvédelmi politika</a></li>
                            <li><a href="#">Oldalunk</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Kik vagyunk</a></li>
                            <li><a href="#">Szolgáltatásaink</a></li>
                            <li><a href="#">Projektek</a></li>
                            <li><a href="#">Elérhetőség</a></li>
                            <li><a href="#">Találmányok</a></li>
                            <li><a href="#">Ajándék</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Feliratkozás a hírlevelünkre</h6>
                        <p>Kapj értesítéseket a webáruházunk friss ajánlatairól.</p>
                        <form action="#">
                            <input type="text" placeholder="Ide írd az email">
                            <button type="submit" class="site-btn">Feliratkozás</button>
                        </form>
                        <div class="footer__widget__social">
                        <a target="_blank" href="https://www.crazygames.com/game/cubes-2048-io"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" href="https://www.hasznaltauto.hu/szemelyauto/bmw/730/bmw_730ld_automata-20553496#sid=8701ddbe-e5cc-45d5-82c5-8e8ffd9e2819"><i class="fa fa-twitter"></i></a>
                                <a target="_blank" href="https://bloch.suli.hu/"><i class="fa fa-linkedin"></i></a>
                                <a target="_blank" href="https://csepel.hu/#/"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script>  <i class="fa fa-heart" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank"></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
EOT;
}
?>