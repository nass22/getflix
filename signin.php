<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="sources/styleSign.css">
    <title>GETFLIX</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akronim&family=Goldman:wght@700&family=Festive&family=Press+Start+2P&display=swap" rel="stylesheet">

</head>
<body>

<!-- Verification for Password Javascript -->
<!-- 
<script>
function check() {
    if(document.getElementById('password').value ===
            document.getElementById('confirm_password').value) {
        document.getElementById('message').innerHTML = "Match";
    } else {
        document.getElementById('message').innerHTML = "No Match";
    }
}
</script>
-->

<img class = "mt-4 mb-4"  id = "logo" src= "img/logonetflix.png" height="180" alt="Getflix Logo">

<!-----Sign In------>


<div class="text-center mt-5" id="signIn">
    <form style ="max-width: 300px; margin:auto;" method="post" action="signinProcess.php">
      
    <h1 class="h3 mb-3 font-weight-normal"> SIGN IN </h1>

    <label for="username" class="sr-only"> </label>
    <input type="text" name= "username" id="username" maxlength="20"  class="form-control" placeholder="Username" >

    <label for="emailAdress" class="sr-only"> </label>
    <input type="email" name= "email" id="emailAdress" class="form-control" placeholder="Email">
    
    <label for="password" class="sr-only"> </label>
    <input type="password" name= "password" id="password" placeholder="Password" class="form-control">
    
    <label for="password" class="sr-only"> </label>
    <input type="password" name= "confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control"/>
    <span id='message'></span>

    <div class="checkbox mt-3">
        <label >
            <input type="checkbox"  name= "checkbox" value="remember-me"> Remember me 
        </label>
    </div> 
    <div class="mt-3">
        <button class = "btn btn-lg btn-primary btn-block"> Sign In </button>
    </div>
    </form>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
  </body>
</html>

</body>
</html>