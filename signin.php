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
    <title>GETFLIX Signin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akronim&family=Goldman:wght@700&family=Festive&family=Press+Start+2P&display=swap" rel="stylesheet">

</head>

<body>


    <img class="mt-4 mb-4" id="logo" src="img/getflixlogo.png" height="180" alt="Getflix Logo">

    <!-----Sign In------>

    <div class="text-center mt-5" id="signIn">
        <form style="max-width: 300px; margin:auto;" method="post" action="signin.php" class="white">

            <h1 class="h3 mb-3 font-weight-normal"> SIGN IN </h1>
            <p id="badPw1"></p>

            <label for="username" class="sr-only"> </label>
            <input type="text" name="username" id="username" maxlength="20" class="form-control" placeholder="Username" required>

            <label for="emailAdress" class="sr-only"> </label>
            <input type="email" name="email" id="emailAdress" class="form-control" placeholder="Email" required>

            <label for="password" class="sr-only"> </label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>

            <label for="password" class="sr-only"> </label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control" required>

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
    <?php

    $inputUsername = filtreSaisie($_POST['username']);
    $inputEmail = filtreSaisie($_POST['email']);
    $inputPassword = filtreSaisie($_POST['password']);
    $inputConfPass = filtreSaisie($_POST['confirm_password']);
    $cryptedPw = password_hash($inputPassword, PASSWORD_DEFAULT);

    if (!empty($inputUsername) && !empty($inputEmail) && !empty($inputPassword) && !empty($inputConfPass)) {

        if ($inputPassword != $inputConfPass) {
            echo '<script>
                    let badPass1=document.getElementById(\'badPw1\');
                    badPass1.innerHTML=\'Vos mots de passes ne correspondent pas!\';
                </script>';
        } else {
            $insert = $db->prepare('INSERT INTO login(username, email, password) VALUES (:username, :email, :password)');
            $insert->bindParam(':username', $inputUsername);
            $insert->bindParam(':email', $inputEmail);
            $insert->bindParam(':password', $cryptedPw);
            $insert->execute();

            //On enregistre l'username en session
            $_SESSION['LOGGED_USER'] = $inputUsername; 
            header("Location:home.php");
        }
    } else {
        echo '<script>
                let badPass1=document.getElementById(\'badPw1\');
                badPass1.innerHTML=\'Vos champs sont incomplets!\';
            </script>';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>