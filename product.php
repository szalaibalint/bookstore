<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
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
<?=template_header('Product')?>
<html lang="zxx">

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

<body>
    
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
    

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
        <div class="product content-wrapper">
            <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                        <img src="imgs/<?=$product['img']?>" width="350" height="350" alt="<?=$product['title']?>">
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="product__details__text">
                    <h3 class="name"><?=$product['title']?></h3>
                    <div class="product__details__price">
                    <span class="price" style="color:red">
                        <?=$product['price'] * 1?> Ft
                        <?php if ($product['rrp'] > 0): ?>
                        <span class="rrp"><?=$product['rrp']?></span>
                        <?php endif; ?>
                    </span>
                    </div>  
                    <p><?=$product['description']?></p>
            
                        
                        
                        
                        <form action="index.php?page=cart" method="post">
                        <div class="product__details__quantity unselectable">
                            <div class="quantity">
                                <div class="pro-qty">
                                <input type="number" class="pro-qty" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                                </div>
                            </div>
                        </div>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" class="primary-btn" value="KOSÁRBA">
        </form>
                        <ul>
                            <li><b>Elérhető:</b><span><?php if($product['quantity'] > 0) {echo 'Raktáron';} else {echo 'Nincs raktáron';}?></span></li>
                        </ul>
                    </div>
                </div>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    
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


</body>

</html>