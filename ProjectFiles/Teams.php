<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include('/php/TeamPHP.php'); 
?>

<html xmlns="http://www.w3.org/1999/xhtml>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teams</title>
<link rel="stylesheet" type="text/css" href="/css/Main.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function getYears(val)
{
   $.ajax(
   {
     type: 'post',
     url: '/php/TeamAjax.php',
     data: 
	 {
       TeamSelected:val
     },
     success: function (response) 
	 {
       document.getElementById("TeamYearsSel").innerHTML=response; 
     }
   });
   
	$('#TeamPlayersSel')
    .find('option')
    .remove()
    .end()
	;
}
function getPlayerNames()
{
	
	var TeamNamesSel = document.getElementById('TeamNamesSel');
	var TeamYearsSel = document.getElementById('TeamYearsSel');
	
   $.ajax(
   {
     type: 'post',
     url: '/php/TeamAjax.php',
     data: 
	 { TeamName:TeamNamesSel.value, TeamYear:TeamYearsSel.value },
     success: function (response) 
	 {
       document.getElementById("TeamPlayersSel").innerHTML=response; 
     }
   });
 
}
</script>
</head>

<body>

<div id="header">
	<h1>Teams</h1>
</div>
<br>
<div id="nav">
	<ul>
		<li><a href="HomePage.php">Back to the team</a></li>
		<li><a href="Player.php">Search By Player</a></li>
		<li><a href="CreateUser.php">Create User</a></li>
		<li><a href="LoginPage.php">Login</a></li>
	</ul>
</div>
<br>
<div name="section" id="section">
<form action="" name="TeamForm" method="post">
	<select name="TeamNamesSel" id="TeamNamesSel" onChange="getYears(this.value);">
		<?php echo($teamsOutput); ?>
	</select>
	<select name="TeamYearsSel" id="TeamYearsSel" onChange="getPlayerNames();"></select>
	<select name="TeamPlayersSel" id="TeamPlayersSel" ></select>
	<input name="submit" type="submit">
</form>

<div name="PHPGenerated" id ="PHPGenerated">
<?php echo($playerInfo) ?>
<?php echo($battingTable) ?>
<?php echo($fieldingTable) ?>
<?php echo($pitchingTable) ?>
<?php echo($teamTable) ?>
</div>
</div>

</body>
</html>
