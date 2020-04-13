<?php 
if(isset($_POST['signup-submit'])){
  $dbhost="localhost";
  $dbuser="root";
  $dbpwd="password";
  $dbname="login_system";
  $user_firstName=$_POST['firstName'];
  $user_lastName=$_POST['lastName'];
  $user_usrName=$_POST['userName'];
  $email=$_POST['email'];
  $user_pwd=$_POST['pwd'];
  $re_pwd=$_POST['re-password'];
  $link=mysqli_connect($dbhost,$dbuser,$dbpwd) or die("Fail");
  mysqli_select_db($link,$dbname) or die("db not found");
  if(empty($user_firstName)||empty($user_lastName)||empty($user_usrName)||empty($user_pwd)||empty($re_pwd)){
    header("Location:../signup.php?error=emptyfields&firstName=".$user_firstName."&lastName=".$user_lastName."&userName=".$user_usrName);
    exit();
    }
  elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    header("Location:../signup.php?error=invalid_email&firstName=".$user_firstName."&lastName=".$user_lastName."&userName=".$user_usrName);
    exit();
    }
  elseif(!preg_match("/^[a-zA-Z0-9]*$/",$user_usrName)){
    header("Location:../signup.php?error=invalidusername&firstName=".$user_firstName."&lastName=".$user_lastName."&email=".$email);
    exit();
    }
  elseif($user_pwd!=$re_pwd){
    header("Location:../signup.php?error=passwordmismatch&firstName=".$user_firstName."&lastName=".$user_lastName."&userName".$user_usrName);
    exit();
    }
  else{
    $sql="select *  from users where user_usrName=?;";
    $stmt=mysqli_stmt_init($link);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      echo "fail to prepare";
      exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$user_usrName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $result_check=mysqli_stmt_num_rows($stmt);
    if($result_check>0){      
      header("Location:../signup.php?error=userNamtaken&firstName=".$user_firstName."&lastName=".$user_lastName."&email=".$email);
      exit();
      }
    else{
      $hashed_pwd=password_hash($user_pwd,PASSWORD_DEFAULT);
      $sql="insert into users(user_firstName, user_lastName, user_usrName, user_pwd,user_email) values(?,?,?,?,?);";
      $stmt=mysqli_stmt_init($link);echo $user_pwd;
      if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "fail to prepare";
        exit();
      }
      mysqli_stmt_bind_param($stmt,"sssss",$user_firstName,$user_lastName,$user_usrName,$hashed_pwd,$email);
      mysqli_stmt_execute($stmt);
      header("Location:../signup.php?signup=success");
          /*if(!mysqli_query($link,$sql)){
       }else{
         }*/
      mysqli_stmt_close($stmt);
      mysqli_close($link);}
    }
  }
else {
  header("Location:../signup.php");
}
?>
