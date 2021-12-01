<?php
session_start();
include("sources/config.php");
include("sources/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="sources/style.css">
    <title>GETFLIX Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akronim&family=Goldman:wght@700&family=Festive&family=Press+Start+2P&display=swap" rel="stylesheet">

</head>

<body>

    <img class="mt-4 mb-4" id="logo" src="img/getflixlogo.png" height="180" alt="Getflix Logo">

    <!-----Log In------>

    <div class="text-center mt-5">
        <form style="max-width: 300px; margin:auto;" action="login.php" method="post" class="white">

            <h1 class="h3 mb-3 font-weight-normal"> LOG IN </h1>
            <p id="badPw"></p>
            
            <label for="username" class="sr-only"> </label>
            <input type="text" name="username" id="emailAdress" class="form-control" placeholder="Username" required autofocus>

            <label for="password" class="sr-only"> </label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
            <div class="checkbox mt-3">
                <label>
                    <input type="checkbox" name="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <div class="mt-3">
                <button class="btn btn-lg btn-primary btn-block"> Sign In </button>
            </div>
        </form>
    </div>
    </div>

    <?php

    //On filtre les saisies pour éviter des injections js
    $inputLogin = filtreSaisie($_POST['username']);
    $inputPassword = filtreSaisie($_POST['password']);
    $cryptedPw = password_hash($inputPassword, PASSWORD_DEFAULT);

    //On test si la variable existe et on va chercher dans la db le password de l'user
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $sqlQuery = 'SELECT password FROM login WHERE username=:username';
        $loginStm = $db->prepare($sqlQuery);
        $loginStm->bindParam('username', $inputLogin);
        $loginStm->execute();
        $login = $loginStm->fetch();
        $pwHashed = $login[0];
        // on vérifie le password de l'input et le pw dans la db
        if (password_verify($inputPassword, $pwHashed)) {
            $_SESSION['LOGGED_USER'] = $inputLogin; //On enregistre l'username dans une session
            header("Location:home.php");
        } else {
            echo '<script>
            let badPass=document.getElementById(\'badPw\');
            badPass.innerHTML=\'Votre login/mot de passe est incorrect!\';
            </script>';             
        }
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>

</body>

</html>