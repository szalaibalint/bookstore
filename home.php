<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 7');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>


<!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Kategóriák</span>
                        </div>
                        <ul>
                            <li><a href="index.php?page=products&cat=1">Sport</a></li>
                            <li><a href="index.php?page=products&cat=2">Fiatalsági irodalom</a></li>
                            <li><a href="index.php?page=products&cat=3">Fikció</a></li>
                            <li><a href="index.php?page=products&cat=4">Irodalom</a></li>
                            <li><a href="index.php?page=products&cat=5">Filozófia</a></li>
                            <li><a href="index.php?page=products&cat=6">Naplók</a></li>
                            <li><a href="index.php?page=products&cat=7">Krimi</a></li>
                            <li><a href="index.php?page=products&cat=8">Akció</a></li>
                            <li><a href="index.php?page=products&cat=9">Thriller</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
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
                    <div class="hero__item set-bg" data-setbg="imgs/banner.jpg">
                        <div class="hero__text">
                            <span>NAGY VÁLASZTÉKÚ</span>
                            <h2>Online<br/>Könyvesbolt</h2>
                            <p></p>
                            <a href="index.php?page=products" class="primary-btn">VÁSÁROLJ MOST</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                    <?php foreach ($recently_added_products as $product): ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="imgs/<?=$product['img']?>">
                                <h5><a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['title']?></a></h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

<?=template_footer()?>

<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>