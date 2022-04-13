<?php
session_start();
include('db/connect.php');
if(!isset($_GET['id'])){
  die("can not access");
}else{
    $book_id = $_GET['id'];
    $query = "SELECT * FROM books WHERE id=$book_id";
    $q = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($q);
}

?>

<html>
  <head>
      <title>Home-Lerners Padt</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
<body>
<?php include('nav.php');?>    
 
<div class="container">
   <div class="row justify-content-md-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3><?php echo $result['title'];?></h3>
                    <span>Posted Date : <?php echo $result['postDate'];?> </span>
                </div>
                <div class="card-body">
                    <img src="<?php echo $result['image'];?>">
                    <hr/>
                    <?php echo $result['descriptions'];?>
                </div>
                </div>
            </div>
        </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>