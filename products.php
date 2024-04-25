<?php
// The amounts of products to show on each page
$num_products_on_each_page = 9;
// The current page - in the URL, will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
$cat = isset($_GET['cat']) && is_numeric($_GET['cat']) ? (int)$_GET['cat'] : 0;
$ord = isset($_GET['ord']) && is_numeric($_GET['ord']) ? (int)$_GET['ord'] : 0;
// Get the total number of products

if ($cat == 0) {
    $total_products = $pdo->query('SELECT * FROM products')->rowCount();

    if ($ord == 0){
    $stmt = $pdo->prepare('SELECT * FROM products ORDER BY price DESC LIMIT ?,?');
    } else {
        $stmt = $pdo->prepare('SELECT * FROM products ORDER BY price ASC LIMIT ?,?');
    }
    // bindValue will allow us to use an integer in the SQL statement, which we need to use for the LIMIT clause
    $stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
    $stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
    $stmt->execute();
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else{
    $total_products = $pdo->query('SELECT * FROM products WHERE category=' . $cat)->rowCount();

    if ($ord == 0){
    $stmt = $pdo->prepare('SELECT * FROM products WHERE category = ? ORDER BY price DESC LIMIT ?, ?');
    }
    else{
        $stmt = $pdo->prepare('SELECT * FROM products WHERE category = ? ORDER BY price ASC LIMIT ?, ?');
    }
    
    // bindValue will allow us to use an integer in the SQL statement, which we need to use for the LIMIT clause
    $stmt->bindValue(1, $cat, PDO::PARAM_INT);
    $stmt->bindValue(2, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
    $stmt->bindValue(3, $num_products_on_each_page, PDO::PARAM_INT);
    $stmt->execute();
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$pages_ = $total_products / $num_products_on_each_page;
$pages = floor($pages_) + 1;
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

                                <?php 
                                    $categories = array(
                                        1 => "Sport",
                                        2 => "Fiatalsági irodalom",
                                        3 => "Fikció",
                                        4 => "Irodalom",
                                        5 => "Filozófia",
                                        6 => "Naplók",
                                        7 => "Krimi",
                                        8 => "Akció",
                                        9 => "Thriller"
                                    );


                                    for ($ccat = 1; $ccat <= 9; $ccat++):
                                ?>
                                <?php
                                    if ($ccat == $cat):
                                ?>
                                    <li><a style="color: #dd2222; font-weight: bold;" href="index.php?page=products">
                                    <span class="fa fa-times"></span> <?=$categories[$ccat]?></a>
                                </li>

                                <?php else:
                                ?>
                                <li><a href="index.php?page=products&cat=<?=$ccat?>"><?=$categories[$ccat]?></a></li>
                                <?php
                                    endif;
                                    endfor;
                                ?>
                                </ul>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Rendezés</span>
                                    <select id="ordSel" onchange="ordValt()">
                                        <?php
                                            if ($ord == 0):
                                        ?>
                                        <option value="0" selected>Ár szerint csökkenő</option>
                                        <option value="1">Ár szerint növekvő</option>
                                        <?php else:
                                        ?>
                                        <option value="0">Ár szerint csökkenő</option>
                                        <option value="1" selected>Ár szerint növekvő</option>
                                        <?php endif; ?>
                                    </select>

                                    <script>
                                        function ordValt() {
                                            var selectBox = document.getElementById("ordSel");
                                            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                                        window.location.href = "index.php?page=products&cat=<?=$cat?>&ord=" + selectedValue;

                                        
                                        };
                                    </script>
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

                        <?php foreach ($products as $product):?>
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
                        <a href="index.php?page=products&cat=<?=$cat?>&p=<?=$current_page-1?>&ord=<?=$ord?>"><i class="fa fa-long-arrow-left"></i></a>
                        <?php endif; ?>
                        
                        <?php for ($cpage = 1; $cpage <= $pages; $cpage++): ?>

                        <?php if ($current_page == $cpage): ?>
                        <a style="background-color: rgba(127, 173, 57, 1); color: white;" href="index.php?page=products&cat=<?=$cat?>&p=<?=$cpage?>&ord=<?=$ord?>"><?=$cpage?></a>
                        <?php else: ?>
                        <a href="index.php?page=products&cat=<?=$cat?>&p=<?=$cpage?>&ord=<?=$ord?>"><?=$cpage?></a>
                        <?php endif; ?>
                        <?php endfor; ?>
                        

                        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
                        <a href="index.php?page=products&cat=<?=$cat?>&p=<?=$current_page+1?>&ord=<?=$ord?>"><i class="fa fa-long-arrow-right"></i></a>
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