<?php session_start();?>
<! DOCTYPE html>
<html lan="en">
	<head>
		<meta charset="utf-8" lan="en">
		<meta name=viewport content="width+device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Orbitron&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../style.css">
		<title>
			CALIndia
		</title>
		<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/
		html5shiv.min.js">
		</script >
		<![endif]-->
	</head>
	<body>
		<header>
			<h1 align="center">CALIndia</h1>
		</header>
		<nav>
			<div id="nav-div">
				<ul>
				    <li class="nav-list"><a href="index.php">Home</a></li>
					<li class="nav-list"><a href="Web_application.php">Web Application</a></li>
					<li class="nav-list"><a href="Net_security.php">Network Security</a></li>
					<li class="nav-list"><a href="contact.php">Contact us</a></li>
					<?php 
			                        if(isset($_SESSION['user_id'])){
			                                echo "<li class='nav-list'><a href='logout.php'>logout</a></li>";
			                        }
                			        else {
		                	                echo "<li class='nav-list'><a href='login.php'>login</a></li>";
				                     }?>
			</div>
		</nav>
		<?php 
			if(isset($_SESSION['user_id'])){
				echo "<p>You are logged in</p>";
			}
			else {
				echo "<p> You are not logged in</p>";
			}
?>
