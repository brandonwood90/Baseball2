<?php
include('Functions.php');
include('PlayerFunctions.php');
$playerInfo = "";
$battingTable = "";	
$fieldingTable = "";
$pitchingTable = "";
$playerTable = "";
$teamTable = "";

$connection = mysqli_connect("localhost", "root", "", "baseball");
$query = mysqli_query($connection, "SELECT  name FROM teams GROUP BY name");
$teamsOutput = "<option disabled selected hidden>Choose A Team</option>\n";

while($row = mysqli_fetch_assoc($query)) {
        $teamsOutput .=  "\t<option value='" . $row["name"] . "'>" . $row["name"] . "</option>\n";
    }
mysqli_close($connection);

if(isset($_POST['submit']))
{
	if(isset($_POST['TeamNamesSel']) && isset($_POST['TeamYearsSel']) && isset($_POST['TeamPlayersSel']))
	{
		$playerID = $_POST['TeamPlayersSel'];
		$playerInfo = getPlayerInfo($playerID);
		$battingTable = getPlayerBatting($playerID);
		$fieldingTable = getPlayerFielding($playerID);
		$pitchingTable = getPlayerPitching($playerID);
	}
	else if (isset($_POST['TeamNamesSel']) && isset($_POST['TeamYearsSel']))
	{
		$connection = mysqli_connect("localhost", "root", "", "baseball");
		$teamName = mysqlsafe($_POST['TeamNamesSel'], $connection);
		$teamYear = mysqlsafe($_POST['TeamYearsSel'], $connection);
		
		$query = mysqli_query($connection, "SELECT  name, yearID, lgID, divID, G, GHome, W, L,DivWin, WCWin, LgWin, WSWin, R, AB, H, 2B, 3B, HR, BB, SO, SB, CS, HBP, SF, RA, ER, ERA, CG, SHO, SV, IPOuts, HA, HRA, BBA, SOA, E, DP, FP, park, attendance, BPF, PPF FROM teams WHERE name='$teamName' AND yearID='$teamYear'");
		$rowCount = mysqli_num_rows($query);
		
		if($rowCount == 1)
		{
			$teamTable= "<br><h1>Team</h1>\n";
			$teamTable.= "<table>\n";
			$teamTable.= "\t<tr>\n";
			$teamTable.= "\t\t<th>Team</th>\n";
			$teamTable.= "\t\t<th>Year</th>\n";
			$teamTable.= "\t\t<th>League</th>\n";
			$teamTable .= "\t\t<th>Div</th>\n";
			$teamTable .= "\t\t<th>G</th>\n";
			$teamTable .= "\t\t<th>GHome</th>\n";
			$teamTable .= "\t\t<th>W </th>\n";
			$teamTable .= "\t\t<th>L</th>\n";
			$teamTable .=  "\t\t<th>DivWin</th>\n";
			$teamTable .= "\t\t<th>WCWin</th>\n";
			$teamTable .= "\t\t<th>LgWin</th>\n";
			$teamTable .= "\t\t<th>WSWin</th>\n";
			$teamTable .= "\t\t<th>R</th>\n";
			$teamTable .= "\t\t<th>AB</th>\n";
			$teamTable .= "\t\t<th>H</th>\n";
			$teamTable .= "\t\t<th>2B</th>\n";
			$teamTable .= "\t\t<th>3B</th>\n";
			$teamTable .= "\t\t<th>HR</th>\n";
			$teamTable .= "\t\t<th>BB</th>\n";
			$teamTable .= "\t\t<th>SO</th>\n";
			$teamTable .= "\t\t<th>SB</th>\n";
			$teamTable .= "\t\t<th>CS</th>\n";
			$teamTable .= "\t\t<th>HBP</th>\n";
			$teamTable .= "\t\t<th>SF</th>\n";
			$teamTable .= "\t\t<th>RA</th>\n";
			$teamTable .= "\t\t<th>ER</th>\n";
			$teamTable .= "\t\t<th>ERA</th>\n";
			$teamTable .= "\t\t<th>CG</th>\n";
			$teamTable .= "\t\t<th>SHO</th>\n";
			$teamTable .= "\t\t<th>SV</th>\n";
			$teamTable .= "\t\t<th>IPOuts</th>\n";
			$teamTable .= "\t\t<th>HA</th>\n";
			$teamTable .= "\t\t<th>HRA</th>\n";
			$teamTable .= "\t\t<th>BBA</th>\n";
			$teamTable .= "\t\t<th>SOA</th>\n";
			$teamTable .= "\t\t<th>E</th>\n";
			$teamTable .= "\t\t<th>DP</th>\n";
			$teamTable .= "\t\t<th>FP</th>\n";
			$teamTable .= "\t\t<th>park</th>\n";
			$teamTable .= "\t\t<th>attendance</th>\n";
			$teamTable .= "\t\t<th>BPF</th>\n";
			$teamTable .= "\t\t<th>PPF</th>\n"; 
			$teamTable.= "\t</tr>\n";
			
			$row = mysqli_fetch_assoc($query);
		
			
			$teamTable .= "\t<tr>\n";
			$teamTable .= "\t\t<td>" . $row['name'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['yearID'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['lgID'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['divID'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['G'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['GHome'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['W'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['L'] . "</td>\n";
			$teamTable .=  "\t\t<td>" . $row['DivWin'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['WCWin'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['LgWin'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['WSWin'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['R'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['AB'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['H'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['2B'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['3B'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['HR'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['BB'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['SO'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['SB'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['CS'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['HBP'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['SF'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['RA'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['ER'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['ERA'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['CG'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['SHO'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['SV'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['IPOuts'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['HA'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['HRA'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['BBA'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['SOA'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['E'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['DP'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['FP'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['park'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['attendance'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['BPF'] . "</td>\n";
			$teamTable .= "\t\t<td>" . $row['PPF'] . "</td>\n"; 
			$teamTable.= "\t</tr>\n";   
			$teamTable.= "</table>\n";
			mysqli_close($connection);
		}
	}
	else if(isset($_POST['TeamNamesSel']))
	{
		$connection = mysqli_connect("localhost", "root", "", "baseball");
		$teamName = mysqlsafe($_POST['TeamNamesSel'], $connection);
		
		$query = mysqli_query($connection, "SELECT  name, yearID, lgID, divID, G, GHome, W, L,DivWin, WCWin, LgWin, WSWin, R, AB, H, 2B, 3B, HR, BB, SO, SB, CS, HBP, SF, RA, ER, ERA, CG, SHO, SV, IPOuts, HA, HRA, BBA, SOA, E, DP, FP, park, attendance, BPF, PPF FROM teams WHERE name='$teamName'");
		$rowCount = mysqli_num_rows($query);
		
		if($rowCount >= 1)
		{
			$teamTable= "<br><h1>Team</h1>\n";
			$teamTable.= "<table>\n";
			$teamTable.= "\t<tr>\n";
			$teamTable.= "\t\t<th>Team</th>\n";
			$teamTable.= "\t\t<th>Year</th>\n";
			$teamTable.= "\t\t<th>League</th>\n";
			$teamTable .= "\t\t<th>Div</th>\n";
			$teamTable .= "\t\t<th>G</th>\n";
			$teamTable .= "\t\t<th>GHome</th>\n";
			$teamTable .= "\t\t<th>W </th>\n";
			$teamTable .= "\t\t<th>L</th>\n";
			$teamTable .=  "\t\t<th>DivWin</th>\n";
			$teamTable .= "\t\t<th>WCWin</th>\n";
			$teamTable .= "\t\t<th>LgWin</th>\n";
			$teamTable .= "\t\t<th>WSWin</th>\n";
			$teamTable .= "\t\t<th>R</th>\n";
			$teamTable .= "\t\t<th>AB</th>\n";
			$teamTable .= "\t\t<th>H</th>\n";
			$teamTable .= "\t\t<th>2B</th>\n";
			$teamTable .= "\t\t<th>3B</th>\n";
			$teamTable .= "\t\t<th>HR</th>\n";
			$teamTable .= "\t\t<th>BB</th>\n";
			$teamTable .= "\t\t<th>SO</th>\n";
			$teamTable .= "\t\t<th>SB</th>\n";
			$teamTable .= "\t\t<th>CS</th>\n";
			$teamTable .= "\t\t<th>HBP</th>\n";
			$teamTable .= "\t\t<th>SF</th>\n";
			$teamTable .= "\t\t<th>RA</th>\n";
			$teamTable .= "\t\t<th>ER</th>\n";
			$teamTable .= "\t\t<th>ERA</th>\n";
			$teamTable .= "\t\t<th>CG</th>\n";
			$teamTable .= "\t\t<th>SHO</th>\n";
			$teamTable .= "\t\t<th>SV</th>\n";
			$teamTable .= "\t\t<th>IPOuts</th>\n";
			$teamTable .= "\t\t<th>HA</th>\n";
			$teamTable .= "\t\t<th>HRA</th>\n";
			$teamTable .= "\t\t<th>BBA</th>\n";
			$teamTable .= "\t\t<th>SOA</th>\n";
			$teamTable .= "\t\t<th>E</th>\n";
			$teamTable .= "\t\t<th>DP</th>\n";
			$teamTable .= "\t\t<th>FP</th>\n";
			$teamTable .= "\t\t<th>park</th>\n";
			$teamTable .= "\t\t<th>attendance</th>\n";
			$teamTable .= "\t\t<th>BPF</th>\n";
			$teamTable .= "\t\t<th>PPF</th>\n"; 
			$teamTable.= "\t</tr>\n";
			
			while($row = mysqli_fetch_assoc($query)) 
			{
				$teamTable .= "\t<tr>\n";
				$teamTable .= "\t\t<td>" . $row['name'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['yearID'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['lgID'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['divID'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['G'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['GHome'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['W'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['L'] . "</td>\n";
				$teamTable .=  "\t\t<td>" . $row['DivWin'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['WCWin'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['LgWin'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['WSWin'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['R'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['AB'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['H'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['2B'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['3B'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['HR'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['BB'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['SO'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['SB'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['CS'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['HBP'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['SF'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['RA'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['ER'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['ERA'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['CG'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['SHO'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['SV'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['IPOuts'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['HA'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['HRA'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['BBA'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['SOA'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['E'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['DP'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['FP'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['park'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['attendance'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['BPF'] . "</td>\n";
				$teamTable .= "\t\t<td>" . $row['PPF'] . "</td>\n"; 
				$teamTable.= "\t</tr>\n";   
			}
			$teamTable.= "</table>\n";
			mysqli_close($connection);
		}
	}
}

function findTieGames($W,$L,$G)
{
	
}
?>