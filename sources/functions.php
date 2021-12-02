<?php

include("../sources/config.php");

function filtreSaisie($saisie)
{
    $saisie = trim($saisie); //supprime les espaces inutiles
    $saisie = stripslashes($saisie); //supprime les antislashes
    $saisie = htmlspecialchars($saisie); //permet d'échapper certains caractères pour éviter d'insérer du js
    return $saisie;
}

function requestApi($url){
    
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $movies = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($movies);
    return $response;
}


?>