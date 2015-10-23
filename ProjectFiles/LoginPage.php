<?php
include('/php/Login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: LoginSuccess.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/css/Main.css" />
	<title>Login Form in PHP with Session</title>
	
</head>
<body>

<div id="header">
<h1>Login Page</h1>
</div>
<br>
<div id="nav" name="nav">
	<ul>
		<li><a href="Teams.php">Search for teams</a></li>
		<li><a href="Player.php">Search for player</a></li>
		<li><a href="CreateUser.php">Create User</a></li>
		<li><a href="HomePage.php">HomePage</a></li>
	</ul>
</div>
<div id="section" name="section">
	<h1> Test user: bwood134 Password: Bwood134$</h1>
	<h2>Login Form</h2>
	<form action="" method="post">
		<label>UserName :</label>
		<input id="name" name="username" placeholder="username" type="text">
		<label>Password :</label>
		<input id="password" name="password" type="password">
		<input name="submit" type="submit" value=" Login ">
		<span><?php echo $error; ?></span>
	</form>
</div>


</body>
</html>