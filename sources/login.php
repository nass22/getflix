<?php include("dbConnec.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div>
        <h3>Login</h3>
        <form action="login.php" method='post'>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
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
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];

    $sqlQuery='INSERT INTO login(email, password, id_user) VALUES (test@gmail.com, test, 1)';
    $addUser = $db->prepare($sqlQuery);
    $addUser->execute();

    $sqlQuery2='SELECT * FROM users';
    $loginStat=$db->prepare($sqlQuery2);
    $loginStat->execute();
    $allLogin=$loginStat->fetchAll();
?>
<p>
    <?php

    foreach($allLogin as $login){
        echo '<pre>';
        print_r($login);
        echo '</pre>';
    }
    
    ?>
</p>
    <?php
    

    ?>

    
</body>
</html>