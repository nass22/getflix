<?php include("config.php");
      include("functions.php");  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Getflix Login</title>
</head>

<body>
    <div>
        <h3>Login:</h3>
        <form action="login.php" method='post'>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value='Envoyer'></inputn>
            </div>
        </form>
    </div>

    <?php

        $inputLogin=filtreSaisie($_POST['username']);
        $inputPassword=filtreSaisie($_POST['password']);
        $cryptedPw=password_hash($inputPassword, PASSWORD_DEFAULT);
        if(isset($_POST['username']) && isset($_POST['password'])){
            $sqlQuery='SELECT password FROM login WHERE username=:username';
            $loginStm=$db->prepare($sqlQuery);
            $loginStm->bindParam('username', $inputLogin);
            $loginStm->execute();
            $login=$loginStm->fetch();
            $pwHashed=$login[0];
                if (password_verify($inputPassword, $pwHashed)){
                    echo 'Bienvenue ' . $inputLogin;
                    //header("Location:index.php"); //A décommenter quand on aura l'index.php
                } else {
                    echo 'Votre login/mot de passe est incorrect!';
                }
        } 
    ?>

</body>

</html>