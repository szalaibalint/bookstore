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
                            <li><b>Availability</b><span><?php if($product['quantity'] > 0) {echo 'Raktáron';} else {echo 'Nincs raktáron';}?></span></li>
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