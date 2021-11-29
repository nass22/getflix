<?php

$videoKey=$_GET['key'];
$title=$_GET['title'];

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


<!--Logo Img-->
<img class = "mt-5"  id = "logo" src= "img/logonetflix.png" height="180" alt="Getflix Logo">



<!--Cards-->

<div class="row justify-content-center">
    <div class="col-md-6">
        <h4 class="card-title-1"><?php echo $title ?></h4>
        <hr>
        <div class="card shadowcard">
            <div class="col-img-top"><?php echo '<iframe width="590" height="315" src="https://www.youtube.com/embed/'.$videoKey.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'; ?></div>
                <div class="col-md-12">
                  <div class="comments">
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



  
<!--Footer-->    

<?php include_once('sources/footer.php'); ?>
  
  </body>
</html>