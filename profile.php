<?php
session_start();
include("sources/config.php");
include("sources/functions.php");

if(!isset($_SESSION['LOGGED_USER'])){
    header("Location:index.php");
} else {
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="sources/style.css">
    <title>GETFLIX</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Akronim&family=Goldman:wght@700&family=Festive&family=Press+Start+2P&display=swap"
        rel="stylesheet">
</head>

<body>


<!---------Header--------->

<?php include_once('sources/header.php'); ?>

<!-----Profile page------>
<div class="container-fluid padding">
    <div class="row paddin" style= "margin-top:150px;">
        <div id="pic" class="col-md-6">
            <div class="container-profilepic card rounded-circle overflow-hidden">
                <div class="photo-preview card-img w-100 h-100" style="justify-content:center;"></div>
                <div class="middle-profilepic text-center card-img-overlay d-none flex-column justify-content-center">
                    <div class="text-profilepic text-success">
                        <i class="fas fa-camera"></i>
                        <div class="text-profilepic">Change Picture</div>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-md-6">
            <div class="text-center mt-6 white" id="profilepage" >
                <form style="max-width: 300px;">

                    <h1 class="h3 mb-3 font-weight-normal"> USER PROFILE</h1>

                    <label for="username" class="sr-only"> </label>
                    <input type="text" name="username" id="username" maxlength="20" class="form-control"
                        placeholder=" Change username">

                    <label for="emailAdress" class="sr-only"> </label>
                    <input type="email" name="email" id="emailAdress" class="form-control" placeholder=" Change email adress">

                    <label for="password" class="sr-only"> </label>
                    <input type="password" name="password" id="password" placeholder=" Change password" class="form-control">

                    <label for="password" class="sr-only"> </label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"
                        class="form-control" onchange="check()" />
                    <span id='message'></span>

                    <div class="checkbox mt-3">
                        <label>
                            <input type="checkbox" name="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <div class="mt-3" style="margin-bottom: 150px;">
                        <button class="btn btn-lg btn-primary btn-block"> Save Changes </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>



    

    <!--Footer-->

    <?php include_once('sources/footer.php'); ?>

</body>
<?php
}
?>
</html>