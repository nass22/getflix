<?php include("config.php");

    $inputUsername= filtreSaisie($_POST['username']);
    $inputEmail = filtreSaisie($_POST['email']);
    $inputPassword = filtreSaisie($_POST['password']);
    $cryptedPw=password_hash($inputPassword, PASSWORD_DEFAULT);

    $insert = $db->prepare('INSERT INTO login(username, email, password) VALUES (:username, :email, :password)');
    $insert->bindParam(':username', $inputUsername);
    $insert->bindParam(':email', $inputEmail);
    $insert->bindParam(':password', $cryptedPw);
    $insert->execute();

    //header("Location:merci.php"); //A changer en index.php

?>