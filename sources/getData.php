<!-- Lors de l'ouverture de cette page, les data sont directement ajoutés à la DB -->
<?php
include("config.php");
include("functions.php");


$apiKey='0374b79f54a000c4b81f9c12db4437df';
$urlMoviesPopular = "https://api.themoviedb.org/3/movie/popular?api_key=".$apiKey."&language=en-US&page=1";


$responseMovies=requestAPI($urlMoviesPopular);
$moviesArray=$responseMovies->results;
$countMovies=count($moviesArray);

//Ajout des data dans les tables;
for($i=0;$i<$countMovies; $i++){
    $title=$moviesArray[$i]->original_title;
    $id=$moviesArray[$i]->id;
    $poster=$moviesArray[$i]->poster_path;
    $overview=$moviesArray[$i]->overview;

    $urlVideo='https://api.themoviedb.org/3/movie/'.$id.'/videos?api_key='.$apiKey.'&language=en-US';
    
    $responseVideo=requestApi($urlVideo);
    $videoArray=$responseVideo->results;
    $video_key=$videoArray[0]->key;
    
    $insert = $db->prepare('INSERT INTO movies(id_movie, title, overview, poster, video_key) VALUES (:id_movie, :title, :overview, :poster, :video_key)');
    $insert->bindParam('id_movie', $id);
    $insert->bindParam('title', $title);
    $insert->bindParam('overview', $overview);
    $insert->bindParam('poster', $poster);
    $insert->bindParam('video_key', $video_key);
    $insert->execute();
}

?>