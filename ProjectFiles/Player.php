<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
include('/php/PlayerPHP.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Player</title>
<link rel="stylesheet" type="text/css" href="/css/Main.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript"> 
function getPlayer(val)
{
	
	var str = val.split("#")[1];
	$.ajax(
   {
     type: 'post',
     url: '/php/PlayerAjax.php',
     data: 
	 {
       aPlayerID:str
     },
     success: function (response) 
	 {
       document.getElementById("PHPGenerated").innerHTML=response; 
     }
   });
   
	
}
</script>
</head>

<body>

<div id="header">
	<h1>Player Stats</h1>
</div>
<br>
<div id="nav">
	<ul>
		<li><a href="Teams.php">Back to teams</a></li>
		<li><a href="HomePage.php">Home Page</a></li>
		<li><a href="CreateUser.php">Create User</a></li>
		<li><a href="LoginPage.php">Login</a></li>
	</ul>
</div>

<br>
<div id="section">
	<form name="PlayerForm" id="PlayerForm" action="Player.php" method="Post">
		First name: <input type="text" name="PlayerFirstname">
		Last name: <input type="text" name="PlayerLastname">
		<input name="submit" type="submit" value="Find Player">
	</form>
</div>
<div name="phpError" id="phpError"><?php echo($error); ?></div>
<div name="PHPGenerated" id ="PHPGenerated">
<?php echo($playerTable) ?>
<?php echo($playerInfo) ?>
<?php echo($battingTable) ?>
<?php echo($fieldingTable) ?>
<?php echo($pitchingTable) ?>
</div>
<br>

</body>
</html>
