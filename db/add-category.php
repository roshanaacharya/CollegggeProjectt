<?php 
include('connect.php');
if (isset ($_POST['genre'])){
    $category =$_POST['genre'];


        if($category!=''){
            $query = "INSERT INTO `category`(`genre`) VALUES ('$category')";
                 if(mysqli_query($conn,$query)){
            $msg ="Successfully Inserted";
                }else{
            $msg = mysqli_error();
        }
        header('Location:../category.php?msg='.$msg);
             }else{
        $msg ="Category name required";
        header('Location:../category.php>-?errmsg='.$msg);
        }
        }


?>