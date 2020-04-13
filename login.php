<?php include 'header.php';?>
<?php
if(isset($_GET['error'])){
  if($_GET['error']="emptyfields"){
    echo "<p>PLease enter all the details.</p>";
  }
  if($_GET['error']="invalidcredentials"){
    echo "<p>Invalid Credentials</p>";
  }
}?>
<P>Log in with the credentials:<br>
<form method="POST" action="inc/login.inc.php">
  <input type="text" name="userName" placeholder="Username">
  <input type="password" name="pwd" placeholder="Password">
  <button type="submit" name="login-submit">Log in</button>
</form>
<hr>
<p>Not registered yet?, <a href="signup.php" alt="signup">Signup</a>.
<?php include 'login.html';?>
