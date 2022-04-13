<?php
session_start();
$user_id = $_SESSION['user_id'];
include('connect.php');
if(isset($_POST['title']) && isset($_POST['descriptions'] ) && isset($_POST['genre']) && isset($_POST['author']) ){
    $title = $_POST['title'];
    $descriptions = $_POST['descriptions'];
    $author = $_POST['author'];
    $category = $_POST['genre'];
    $file = $_FILES['image'] ['tmp_name'];
        $target = '../img/'.$_FILES['image'] ['name'];
        move_uploaded_file($file,$target);
        $postDate = date('Y-m-d');
        $location = 'img/'.$_FILES['image'] ['name'];
        $query = "INSERT INTO books (title, image, descriptions, author, postDate, category_id, user_id) VALUES ('$title','$location','$descriptions','$author','$postDate','$category','$user_id')";


if(mysqli_query($conn, $query)){
    $msg = "DATA INSERTED";
    header("Location: ../create-story.php?msg=".$msg);
}
else{
    $msg="some error occured :" .mysqli_error($conn);
    header("Location:../create-story.php?errmsg=".$msg);
}

}else{
    $msg="all field are required";
}
?>  