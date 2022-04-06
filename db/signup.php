<?php 
  include('connect.php');
   if(isset($_POST['submit'])){
       $username = $_POST['username'];
       $email = $_POST['email'];
       $password = $_POST['password'];

     if($username==''){
         $msg = "name is required";
         header('Location:../signup.php?errmsg='.$msg);
     }        
     if($email==''){
         $msg = "email is required";
         header('Location:../signup.php?errmsg='.$msg);
     }

     if($password==''){
         $msg = "passowrd is required";
         header('Location:../signup.php?errmsg='.$msg);
     }
     $encryptedPassword = md5($password);
     $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$encryptedPassword')";
     if(mysqli_query($conn,$query)){
         $msg = "Your account has been created sucessfully.";
         header('Location:../login.php?msg='.$msg);
     }else{
         $msg = "Error: ".mysqli_error($conn);
         header("Location:../signup.php?errmsg=".$msg);
     }
   }else{
       $msg = "data is not acceptable";
       header("Location:../signup.php?errmsg=".$msg);
   }
?>