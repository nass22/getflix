<?php
include("config.php");
    
$url= "https://api.themoviedb.org/3/genre/movie/list?api_key=0374b79f54a000c4b81f9c12db4437df&language=en-US";

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$movies = curl_exec($curl);
curl_close($curl);

$response = json_decode($movies);

//var_dump($response);

echo '<pre>';
print($movies);
echo '</pre>';

?>