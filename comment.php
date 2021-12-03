<?php
 include('sources/config.php');
 include('sources/functions.php');



//On récupère la clé vidéo + le titre + id du film qui se trouvent dans l'URL


//On récupère l'id de l'utilisateur grace à son username
$sqlQueryComment = 'SELECT comment,id FROM comments';
$commentStm = $db->prepare($sqlQueryComment);
$commentStm->execute();
$commentArray = $commentStm->fetchAll(PDO::FETCH_ASSOC);
/*
foreach($commentArray as $elem){
    echo $elem['comment'];
    echo '<br>';
}
*/
/*
for ($i=0; $i<$countComment; $i++){
    echo $commentArray[$i]['comment'];
    echo '<br>';
}
*/

echo $countComment;
echo '<br>';

echo '<pre>';
print_r($commentArray);
echo '</pre>';


/*
date_default_timezone_set('Europe/Paris');
  $date = date('d-m-y G:i:s');
  
echo $date;
*/


$submitBtn = $_POST['submitBtn'];
            if (isset($submitBtn) AND $submitBtn=='send') {
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
              $sqlQueryComment = 'SELECT comment,id_user,date FROM comments ORDER BY date desc';
              $commentStm = $db->prepare($sqlQueryComment);
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
            }
            //On récupère le commentaire dans la db et on l'affiche
            $sqlQueryComment = 'SELECT comment,id_user,date FROM comments ORDER BY date desc';
            $commentStm = $db->prepare($sqlQueryComment);
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



              <div class="row justify-content-center">
    <div class="col-md-6">
      <h4 class="card-title-1 paddingTop"><?php echo $title ?></h4>
      <hr style="color:white;">
      <div class="container ">
        <div><?php echo '<iframe class="responsive-iframe" src="https://www.youtube.com/embed/' . $videoKey . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'; ?></div>
          </div>
          <div class="card shadowcard" id="movie">
          <div class="col-md-12" >
          <div class="comments">
            <label for="comment" class="sr-only"> </label>
            <input type="text" name="comment" id="comment" class="form-control" placeholder="Your comment goes here." height="300%"></td>
            <button type="button" id="submit" class="btn btn-dark float-right" value="Submit">Submit</button>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Username</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Comment</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>