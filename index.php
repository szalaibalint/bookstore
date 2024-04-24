<?php
    include("database.php");
?>

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
    <div id="preloder">
        <div class="loader"></div>
    </div>

   

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@gmail.com</li>
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
                        <a href="./index.html"> <img src="img/Open_book_nae_02.svg.png" alt="book"></a>
                    </div>
                </div>
                <div class="col-lg-6" >
                    <nav class="header__menu" >
                        <ul >
                          
                            <li class="active"><a href="./shop-grid.html">Főoldal</a></li>
                            <li><a href="#">Oldalak</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Bolt adatai</a></li>
                                    <li><a href="./shoping-cart.html">Bevásárló kosár</a></li>
                                    <li><a href="./checkout.html">Fizetés</a></li>
                                    <li><a href="./blog-details.html">Webolal Részletei</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Elérhetőség</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">Áruk <span></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Kategóriák</span>
                        </div>
                        <ul>
                            <li><a href="#">Sport</a></li>
                            <li><a href="#">Fiatalsági irodalom</a></li>
                            <li><a href="#">Fikció</a></li>
                            <li><a href="#">Irodalom</a></li>
                            <li><a href="#">Filozófia</a></li>
                            <li><a href="#">Naplók</a></li>
                            <li><a href="#">Krimi</a></li>
                            <li><a href="#">Akció</a></li>
                            <li><a href="#">Thriller</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Összes kategória
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="Mit szeretnél keresni?">
                                <button type="submit" class="site-btn">Keresés</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+36 70 425 9419</h5>
                                <span>Ügyfélszolgálat 0-24</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/1831_preview.v3.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Könyvesbolt</h2>
                       
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Termékek</h4>
                            <ul>
                            <li><a href="#">Sport</a></li>
                            <li><a href="#">Fiatalsági irodalom</a></li>
                            <li><a href="#">Fikció</a></li>
                            <li><a href="#">Irodalom</a></li>
                            <li><a href="#">Filozófia</a></li>
                            <li><a href="#">Naplók</a></li>
                            <li><a href="#">Krimi</a></li>
                            <li><a href="#">Akció</a></li>
                            <li><a href="#">Thriller</a></li>
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Árak</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Rendezés</span>
                                    <select>
                                        <option value="0">Ár szerint csökkenő</option>
                                        <option value="0">Ár szerint növekvő</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>0</span> terméket találtunk</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM book";
                            $result = mysqli_query($conn, $sql);
                        
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo
                                    '<div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="' . $row["b_img"] . '">
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__item__text">
                                                <h6><a href="#">' . $row["b_nm"] . '</a></h6>
                                                <h5>' . $row["b_price"] . ' Ft</h5>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            }

                            
                        ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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
                            <li><a href="#">adatvédelmi politika</a></li>
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

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>

<?php
    mysqli_close($conn);
 ?>