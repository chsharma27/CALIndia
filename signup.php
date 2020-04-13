<?php include 'header.php'?>
<?php 
  if(isset($_GET['error'])){
    if($_GET['error']="emptyfields"){
      echo "<p>Fill up all the entries</p>";
    }
    if($_GET['error']="invalid_email"){
      echo "<p>Please enter correct email address</p>";
    }
    if($_GET['error']="invalidusername"){
      echo"<p>Please enter valid username</p>";
    }
    if($_GET['error']="passwordmismatch"){
      echo"<p>Entered passwords do not match</p>";
    }
    if($_GET['error']="userNamtaken"){
      echo "<p>Please try another username</p>";
    }} 
    elseif($_GET['signup']="success"){
      echo "<p>you have successfully signed up,please login </p>";
    }
  
?>
<form action="inc/signup.inc.php" method="POST">
  <input type="text" name="firstName" placeholder="First Name"><br>
  <input type="text" name="lastName" placeholder="Last Name"><br>
  <input type="text" name="userName" placeholder="User Name"><br>
  <input typ="email" name="email" placeholder="E-mail"><br>
  <input type="password" name="pwd" placeholder="password"><br>
  <input type="password" name="re-password" placeholder="Confirm Password"><br>
  <button type="submit" name="signup-submit">submit</button>
</form>
<?php include 'footer.html'?>
