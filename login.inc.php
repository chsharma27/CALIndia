<?php
if(isset($_POST['login-submit'])){
  require 'dbh.inc.php';
  $user_usrName=$_POST['userName'];
  $user_pwd=$_POST['pwd'];
  $link=mysqli_connect($dbhost,$dbuser,$dbpwd) or die("Fail");
  mysqli_select_db($link,$dbname) or die("db not found");
  if(empty($user_usrName)||empty($user_pwd)){
    header("Location:../login.php?error=emptyfields&userName=".$user_usrName);
    echo "empty";
    exit();
  }
  $sql="select * from users where user_usrName=?;";
  $stmt=mysqli_stmt_init($link);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    echo "1fail to prepare";
    exit();
  }
  mysqli_stmt_bind_param($stmt,"s",$user_usrName);
  mysqli_stmt_execute($stmt);
  $result=mysqli_stmt_get_result($stmt);
  if($row=mysqli_fetch_assoc($result)){
    $pwdcheck=password_verify($user_pwd,$row['user_pwd']);
    if($pwdcheck==true){
      echo"wow";
      session_start();
      $_SESSION['user_id']=$row['user_id'];
      $_SESSION['user_usrName']=$row['user_usrName'];
      header("Location:../index.php?login=success");
    }
    else{
      header("Location:../login.php?error=invalidcredentials");
    }
  }    
}
else{
header("Location:../login.php");
}
?>
