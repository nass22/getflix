<?php

session_start();
include("sources/config.php");
include("sources/functions.php");

if (!isset($_SESSION['LOGGED_USER'])) {
    header("Location:index.php");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <link rel="stylesheet" href="sources/style.css">
        <title>GETFLIX Newsletter</title>
        <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Akronim&family=Goldman:wght@700&family=Festive&family=Press+Start+2P&display=swap" rel="stylesheet">

    </head>

    <body>

        <!---------Header--------->

        <?php include_once('sources/header.php'); ?>



        <!--Container-->

        <div class="container-fluid" id="imgnews">

            <div class="container1" style="display:inline-block" height="500">
                <img src="img/newsletter.jpg" class="d-block w-75" height="500" alt="image newsletter">
            </div>

            <!--Mailchimp SESSION-->
            <?php
            $statusMsg = !empty($_SESSION['msg']) ? $_SESSION['msg'] : '';
            unset($_SESSION['msg']);
            echo $statusMsg;
            ?>
            <!---Mailchimp FORM-->
            <div class="md-5 text-center w-25" style="display:inline-block" id="form">
                <form style="max-width: 50px; margin:auto;" method="post" action="action.php" class="white">
                    <h2 class="h3 font-weight-normal"> SUBSCRIBE TO OUR NEWSLETTER </h2>
                    <p id="badPw1"></p>
                    <p><label for="fname" class="sr-only"> </label><input type="text" name="fname" class="form-control" placeholder="First Name" required /></p>
                    <p><label for="fname" class="sr-only"> </label><input type="text" name="lname" class="form-control" placeholder="Last Name" required /></p>
                    <p><label for="fname" class="sr-only"></label><input type="text" name="email" class="form-control" placeholder="email" required /></p>
                    <p><input type="submit" button class="btn btn-lg btn-primary btn-block" name="submit" value="SUBSCRIBE" /></p>
                </form>
            </div>
        </div>






        <!--Footer-->

        <?php include_once('sources/footer.php'); ?>

    </body>
<?php
}
?>

    </html>