<?php
include("/sources/config.php");

$url = "https://api.themoviedb.org/3/discover/movie?api_key=0374b79f54a000c4b81f9c12db4437df&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=true&page=1&with_watch_monetization_types=flatrate";
//$url2= "https://api.themoviedb.org/3/discover/movie?api_key=0374b79f54a000c4b81f9c12db4437df&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=true&page=1&with_watch_monetization_types=flatrate";
//$url3=https://api.themoviedb.org/3/movie/latest?api_key=0374b79f54a000c4b81f9c12db4437df&language=en-US
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$movies = curl_exec($curl);
curl_close($curl);
$response = json_decode($movies);

echo '<pre>';
print_r($response);
echo '</pre>';
$films = $response->results;
$countFilms = count($films);

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