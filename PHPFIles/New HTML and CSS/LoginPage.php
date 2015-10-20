<?php
include('Login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: LoginSuccess.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>

</head>
<body>
<div id="main">
<h1> Test user: bwood134 Password: Bwood134$</h1>
<div id="login">
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
</div>
<ul>
<li><a href="Teams.php">Search for teams</a></li>
<li><a href="Player.php">Search for player</a></li>
<li><a href="CreateUser.php">Create User</a></li>
<li><a href="LoginPage.php">Log in</a></li>
</ul>
</body>
</html>