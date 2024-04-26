<!doctype html>
<?php
$username_error = "";
$password_error = "";
$login_error = "";
$good = true;



if(isset($_POST["login_button"]))
{
    if(empty($_POST["username"]))
    {
        $username_error = "Nem adott meg felhasználónevet";
        $good = false;
    }

    if(empty($_POST["password"]))
    {
        $password_error = "No password";
        $good = false;
    }
}

if(isset($_POST["login_button"]) && $good)
{
    include_once "database.php";
    $sql = "SELECT * FROM register WHERE r_unm = '{$_POST['username']}';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        // Ebben az esetben megtalálta a felhasználót
        $row = mysqli_fetch_assoc($result);

        if(!password_verify($_POST['password'], $row["r_pwd"]))
        {
            $login_error = "<span class='text-danger'>Hibás felhasználónév vagy jelszó</span>";
        }
        else
        {
            $_SESSION["username"] = $row["r_unm"];
            echo '<script>window.location.href = "index.php?page=main";</script>';
        }
    }
    mysqli_close($conn);
}
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Könyvesbolt bejelentkezés</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css">

    

</head>
<body>

<?=template_header('Bejelentkezés')?>

<head>

<style>

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

    <div style="height: 50%; display: flex; align-items: center; justify-content: center">
<form action="#" method="post">
        <form action="#" method="post">
        <label for="username">Felhasználónév</label><br>
        <input <?php echo 'placeholder="' . $username_error . '"'?> type="text" name="username" class="hero__search__form"><br>


        <label for="password">Jelszó</label><br>
        <input <?php echo 'placeholder="' . $password_error . '"'?> type="password" name="password" class="hero__search__form"><br>

        <p style="height: 50px;"></p>

        <div class="text-center mt-3">
            <input class="site-btn" style="text-align: center" type="submit" name="login_button" value="Bejelentkezés">
            <p style="margin-top: 10px;"><a href="index.php?page=register">Regisztráció</a></p>
        </div>
        
    </form>

</div>



<?=template_footer()?>

</body>
</html>
