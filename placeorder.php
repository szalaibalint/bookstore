<?php
unset($_SESSION['cart']);
?>

<?php
// The amounts of products to show on each page
$num_products_on_each_page = 9;
// The current page - in the URL, will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
$cat = isset($_GET['cat']) && is_numeric($_GET['cat']) ? (int)$_GET['cat'] : 0;
$ord = isset($_GET['ord']) && is_numeric($_GET['ord']) ? (int)$_GET['ord'] : 0;
$s = isset($_GET['s']) ? $_GET['s'] : '';
// Get the total number of products

if ($s != '')
{
    $stmt = $pdo->prepare("SELECT * FROM products WHERE title LIKE ?");
    $stmt->execute(["%$s%"]);
    $total_products = $stmt->rowCount();

    if ($ord == 0){
    $stmt = $pdo->prepare('SELECT * FROM products WHERE title LIKE ? ORDER BY price DESC LIMIT ?, ?');
    }
    else{
        $stmt = $pdo->prepare('SELECT * FROM products WHERE title LIKE ? ORDER BY price ASC LIMIT ?, ?');
    }
    
    // bindValue will allow us to use an integer in the SQL statement, which we need to use for the LIMIT clause
    $stmt->bindValue(1, "%$s%", PDO::PARAM_STR);
    $stmt->bindValue(2, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
    $stmt->bindValue(3, $num_products_on_each_page, PDO::PARAM_INT);
    $stmt->execute();
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

else if ($cat == 0) {
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

<head>
    <style>
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            input[type="number"] {
                -moz-appearance: textfield;
            }
        </style>
</head>

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
                            <form onsubmit="event.preventDefault();">
                            <?php if ($s != ''): ?>
                                <input id="search_" type="text" placeholder="Mit szeretnél keresni?" value="<?=$s?>">
                            <?php else: ?>
                                
                                <input id="search_" type="text" placeholder="Mit szeretnél keresni?">
                            <?php endif; ?>
                                <button type="submit" onclick="searchS()" class="site-btn">Keresés</button>
                                
                                <script>
                                        function searchS() {
                                            var selectBox = document.getElementById("search_");
                                            var selectedValue = selectBox.value;
                                            window.location.href = "index.php?page=products&s=" + selectedValue;
                                        };
                                    </script>
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
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text" style="color:black;">
                    <h1>Sikeres rendelés</h1>
                    <p>Köszönjük a rendelésed! Hamarosan felvesszük veled a kapcsolatot a rendeléseddel kapcsolatban emailben.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            
        </div>
    </section>
    <!-- Shoping Cart Section End -->


    <?=template_footer()?>



    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

