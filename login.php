<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body class="background">
    <?php require 'navbar.php'?>
        <div class="user">
            <header class="user__header">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
                <h1 class="user__title">Welcome Back!</h1>
            </header>
    
            <form class="form" action="db/login.php" method="post">
                <div class="form__group">
                    <input type="text" placeholder="username" name= "username" class="form__input" id="username" required>
                </div>
        
                <div class="form__group">
                    <input type="password" placeholder="Password"name= "password" class="form__input" id="password" required >
                </div>
        
                <input class="btn-signup"type="submit" value="Login" name="loginsubmit">
               
            </form>
            <p class="bottom">Don't have an account?<a href="signup.php" class="bottom"> Signup now </a></p>
        </div>
    
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>