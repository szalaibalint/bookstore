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
        $full_name_error = "Full name is required";
        $good = false;
    }
    if(empty($_POST['username'])) {
        $username_error = "Username is required";
        $good = false;
    }
    if(empty($_POST['password']))
    {
        $password_error = "Password is required";
        $good = false;
    }

    if(empty($_POST['confirm_password']))
    {
        $confirm_password_error = "Confirm password is required";
        $good = false;
    }
    else if($_POST['password'] != $_POST['confirm_password'])
    {
        $confirm_password_error = "A jelszavak nem egyeznek";
        $good = false;
    }

    if(empty($_POST['email'])) {
        $email_error = "Email is required";
        $good = false;
    }
    if(empty($_POST['phone'])) {
        $telephone_error = "Telephone number is required";
        $good = false;
    }
    if(empty($_POST['security_answer'])) {
        $security_answer_error = "Security answer is required";
        $good = false;
    }

    // A file végén tölti fel adatbazisba
}
?>

<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css">

    <title>Könyvesbolt regisztráció</title>

    <style>
    </style>

</head>
<body>

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


            a {
            color: black; /* Set the normal color */
            text-decoration: none; /* Remove underline if desired */
            }

            a:hover {
            color: black; /* Ensure the color remains the same on hover */
            }

        </style>
</head>

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
    </section>
    <!-- Hero Section End -->

<div style="height: 100%; display: flex; align-items: center; justify-content: center">
    <form action="#" method="post" style="padding-bottom: 10%">

        <label class="" for="full_name">Teljes név</label><br>
        <input <?php echo 'placeholder="' . $full_name_error . '"'?> type="text" name="full_name" class="hero__search__form"><br>
        

        <label class="" for="username">Felhasználónév</label><br>
        <input <?php echo 'placeholder="' . $username_error . '"'?> type="text" name="username" class="hero__search__form"><br>

        <label class="" for="password">Jelszó</label><br>
        <input <?php echo 'placeholder="' . $password_error . '"'?> type="password" name="password" class="hero__search__form"><br>

        <label class="" for="confirm_password">Jelszó megerősítése</label><br>
        <input <?php echo 'placeholder="' . $confirm_password_error . '"'?> type="password" name="confirm_password" class="hero__search__form"><br>

        <label class="" for="email">E-mail</label><br>
        <input <?php echo 'placeholder="' . $email_error . '"'?> type="email" name="email" class="hero__search__form"><br>

        <label class="" for="phone">Telefonszám</label><br>
        <input <?php echo 'placeholder="' . $telephone_error . '"'?> type="tel" name="phone" pattern="[0-9]{2}-[0-9]{2}-[0-9]{3}-[0-9]{4}" class="hero__search__form"><br>

        <label for="security_question">Biztonsági kérdés</label><br>
        <select name="security_question" id="security_question" class="hero__search__form">
            <option value="Első háziállat">Első háziállat neve</option>
            <option value="Legidősebb testvéred neve">Legidősebb testvéred neve</option>
            <option value="Kedvenc filmed">Kedvenc filmed</option>
            <option value="Első autód márkája">Első autód márkája</option>
            <option value="Szülővárosod">Szülővárosod</option>
        </select><br>

        <labelfor="security_answer">Biztonsági kérdés válasza</label><br>
        <input <?php echo 'placeholder="' . $security_answer_error . '"'?> type="text" name="security_answer" class="hero__search__form"><br>
        <p style="height: 50px;"></p>
            
        <div class="text-center mt-3" >
            <input class="site-btn" style="text-align: center" type="submit" name="register_button" value="Regisztráció">
            <p style="margin-top: 10px;"><a href="index.php?page=login">Bejelentkezés</a></p>
        </div>
    </form>
</div>

<?=template_footer()?>

</body>
</html>
<?php
// Kilép ha nem dzsó
if(!$good || !isset($_POST['register_button']))
    return;



// Adatbazisba feltölti az adatokat ha dzso
require("database.php");


$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$sql = sprintf("INSERT INTO register(r_fnm, r_unm, r_pwd, r_cno, r_email, r_question, r_answer) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s');", $_POST['full_name'],  $_POST['username'], $password, $_POST['phone'], $_POST['email'], $_POST['security_question'], $_POST['security_answer']);

mysqli_query($conn, $sql);

echo '<script>window.location.href = "index.php?page=main";</script>';

mysqli_close($conn);

// TODO Felhasználó bejelentkeztetése
?>