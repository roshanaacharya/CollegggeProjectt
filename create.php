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

    
    $postQuery = "SELECT * FROM post";
    $postResult = mysqli_query($conn, $postQuery);

?>

<html>
        <head>
            <title>Learners padd</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        </head>
      <body>
            <?php include('include/nav.php');?>    
            
            <div class="container">
             <div class="row">
            <?php include('include/left-nav.php');?>    
               <div class="col-8">
                <table class="table">
                  <th>Title</th>
                  <th>post Date</th>
                  <th>Author</th>
                  <th>Action</th>
                  <?php while ($row = mysqli_fetch_assoc($postResult)){ ?>
                    <tr>
                      <td><?php echo $row ['title']; ?></td>
                      <td><?php echo $row ['author']; ?></td>
                      <td><?php echo $row ['postDate']; ?></td>
                      <td><a href="update-post.php?id=<?php echo $row ['id'];?>">update</a>| Delete </td>
                    </tr>
                    <?php } ?>
                  </table>
               </div>
             </div>
            </div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>