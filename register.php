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

<div style="height: 100%; display: flex; align-items: center; justify-content: center">
    <form action="#" method="post" style="padding-bottom: 10%">

        <label class="" for="full_name">Teljes név</label><br>
        <input type="text" name="full_name"><br>
        <?php echo $full_name_error?>

        <label class="" for="username">Felhasználónév</label><br>
        <input type="text" name="username"><br>
        <?php echo $username_error?>

        <label class="" for="password">Jelszó</label><br>
        <input type="password" name="password"><br>
        <?php echo $password_error?>

        <label class="" for="confirm_password">Jelszó megerősítése</label><br>
        <input type="password" name="confirm_password"><br>
        <?php echo $confirm_password_error ?>

        <label class="" for="email">E-mail</label><br>
        <input type="email" name="email"><br>
        <?php echo $email_error ?>

        <label class="" for="phone">Telefonszám</label><br>
        <input type="tel" name="phone" pattern="[0-9]{2}-[0-9]{2}-[0-9]{3}-[0-9]{4}"><br>
        <?php echo $telephone_error ?>

        <label for="security_question">Biztonsági kérdés</label><br>
        <select name="security_question" id="security_question">
            <option value="Első háziállat">Első háziállat neve</option>
            <option value="Legidősebb testvéred neve">Legidősebb testvéred neve</option>
            <option value="Kedvenc filmed">Kedvenc filmed</option>
            <option value="Első autód márkája">Első autód márkája</option>
            <option value="Szülővárosod">Szülővárosod</option>
        </select><br>

        <label for="security_answer">Biztonsági kérdés válasza</label><br>
        <input type="text" name="security_answer"><br>
        <?php echo $security_answer_error ?>

        <div class="text-center mt-3" >
            <input class="btn btn-success" style="text-align: center" type="submit" name="register_button" value="Regisztráció">
        </div>
    </form>
</div>
</body>
</html>
<?php
// Kilép ha nem dzsó
if(!$good || !isset($_POST['register_button']))
    return;


// Adatbazisba feltölti az adatokat ha dzso
require("database.php");

echo $_POST['security_question'];


$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$sql = sprintf("INSERT INTO register(r_fnm, r_unm, r_pwd, r_cno, r_email, r_question, r_answer) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s');", $_POST['full_name'],  $_POST['username'], $password, $_POST['phone'], $_POST['email'], $_POST['security_question'], $_POST['security_answer']);

mysqli_query($conn, $sql);

echo "<script>window.alert('elvileg feltöltötte az adatbázisba')</script>";

mysqli_close($conn);

// TODO Felhasználó bejelentkeztetése
?>