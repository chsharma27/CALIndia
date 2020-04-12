<?php include 'header.html'?>
<form action="welcome.php" method="POST">
			<fieldset>
				<legend>Fill up the following form</legend>
				<label for = "name">Name:</label>&nbsp
				<input type = "text" name ="name"><br>
				<label for = "email"> E-mail:</label>
				<input type = "email" name="email"><br>
				<input type="submit" value="Submit">
			</fieldset>
</form>
<?php include 'footer.html'?>
