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
        $username_error = "<span class='text-danger'>Nem adott meg felhasználónevet</span><br>";
        $good = false;
    }

    if(empty($_POST["password"]))
    {
        $password_error = "<span class='text-danger'>No password</span><br>";
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

<div class="w-100 h-100 d-flex align-items-center justify-content-center">
    <form action="#" method="post">
        <label for="username">Felhasználónév</label><br>
        <input type="text" name="username"><br>
        <?php echo $username_error; ?>

        <label for="password">Jelszó</label><br>
        <input type="password" name="password"><br>
        <?php echo $password_error; ?>

        <div class="text-center mt-3">
            <input class="btn btn-success" type="submit" name="login_button" value="Bejelentkezés">
        </div>
    </form>
    <?php echo $login_error ?>
</div>
</body>
</html>
