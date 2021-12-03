<?php
session_start();

include('sources/config.php');
include('sources/functions.php');

//On récupère la clé vidéo + le titre + id du film qui se trouvent dans l'URL
$videoKey = $_GET['key'];
$title = $_GET['title'];
$idMovie = $_GET['id'];
$username = $_SESSION['LOGGED_USER'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <link rel="stylesheet" href="sources/style.css">
  <title>GETFLIX - <?php echo $title ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Akronim&family=Goldman:wght@700&family=Festive&family=Press+Start+2P&display=swap" rel="stylesheet">

</head>

<body>

  <!---------Header--------->

  <?php include_once('sources/header.php'); ?>


  <!--Cards-->

  <div class="row justify-content-center">
    <div class="col-md-6">
      <h4 class="card-title-1 paddingTop"><?php echo $title ?></h4>
      <hr style="color:white;">
      <div class="container ">
        <div><?php echo '<iframe class="responsive-iframe" src="https://www.youtube.com/embed/' . $videoKey . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'; ?></div>
      </div>
      <div class="card shadowcard" id="movie">
        <div class="col-md-12">
          <div class="comments">
            <form action="movie.php?id=<?php echo $idMovie ?>&amp;key=<?php echo $videoKey ?>&amp;title=<?php echo $title ?>" method="post">
              <label for="comment" class="sr-only"> </label>
              <input type="text" name="comment" id="comment" class="form-control" placeholder="Your comment goes here." height="300%"></td>
              <input type="submit" id="submit" class="btn btn-dark float-right" name="submitBtn" value="Submit" />
            </form>
          </div>

          <?php
          $submit = $_POST['submitBtn'];
          if (!empty($submit)) {
            //On récupère l'id de l'utilisateur grace à son username
            $sqlQueryUser = 'SELECT id FROM login WHERE username=:username';
            $usernameStm = $db->prepare($sqlQueryUser);
            $usernameStm->bindParam(':username', $username);
            $usernameStm->execute();
            $usernameArray = $usernameStm->fetch();
            $idUsername = $usernameArray[0]; //id de l'utilisateur

            //On récupère la date et l'heure du jour
            date_default_timezone_set('Europe/Paris');
            $date = date('d-m-y G:i:s');

            //On récupère le comment
            $commentMovie = $_POST['comment'];

            //On insère toutes les données dans la table

            $insComment = $db->prepare('INSERT INTO comments(id_movie, id_user, comment, date) VALUES (:id_movie, :id_user, :comment, :date)');
            $insComment->bindParam(':id_movie', $idMovie);
            $insComment->bindParam(':id_user', $idUsername);
            $insComment->bindParam(':comment', $commentMovie);
            $insComment->bindParam(':date', $date);
            $insComment->execute();

            //On récupère le commentaire dans la db et on l'affiche
            $sqlQueryComment = 'SELECT comment,id_user,date FROM comments WHERE id_movie=:id_movie ORDER BY date desc';
            $commentStm = $db->prepare($sqlQueryComment);
            $commentStm->bindParam(':id_movie', $idMovie);
            $commentStm->execute();
            $commentArray = $commentStm->fetchAll(PDO::FETCH_ASSOC);

            foreach ($commentArray as $elem) {
              $commentUser = $elem['comment'];
              $usernameId = $elem['id_user'];
              $dateCom = $elem['date'];

              $sqlQueryUsername = 'SELECT username FROM login WHERE id=:id';
              $stm = $db->prepare($sqlQueryUsername);
              $stm->bindParam(':id', $usernameId);
              $stm->execute();
              $userArray = $stm->fetch();
              $usernameCom = $userArray[0];

              //On implemente dans le html
          ?>
              <div class="comments">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col"><?php echo $usernameCom . " (" . $dateCom . ")" ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $commentUser ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
          <?php
            }
          } else {

            //On récupère le commentaire dans la db et on l'affiche
            $sqlQueryComment = 'SELECT comment,id_user,date FROM comments WHERE id_movie=:id_movie ORDER BY date desc';
            $commentStm = $db->prepare($sqlQueryComment);
            $commentStm->bindParam(':id_movie', $idMovie);
            $commentStm->execute();
            $commentArray = $commentStm->fetchAll(PDO::FETCH_ASSOC);

            foreach ($commentArray as $elem) {
              $commentUser = $elem['comment'];
              $usernameId = $elem['id_user'];
              $dateCom = $elem['date'];

              $sqlQueryUsername = 'SELECT username FROM login WHERE id=:id';
              $stm = $db->prepare($sqlQueryUsername);
              $stm->bindParam(':id', $usernameId);
              $stm->execute();
              $userArray = $stm->fetch();
              $usernameCom = $userArray[0];

              //On implemente dans le html
          ?>
              <div class="comments">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col"><?php echo $usernameCom . " (" . $dateCom . ")" ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $commentUser ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  </div>


  <!--Footer-->

  <?php include_once('sources/footer.php'); ?>

</body>

</html>