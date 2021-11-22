<?php
//On se connecte à la db grâce à PDO
try{
    $db= new PDO(
        'mysql:host=localhost;dbname=getflix;charset=utf8', 'root', 'root'
    );
} catch (Exception $e){
    die('Erreur: ' . $e->getMessage());
}


?>