<?php
include('Functions.php');
include('PlayerFunctions.php');
//handles call from ajax from player.php
if(isset($_POST['aPlayerID']))
{
	//get player info 
	$playerID = $_POST['aPlayerID'];
	echo(getPlayerInfo($playerID)); //get player info table
	echo(getPlayerBatting($playerID));//get plater batting table
	echo(getPlayerFielding($playerID));//get player fielding table
	echo(getPlayerPitching($playerID));// get player pitching table
}


?>