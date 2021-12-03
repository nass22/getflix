




<?php
session_start();
if (isset($_SESSION['LOGGED_USER'])) {
    header("Location:home.php");
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
        <title>GETFLIX</title>
        <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Akronim&family=Goldman:wght@700&family=Festive&family=Press+Start+2P&display=swap" rel="stylesheet">
    </head>


    <body style="background-color: rgb(22, 22, 22);">


        <!---------Header--------->

        <nav class="navbar navbar-expand-xl bg-dark navbar-dark py-0 fixed-top" id="navbar">
            <div class="container-fluid" id="header">
                <a href="home.php" class="navbar-brand fs-1">GETFLIX</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-6 mb-lg-auto m-lg-6">

                        <div class="dropdown" id="signin">
                            <button class="btn btn-secondary dropdown-toggle pull-right" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Log In
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                </div>
            </div>
        </nav>



        <!--LANDING -->

        <!--Remember that to Align img in center and keep responsive is class ="d-block w-100"-->

        <div class="container-fluid" height="400" id="landinglogo" style="padding-top: 170px;">
            <img src="img/getflixlogo.png" class="d-block w-100" alt="logo getflix">
        </div>

        <div class="d-flex justify-content-center" style="padding-top: 30px; margin-bottom:200px;">
            <button type="button" class="btn btn-danger" style="background-color: red; margin-right: 150px; font-size: 20px; padding-left: 2rem; padding-right: 2rem;" onclick="window.location.href='signin.php'">SIGN IN</button>
            <button type="button" class="btn btn-danger" style="background-color: red; font-size: 20px; padding-left: 2rem; padding-right: 2rem;" onclick="window.location.href='login.php'">LOG IN</button>
        </div>

        
<!--Mailchimp SESSION-->
<?php session_start(); // place it on the top of the script ?>
<?php
    $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
    unset($_SESSION['msg']);
    echo $statusMsg;
?>
        <!---Mailchimp FORM-->
        <div class="text-center w-25 " id="newsletter">
        <form  style="max-widht: 100px; margin:auto;"method="post" action="action.php" class="white">
        <h2 class="h3 mb-3 font-weight-normal"> SUBSCRIBE TO OUR NEWSLETTER </h2>
            <p id="badPw1"></p>
    <p><label for="fname" class="sr-only"> </label><input type="text" name="fname" class="form-control" placeholder="First Name" required /></p>
    <p><label for="fname" class="sr-only">  </label><input type="text" name="lname" class="form-control" placeholder="Last Name" required /></p>
    <p><label for="fname" class="sr-only"></label><input type="text" name="email" class="form-control" placeholder="email" required /></p>
    <p><input type="submit" name="submit" value="SUBSCRIBE"/></p>
</form>
</div>

 
        <!--Footer-->
    <?php

    include_once('sources/footer.php');
}
    ?>
    </body>

    </html>