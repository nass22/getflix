<?php 
include("sources/config.php");
include("sources/functions.php");

$inputUsername = filtreSaisie($_POST['username']);
$inputEmail = filtreSaisie($_POST['email']);
$inputPassword = filtreSaisie($_POST['password']);
$inputConfPass = filtreSaisie($_POST['confirm_password']);
$cryptedPw = password_hash($inputPassword, PASSWORD_DEFAULT);

if (isset($inputUsername) && isset($inputEmail) && isset($inputPassword) && isset($inputConfPass) && ($inputPassword == $inputConfPass)) {
    $insert = $db->prepare('INSERT INTO login(username, email, password) VALUES (:username, :email, :password)');
    $insert->bindParam(':username', $inputUsername);
    $insert->bindParam(':email', $inputEmail);
    $insert->bindParam(':password', $cryptedPw);
    $insert->execute();

    header("Location:merci.php"); //A changer en index.php
} else {
    //echo "<script>alert(\"Vos mots de passes ne correspondent pas!\")</script>";
    header("Location:signin.php");
}
