<!doctype html>

<?php
$full_name_error = "";
$username_error = "";
$password_error = "";
$confirm_password_error = "";
$email_error = "";
$telephone_error = "";
$security_answer_error = "";

$good = true;

if(isset($_POST['register_button']))
{
    // Validáció
    if(empty($_POST['full_name']))
    {
        $full_name_error = "<span class='text-danger'>Full name is required</span><br>";
        $good = false;
    }
    if(empty($_POST['username'])) {
        $username_error = "<span class='text-danger'>Username is required</span><br>";
        $good = false;
    }
    if(empty($_POST['password']))
    {
        $password_error = "<span class='text-danger'>Password is required</span><br>";
        $good = false;
    }

    if(empty($_POST['confirm_password']))
    {
        $confirm_password_error = "<span class='text-danger'>Confirm password is required</span><br>";
        $good = false;
    }
    else if($_POST['password'] != $_POST['confirm_password'])
    {
        $confirm_password_error = "<span class='text-danger'>A jelszavak nem egyeznek</span><br>";
        $good = false;
    }

    if(empty($_POST['email'])) {
        $email_error = "<span class='text-danger'>Email is required</span><br>";
        $good = false;
    }
    if(empty($_POST['phone'])) {
        $telephone_error = "<span class='text-danger'>Telephone number is required</span><br>";
        $good = false;
    }
    if(empty($_POST['security_answer'])) {
        $security_answer_error = "<span class='text-danger'>Security answer is required</span><br>";
        $good = false;
    }

    // A file végén tölti fel adatbazisba
}
?>


<html lang="zxx">
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

<div style="height: 100%; display: flex; align-items: center; justify-content: center">
    <form action="#" method="post" style="padding-bottom: 10%">

        <label class="" for="full_name">Teljes név</label><br>
        <input type="text" name="full_name" class="hero__search__form"><br>
        <?php echo $full_name_error?>

        <label class="" for="username">Felhasználónév</label><br>
        <input type="text" name="username" class="hero__search__form"><br>
        <?php echo $username_error?>

        <label class="" for="password">Jelszó</label><br>
        <input type="password" name="password" class="hero__search__form"><br>
        <?php echo $password_error?>

        <label class="" for="confirm_password">Jelszó megerősítése</label><br>
        <input type="password" name="confirm_password" class="hero__search__form"><br>
        <?php echo $confirm_password_error ?>

        <label class="" for="email">E-mail</label><br>
        <input type="email" name="email" class="hero__search__form"><br>
        <?php echo $email_error ?>

        <label class="" for="phone">Telefonszám</label><br>
        <input type="tel" name="phone" pattern="[0-9]{2}-[0-9]{2}-[0-9]{3}-[0-9]{4}" class="hero__search__form"><br>
        <?php echo $telephone_error ?>

        <label for="security_question">Biztonsági kérdés</label><br>
        <select name="security_question" id="security_question" class="hero__search__form">
            <option value="Első háziállat">Első háziállat neve</option>
            <option value="Legidősebb testvéred neve">Legidősebb testvéred neve</option>
            <option value="Kedvenc filmed">Kedvenc filmed</option>
            <option value="Első autód márkája">Első autód márkája</option>
            <option value="Szülővárosod">Szülővárosod</option>
        </select><br>

        <label for="security_answer">Biztonsági kérdés válasza</label><br>
        <input type="text" name="security_answer" class="hero__search__form"><br>
        <?php echo $security_answer_error ?>

        <div class="text-center mt-3" >
            <input class="site-btn" style="text-align: center" type="submit" name="register_button" value="Regisztráció">
        </div>
    </form>
</div>

<?php
// Kilép ha nem dzsó
if(!$good || !isset($_POST['register_button']))
    return;


// Adatbazisba feltölti az adatokat ha dzso
require("database.php");

echo $_POST['security_question'];


$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$phone = str_replace($_POST['phone']);
$sql = sprintf("INSERT INTO register(r_fnm, r_unm, r_pwd, r_cno, r_email, r_question, r_answer) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s');", $_POST['full_name'],  $_POST['username'], $password, $_POST['phone'], $_POST['email'], $_POST['security_question'], $_POST['security_answer']);

mysqli_query($conn, $sql);

echo "<script>window.alert('elvileg feltöltötte az adatbázisba')</script>";

mysqli_close($conn);

// TODO Felhasználó bejelentkeztetése

?>
   <?=template_footer()?>

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