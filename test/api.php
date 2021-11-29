<?php
    include("../sources/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Getflix Home</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<body>

    <?php
    $apiKey='0374b79f54a000c4b81f9c12db4437df';
    $url = "https://api.themoviedb.org/3/discover/movie?api_key=".$apiKey."&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=true&page=1&with_watch_monetization_types=flatrate";
    
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $movies = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($movies);

    $films = $response->results;
    $countFilms = count($films);

    for ($i = 0; $i < $countFilms; $i++) {
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

        <div class="card" style="width: 18rem;">
            <img src="<?php print($urlImg) ?>" class="card-img-top" alt="img Movie">

            <div class="card-body">
                <h5 class="card-title"><?php print($titleMovie[$i]) ?></h5>
                <p class="card-text"><?php print($overview[$i]) ?></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

    <?php
    }
    ?>
</body>

</html>