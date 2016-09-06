<?php
include('Functions.php');
include('PlayerFunctions.php');

$playerInfo = "";
$battingTable = "";	
$fieldingTable = "";
$pitchingTable = "";
$playerTable = "";
$error = "";

if (isset($_POST['submit']))
{

		$connection = mysqli_connect("localhost", "root", "", "baseball");
		$playerFirstname = mysqlsafe($_POST['PlayerFirstname'], $connection);
		$playerLastname =  mysqlsafe($_POST['PlayerLastname'], $connection);
	
		$query = mysqli_query($connection, "SELECT playerID, nameFirst, nameLast, weight, height, bats, throws, debut, finalGame, birthCity, birthState FROM master WHERE nameFirst='$playerFirstname' AND nameLast='$playerLastname'");
		$rowCount = mysqli_num_rows($query);
	
		if ($rowCount == 0)
		{
			$error = "Player name not contained in database.";
		}
		else if ($rowCount == 1)
		{
			$row = mysqli_fetch_assoc($query);
			$playerID = $row['playerID'];
			$playerInfo = getPlayerInfo($playerID);
			$battingTable = getPlayerBatting($playerID);
			$fieldingTable = getPlayerFielding($playerID);
			$pitchingTable = getPlayerPitching($playerID);
		}
		else if ($rowCount > 1)
		{
			
			$playerTable = "<table >\n";
			$playerTable .= "\t<tr>\n";
			$playerTable .= "\t\t<th>Name</th>\n";//rows will contain first and lastname
			$playerTable .= "\t\t<th>Weight(Pounds)</th>\n";
			$playerTable .= "\t\t<th>Height(Inches)</th>\n";
			$playerTable .= "\t\t<th>Birthplace</th>\n";// row will contain city and state of birth
			$playerTable .= "\t\t<th>Debut(YYYY-MM-DD)</th>\n";
			$playerTable .= "\t\t<th>Final Game(YYYY-MM-DD)</th>\n";
			$playerTable .= "\t</tr>\n";
		
			while($row = mysqli_fetch_assoc($query)) 
			{
				$playerTable .= "\t<tr>\n";
				$playerTable .= "\t\t<td>" . "<a href='#" . $row['playerID'] ."' onclick='getPlayer(this.href)'>" . $row['nameFirst'] . " " . $row['nameLast'] ."</a></td>\n";
				$playerTable .= "\t\t<td>" . $row['weight'] . "</td>\n";
				$playerTable .= "\t\t<td>" . $row['height'] . "</td>\n";
				$playerTable .= "\t\t<td>" . $row['birthCity'] . ", " . $row['birthState'] . "</td>\n";
				$playerTable .= "\t\t<td>" . RemoveSpacePlus($row['debut']) . "</td>\n";
				$playerTable .= "\t\t<td>". RemoveSpacePlus($row['finalGame']) . "</td>\n";
				$playerTable .= "\t</tr>\n";
			}
			$playerTable .= "</table>\n";
		}
		mysqli_close($connection);
}
?>