<?php
session_start();
 if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
   header('Location:login.php');
 }
 $id = $_SESSION['user_id']; 
 include('db/connect.php');
 $query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);
$news = "SELECT * FROM books order by postDate desc";
$allNews = mysqli_query($conn,$news);



?>

<html>
  <head>
      <title>Home-Lerners padt</title>
      <link rel="stylesheet" href="https://rawgit.com/jgthms/minireset.css/master/minireset.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
<body>
<?php include('nav.php');?>    
<section id="first-section">
        <div id="title">
            <h1 class="bold-text uppercase-text title-text" id="series-title">Learners</h1>
            <h2 class="thin-text uppercase-text subtitle-text" id="author-title">padt</h2>
        </div>
        <div class="horizontal-block hero-covers">
            <img class="hero-book2" src="https://image.ibb.co/eQrGLq/book2.jpg" alt="Book 2">
            <img class="hero-book1" src="https://image.ibb.co/myb5DA/book1.jpg" alt="Book 1">
            <img class="hero-book3" src="https://image.ibb.co/c7VXtA/book3.jpg" alt="Book 3">
        </div>
</section>
    <div class="container">
      <div class="row justify-content-md-center">
          <div class="col-8">
            <?php while($row= mysqli_fetch_assoc($allNews)){ ?>
                
                <div class="card">
                  <h3 class="bold-text uppercase-text"><?php echo $row['title'];?></h3>
                  <div style="display:flex; justify-content:flex-start">
                    <img src="<?php echo $row['image'];?>"  class="cover" alt="...">
                    <p class="article-text" style="margin-left:-150px">
                      <?php echo substr($row['descriptions'],0,100); ?>
                    </p>
                    
                  </div>
                  <a href="details.php?id=<?php echo $row['id']; ?>" ><button class="btn btn-read bold-text uppercase-text color-book2" style="align-items:right;">Read</button></a>
                  
                </div>
                <br>
                <br>
                <?php } ?>
          </div>    
          
      </div>
      
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>