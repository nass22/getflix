<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="sources/styleLand.css">
    <title>GETFLIX</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akronim&family=Goldman:wght@700&family=Festive&family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body>
    <div class="Container">
        <div class="row">
            <nav class="navbar navbar-expand-xl bg-dark navbar-dark py-4 fixed-top">
                <a href="https://www.netflix.com/be-en/" class="navbar-brand fs-1">GETFLIX</a>
                <img id="logo" src="img/GX.png" alt="LOGO">
            </nav>

        </div>
        <img id="backgroundimg" src="img/movies.jpg" alt="NETFLIX">

        <div class="container">
            <div class="box">
                <img id="logobox" src="img/GX.png" alt="LOGO">
                <button type="button" class="button1" onclick="window.location.href='login.php'">
                    <span class="button__text">LOGIN</span>
                    <button type="button" class="button2" onclick="window.location.href='signin.php'">
                        <span class="button_text">REGISTER</span>
                    </button>
                    <h2> HELLO FRIEND <p>Bring your popcorn and enjoy watching</p>
                    </h2>
            </div>
        </div>
</body>
<footer class="col col-xl-12 bg-dark py-2 mt-2  border-white text-center text-white font-weight-bold fs-4 ">
    <p>NETFLIX STOLE OUR IDEA </p>
</footer>

</html>