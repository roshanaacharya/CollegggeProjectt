<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Signup</title>
  </head>
  <body class ="background">

    <?php require 'navbar.php'?>
    
        <div class="user">
            <header class="user__header">
                <h1 class="user__title">Signup </h1>
            </header>
    
            <form action="db/signup.php" class="form" method="POST">
                <div class="form__group">
                    <input type="text" name= "username" placeholder="username" class="form__input" id="username"  required>
                </div>
        
                <div class="form__group">
                    <input type="email" placeholder="Email" name= "email" class="form__input" id="email" required >
                </div>
        
                <div class="form__group">
                    <input type="password" name= "password" placeholder="Password" class="form__input" id="password" required>
                </div>
                <input class="btn-signup"type="submit" value="Sign Up" name="submit">
             <br>
                </form>
                <p class="bottom">Already an user?<a href="login.php" class="bottom"> Login here </a></p>
        </div>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>