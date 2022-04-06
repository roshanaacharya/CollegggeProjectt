<?php
  include('connect.php');
  if(isset($_POST['loginsubmit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];

      if($username==''){
          $msg = "username is required";
          header('Location:../login.php?errmsg=' +$msg);
      }
      if($password==''){
          $msg = "password is required";
          header('Location:../login.php?errmsg=' +$msg);
      }
    $encryptedPass = md5($password);  
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$encryptedPass'";
    $result = mysqli_query($conn,$query);
    
    $row = mysqli_num_rows($result);
    if($row==1){
        $data = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['login']=1;
        $_SESSION['user_id']= $data['id'];

        header('Location:../welcome.php');
    }else{
        header('Location:../login.php?errmsg=email and password does not match');
    }


  }

?>

