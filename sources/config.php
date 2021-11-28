<?php
//On se connecte à la db grâce à PDO
$servname='localhost';
$dbname='getflix';
$user='root';
$password='root';

try{
    $db= new PDO(
        "mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $password);
        //On définit le mode d'erreur de PDO sur Exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e){
    //On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci
    die('Erreur: ' . $e->getMessage());
}

?>