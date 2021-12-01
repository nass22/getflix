<?php
    include("config.php");

    $apiKey='0374b79f54a000c4b81f9c12db4437df';
    $url = "https://api.themoviedb.org/3/search/multi?api_key=0374b79f54a000c4b81f9c12db4437df&language=en-US&query=hulk&page=1&include_adult=false";
    
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $movies = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($movies);

    $films = $response->results;
    $countFilms = count($films);


    echo '<pre>';
    print_r($response);
    echo '</pre>';

/*    for ($i = 0; $i < $countFilms; $i++) {
        $titleMovie[$i] = $films[$i]->title;
        $overview[$i] = $films[$i]->overview;
        $picture[$i] = $films[$i]->backdrop_path;
        $urlImg = "https://image.tmdb.org/t/p/w185" . $picture[$i];
        //$insert = $db->prepare('INSERT INTO movies(title, overview, url_img, url_video) VALUES (:title, :overview, :url_img, :url_video)');
        /*$insert->bindParam(':title', $inputUsername);
        $insert->bindParam(':overview', $url);
        $insert->bindParam(':url_img', $urlImg);
        $insert->bindParam(':url_video', $urlVideo);
        $insert->execute();*/
?>