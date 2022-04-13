<?php
    session_start();
    if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
    header('Location:login.php');
    }
    $id = $_SESSION['user_id']; 
    include('connect.php');
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);

    $categoryQuery ="SELECT * FROM category";
    $categoryResult=mysqli_query($conn,$categoryQuery);


?>




<div class="mb-3">
    <label for="" class="form-label">Genre</label>
        <select class="form-control" name="genre">
            <?php while ($row=mysqli_fetch_assoc($categoryResult)){ ?>
                <option value="<?php echo $row['id']; ?>"> 
                    <?php echo $row['genre']; ?> </option>
                        <?php } ?>
        </select>
</div>