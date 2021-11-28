<?php
include("sources/config.php");
include("sources/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="sources/style.css">
    <title>GETFLIX</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akronim&family=Goldman:wght@700&family=Festive&family=Press+Start+2P&display=swap" rel="stylesheet">

</head>

<body>

    <!---------Header--------->

    <?php include_once('sources/header.php'); ?>

    <!--Carousel-->
    <div class="container-fluid" height="400" id="bandeau">
        <div id="carouselExampleCaptions" class="carousel slide" height="400" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/carousel1.gif" class="d-block w-100" alt="carousel image 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>THE MOVIE TITLE</h1>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carousel3.gif" class="d-block w-100" alt="carousel image 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>THE MOVIE TITLE</h1>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carousel2.gif" class="d-block w-100" alt="carousel image 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>THE MOVIE TITLE</h1>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!--Cards-->
    <div class="container-fluid padding">
        <div class="row padding">

            <?php
            $apiKey = '0374b79f54a000c4b81f9c12db4437df';
            $urlMoviesPopular = "https://api.themoviedb.org/3/movie/popular?api_key=" . $apiKey . "&language=en-US&page=1";


            $responseMovies = requestAPI($urlMoviesPopular);
            $moviesArray = $responseMovies->results;
            $countMovies = count($moviesArray);

            //Ajout des data dans les tables;
            for ($i = 0; $i < $countMovies; $i++) {
                $title = $moviesArray[$i]->original_title;
                $id = $moviesArray[$i]->id;
                $poster = $moviesArray[$i]->poster_path;
                $overview = $moviesArray[$i]->overview;
                $urlPoster = "https://image.tmdb.org/t/p/w185/" . $poster;

                $urlVideo = 'https://api.themoviedb.org/3/movie/' . $id . '/videos?api_key=' . $apiKey . '&language=en-US';

                $responseVideo = requestAPI($urlVideo);
                $videoArray = $responseVideo->results;
                $video_key = $videoArray[0]->key;

            ?>
                <div class="col-md-3">
                    <div class="card shadowcard">
                        <img class="card-img-top" src="<?php print($urlPoster) ?>">
                        <div class="card-body">
                            <h4 class="card-title-1"><?php print($title) ?></h4>
                            <p class="card-text-1"><?php print($overview) ?></p>
                            <a href="movie.php?key=<?php echo $video_key ?>&amp;title=<?php echo $title ?>" class="btn btn-primary">Link</a>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>

    <!--Footer-->

<?php include_once('sources/footer.php'); ?>

</body>

</html>