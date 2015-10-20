<?php
include('UserCreateMYSQL.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: LoginSuccess.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Baseball</title>

</head>
<body>
<div id="main">
<h1>Test user: bwood134 Password: Bwood134$</h1>
<div id="login">
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
</div>
<ul>
<li><a href="Teams.php">Search for teams</a></li>
<li><a href="Player.php">Search for player</a></li>
<li><a href="CreateUser.php">Create User</a></li>
<li><a href="LoginPage.php">Log in</a></li>
</ul>
</body>
</html>