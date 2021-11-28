<?php
include("sources/config.php");
include("sources/functions.php");

//mettre ça dans une fonction 
//$url = "https://api.themoviedb.org/3/movie/566525?api_key=0374b79f54a000c4b81f9c12db4437df&append_to_response=videos";
//$url= "https://api.themoviedb.org/3/discover/movie?api_key=0374b79f54a000c4b81f9c12db4437df&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=true&page=1&with_watch_monetization_types=flatrate";
//$url3=https://api.themoviedb.org/3/movie/latest?api_key=0374b79f54a000c4b81f9c12db4437df&language=en-US
/*
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$movies = curl_exec($curl);
curl_close($curl);
$response = json_decode($movies);
*/

function requestAPI(){
  $apiKey = '0374b79f54a000c4b81f9c12db4437df';
            $url= "https://api.themoviedb.org/3/movie/popular?api_key=" . $apiKey . "&language=en-US&page=1";
  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  $movies = curl_exec($curl);
  curl_close($curl);
  $response = json_decode($movies);
  return $response;
}

$response=requestApi();
//jusqu'ici et mettre un return $response;
$films = $response->results;
$videos= $response->videos;
$videoKeyArray=$videos->results;
$videoKey=$videoKeyArray[0]->key;
echo '<pre>';
print_r($response);
echo '</pre>';

echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$videoKey.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'

/*
echo '<pre>';
print_r($videoKey);
echo '</pre>';
*/

//$countFilms = count($films);

/*
for ($i = 0; $i < $countFilms; $i++) {
  $titleMovie[$i] = $films[$i]->title;
  $overview[$i] = $films[$i]->overview;
  $picture[$i] = $films[$i]->backdrop_path;
  $urlImg = "https://image.tmdb.org/t/p/w185" . $picture[$i];
?>
  <img src="<?php print($urlImg) ?>">
<?php
}
*/
?>