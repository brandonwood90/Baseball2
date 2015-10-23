<?php
include('/php/UserCreatePHP.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: /php/LoginSuccess.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/css/Main.css" />
	<title>Baseball</title>
</head>
<body>

<div id="header">
	<h1>Create User</h1>
</div>
<br>
<div name="nav" id="nav" >
<ul>
	<li><a href="Teams.php">Search for teams</a></li>
	<li><a href="Player.php">Search for player</a></li>
	<li><a href="HomePage.php">HomePage</a></li>
	<li><a href="LoginPage.php">Log in</a></li>
</ul>
</div>

<div name="section" id="section">
<h1>Test user: bwood134 Password: Bwood134$</h1>
<h2>Create User Form</h2>

<form action="" method="post">
<label>Firstname :</label>
<input id="firstname" name="firstname" placeholder="firstname" type="text">
<br>
<label>Lastname :</label>
<input id="lastname" name="lastname" placeholder="lastname" type="text">
<br>
<label>UserName :</label>
<input id="username" name="username" placeholder="username" type="text">
<br>
<label>E-mail :</label>
<input id="email" name="email" placeholder="E-mail" type="text">
<br>
<label>Password :</label>
<input id="password" name="password" type="password">
<br>
<label>Verify Password :</label>
<input id="vpassword" name="vpassword" type="password">
<br>
<input name="submit" type="submit" value=" Login ">
<span id = "error" name = "error"><?php echo $error; ?></span>
</form>
</div>

</body>
</html>