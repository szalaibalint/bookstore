<?php
// The amounts of products to show on each page
$num_products_on_each_page = 9;
// The current page - in the URL, will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT ?,?');
// bindValue will allow us to use an integer in the SQL statement, which we need to use for the LIMIT clause
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_products = $pdo->query('SELECT * FROM products')->rowCount();
?>

<?=template_header('Products')?>

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
                                    <h6><span><?=$total_products?></span> terméket találtunk</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <?php foreach ($products as $product): ?>
                            



                            <div class="col-lg-4 col-md-6 col-sm-6">
                            <a href="index.php?page=product&id=<?=$product['id']?>">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="imgs/<?=$product['img']?>">
                                            </div>
                                            <div class="product__item__text">
                                                <h6><?=$product['title']?></h6>
                                                <h5>
                                                    <?=$product['price'] * 1?> Ft
                                                    <?php if ($product['rrp'] > 0): ?>
                                                    <span class="rrp"><?=$product['rrp']?></span>
                                                    <?php endif; ?>    
                                                </h5>
                                            </div>
                                        </div>
                            </a>
                                    </div>
                        <?php endforeach; ?>

                        
                        
                    </div>
                    <div class="product__pagination">
                        <?php if ($current_page > 1): ?>
                        <a href="index.php?page=products&p=<?=$current_page-1?>"><i class="fa fa-long-arrow-left"></i></a>
                        <?php endif; ?>
                        
                        <?php if ($current_page == 1): ?>
                        <a style="background-color: rgba(127, 173, 57, 1); color: white;" href="index.php?page=products&p=1">1</a>
                        <?php else: ?>
                        <a href="index.php?page=products&p=1">1</a>
                        <?php endif; ?>

                        <?php if ($current_page == 2): ?>
                        <a style="background-color: rgba(127, 173, 57, 1); color: white;" href="index.php?page=products&p=2">2</a>
                        <?php else: ?>
                        <a href="index.php?page=products&p=2">2</a>
                        <?php endif; ?>

                        <?php if ($current_page == 3): ?>
                        <a style="background-color: rgba(127, 173, 57, 1); color: white;" href="index.php?page=products&p=3">3</a>
                        <?php else: ?>
                        <a href="index.php?page=products&p=3">3</a>
                        <?php endif; ?>

                        <?php if ($current_page == 4): ?>
                        <a style="background-color: rgba(127, 173, 57, 1); color: white;" href="index.php?page=products&p=4">4</a>
                        <?php else: ?>
                        <a href="index.php?page=products&p=4">4</a>
                        <?php endif; ?>

                        <?php if ($current_page == 5): ?>
                        <a style="background-color: rgba(127, 173, 57, 1); color: white;" href="index.php?page=products&p=5">5</a>
                        <?php else: ?>
                        <a href="index.php?page=products&p=5">5</a>
                        <?php endif; ?>

                        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
                        <a href="index.php?page=products&p=<?=$current_page+1?>"><i class="fa fa-long-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

<?=template_footer()?>

</body>

</html>