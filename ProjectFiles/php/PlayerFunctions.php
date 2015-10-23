<?php
//include(Functions.php) used but called from parent

function getPlayerInfo($playerID)
{
	if (isset($playerID))
	{
		$connection = mysqli_connect("localhost", "root", "", "baseball");
		$playerID = mysqlsafe($playerID, $connection);
		//player info query
		$query = mysqli_query($connection ,"SELECT playerID, birthYear, nameFirst, nameLast, weight, height, bats, throws, debut, finalGame, birthCity, birthState FROM master WHERE playerID='$playerID'");
		
		$rowCount = mysqli_num_rows($query);//counts rows returned
		
		if($rowCount == 1)
		{
			$row = mysqli_fetch_assoc($query);
			//$playerTable .= "") reserved for playerimage
			
			$playerTable = "<b>Name: </b>" . $row['nameFirst'] . " " . $row['nameLast'] . "<br>\n" ;
		
			if (!is_null($row['birthYear']))
			{
				$playerTable .= "<b>BirtYear: </b>" . $row['birthYear'] . "<br>\n";
			}
			
			if (!is_null($row['birthCity']) && !is_null($row['birthState']))
			{
				$playerTable .= "<b>Birthplace: </b>" . $row['birthCity'] . ", " . $row['birthState'] ."<br>\n";
			}
			
			if (!is_null($row['bats']) && !is_null($row['throws']))
			{
				$playerTable .= "<b>Bats/Throws: </b>" . $row['bats'] . "/" . $row['throws'] ."<br>\n";
			}
			
			if (!is_null($row['debut']) )
			{
				$playerTable .= "<b>Debut: </b>" . RemoveSpacePlus($row['debut']) . "<br>\n";
			}
			
			if (!is_null($row['finalGame']))
			{
				$playerTable .= "<b>Final Game: </b>" . RemoveSpacePlus($row['finalGame']) . "<br>\n";
			}
		}
		
		
	}
	
	mysqli_close($connection);
	
	return $playerTable;
}

function getPlayerBatting($playerID)
{
	$battingTable = "";
	$connection = mysqli_connect("localhost", "root", "", "baseball");
	$playerID = mysqlsafe($playerID, $connection);
	$query = mysqli_query($connection,"SELECT PlayerID, yearID, teamID, lgID, G, AB, R, H, 2B, 3B, HR, RBI, SB, CS, BB, SO, IBB, HBP, SH, SF, GIDP FROM `batting` WHERE playerID = '$playerID' ORDER BY yearID ASC");
	$rowCount = mysqli_num_rows($query);
		
		if($rowCount >= 1)
		{
			$battingTable = "<br><h1>Batting</h1>\n";
			$battingTable .= "<table>\n";
			$battingTable .= "\t<tr>\n";
			$battingTable .= "\t\t<th>Year</th>\n";
			$battingTable .= "\t\t<th>Team</th>\n";
			$battingTable .= "\t\t<th>League</th>\n";
			$battingTable .= "\t\t<th>G</th>\n";
			$battingTable .= "\t\t<th>AB</th>\n";
			$battingTable .= "\t\t<th>R</th>\n";
			$battingTable .= "\t\t<th>H</th>\n";
			$battingTable .= "\t\t<th>2B</th>\n";
			$battingTable .= "\t\t<th>3B</th>\n";
			$battingTable .= "\t\t<th>HR</th>\n";
			$battingTable .= "\t\t<th>RBI</th>\n";
			$battingTable .= "\t\t<th>SB</th>\n";
			$battingTable .= "\t\t<th>CS</th>\n";
			$battingTable .= "\t\t<th>BB</th>\n";
			$battingTable .= "\t\t<th>SO</th>\n";
			$battingTable .= "\t\t<th>IBB</th>\n";
			$battingTable .= "\t\t<th>HBP</th>\n";
			$battingTable .= "\t\t<th>SH</th>\n";
			$battingTable .= "\t\t<th>SF</th>\n";
			$battingTable .= "\t\t<th>GIDP</th>\n";
			$battingTable .= "\t\t<th>AVG</th>\n";
			$battingTable .= "\t\t<th>OBP</th>\n";
			$battingTable .= "\t\t<th>SLG</th>\n";
			$battingTable .= "\t\t<th>OPS</th>\n";
			$battingTable .= "\t</tr>\n";
			while($row = mysqli_fetch_assoc($query)) 
			{
				if($row['AB'] != 0 || !is_null($row['AB']))
				{
					$battingTable .= "\t<tr>\n";
					$battingTable .= "\t\t<td>" . $row['yearID'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['teamID'] ."</td>\n";
					$battingTable .= "\t\t<td>". $row['lgID'] ."</td>\n";
					$battingTable .= "\t\t<td>" . $row['G'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['AB'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['R'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['H'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['2B'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['3B'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['HR'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['RBI'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['SB'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['CS'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['BB'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['SO'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['IBB'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['HBP'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['SH'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['SF'] . "</td>\n";
					$battingTable .= "\t\t<td>" . $row['GIDP'] . "</td>\n";
					$battingTable .= "\t\t<td>" . getAverage($row['H'],$row['AB']) . "</td>\n";
					$OBP = getOnBasePercent($row['H'], $row['BB'], $row['HBP'], $row['AB'], $row['SF']);
					$battingTable .= "\t\t<td>" . $OBP . "</td>\n";
					$SLG = getSluggingPercent($row['H'], $row['2B'], $row['3B'], $row['HR'],$row['AB']);
					$battingTable .= "\t\t<td>" . $SLG . "</td>\n";
					$battingTable .= "\t\t<td>" . getOnBasePercentPlusSlugging($OBP,$SLG) . "</td>\n";
					$battingTable .= "\t</tr>\n";
				}
			}
			$battingTable .= "</table>";
		}
	mysqli_close($connection);
	return $battingTable;
	
}
function getPlayerFielding($playerID)
{
	$fieldingTable = "";
	$connection = mysqli_connect("localhost", "root", "", "baseball");
	$playerID = mysqlsafe($playerID, $connection);
	$query = mysqli_query($connection,"SELECT PlayerID, yearID, teamID, lgID, POS, G, GS, InnOuts, PO, A, E, DP, PB, WP, SB, CS,ZR FROM fielding WHERE playerID = '$playerID' ORDER BY yearID ASC");
	$rowCount = mysqli_num_rows($query);
		
		if($rowCount >= 1)
		{
			$fieldingTable = "<br><h1>Fielding</h1>\n";
			$fieldingTable .= "<table>\n";
			$fieldingTable .= "\t<tr>\n";
			$fieldingTable .= "\t\t<th>Year</th>\n";
			$fieldingTable .= "\t\t<th>Team</th>\n";
			$fieldingTable .= "\t\t<th>League</th>\n";
			$fieldingTable .= "\t\t<th>POS</th>\n";
			$fieldingTable .= "\t\t<th>G</th>\n";
			$fieldingTable .= "\t\t<th>GS</th>\n";
			$fieldingTable .= "\t\t<th>Inn</th>\n";
			$fieldingTable .= "\t\t<th>PO</th>\n";
			$fieldingTable .= "\t\t<th>A</th>\n";
			$fieldingTable .= "\t\t<th>E</th>\n";
			$fieldingTable .= "\t\t<th>DP</th>\n";
			$fieldingTable .= "\t\t<th>PB</th>\n";
			$fieldingTable .= "\t\t<th>WP</th>\n";
			$fieldingTable .= "\t\t<th>SB</th>\n";
			$fieldingTable .= "\t\t<th>CS</th>\n";
			$fieldingTable .= "\t\t<th>ZR</th>\n";
			$fieldingTable .= "\t\t<th>FPCT</th>\n";
			$fieldingTable .= "\t\t<th>MLB RF</th>\n";
			$fieldingTable .= "\t\t<th>New RF</th>\n";
			$fieldingTable .= "\t</tr>\n";
			while($row = mysqli_fetch_assoc($query)) 
			{
				if($row['G'] != 0 || !is_null($row['G']))
				{
					$fieldingTable .= "\t<tr>\n";
					$fieldingTable .= "\t\t<td>" . $row['yearID']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['teamID']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['lgID']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['POS']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['G']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['GS']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . number_format(($row['InnOuts']/3), 1) . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['PO']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['A']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['E']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['DP']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['PB']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['WP']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['SB']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['CS']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . $row['ZR']  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . getFieldingPercent($row['PO'], $row['A'], $row['E'])  . "</td>\n";
					$fieldingTable .= "\t\t<td>" . getoldRangeFactor($row['PO'], $row['A'] , $row['G']) . "</td>\n";
					$fieldingTable .= "\t\t<td>" . getnewRangeFactor($row['PO'], $row['A'] , $row['InnOuts']) . "</td>\n";
					$fieldingTable .= "\t</tr>\n";
				}
			}
			$fieldingTable .= "</table>";
		}
	mysqli_close($connection);
	return $fieldingTable;
}
function getPlayerPitching($playerID)
{
	$pitchingTable = "";
	$connection = mysqli_connect("localhost", "root", "", "baseball");
	$playerID = mysqlsafe($playerID, $connection);
	$query = mysqli_query($connection,"SELECT PlayerID, yearID, teamID, lgID, W, L, G, GS, CG, SHO, SV, IPouts, H, ER, HR, BB, SO, BAOpp, IBB, WP, HBP, BK, BFP, GF, R, SH, SF, GIDP FROM pitching WHERE playerID = '$playerID' ORDER BY yearID ASC");
	$rowCount = mysqli_num_rows($query);
		
		if($rowCount >= 1)
		{
			$pitchingTable = "<br><h1>Pitching</h1>\n";
			$pitchingTable .= "<table>\n";
			$pitchingTable .= "\t<tr>\n";
			$pitchingTable .= "\t\t<th>Year</th>\n";
			$pitchingTable .= "\t\t<th>Team</th>\n";
			$pitchingTable .= "\t\t<th>League</th>\n";
			$pitchingTable .= "\t\t<th>W</th>\n";
			$pitchingTable .= "\t\t<th>L</th>\n";
			$pitchingTable .= "\t\t<th>ERA</th>\n";
			$pitchingTable .= "\t\t<th>G</th>\n";
			$pitchingTable .= "\t\t<th>GS</th>\n";
			$pitchingTable .= "\t\t<th>CG</th>\n";
			$pitchingTable .= "\t\t<th>SHO</th>\n";
			$pitchingTable .= "\t\t<th>SV</th>\n";
			$pitchingTable .= "\t\t<th>IP</th>\n";
			$pitchingTable .= "\t\t<th>H</th>\n";
			$pitchingTable .= "\t\t<th>ER</th>\n";
			$pitchingTable .= "\t\t<th>HR</th>\n";
			$pitchingTable .= "\t\t<th>BB</th>\n";
			$pitchingTable .= "\t\t<th>SO</th>\n";
			$pitchingTable .= "\t\t<th>IBB</th>\n";
			$pitchingTable .= "\t\t<th>WP</th>\n";
			$pitchingTable .= "\t\t<th>HBP</th>\n";
			$pitchingTable .= "\t\t<th>BK</th>\n";
			$pitchingTable .= "\t\t<th>BFP</th>\n";
			$pitchingTable .= "\t\t<th>GF</th>\n";
			$pitchingTable .= "\t\t<th>R</th>\n";
			$pitchingTable .= "\t\t<th>SH</th>\n";
			$pitchingTable .= "\t\t<th>SF</th>\n";
			$pitchingTable .= "\t\t<th>GIDP</th>\n";
			$pitchingTable .= "\t\t<th>AVG</th>\n";
			$pitchingTable .= "\t\t<th>WHIP</th>\n";
			$pitchingTable .= "\t</tr>\n";
			while($row = mysqli_fetch_assoc($query)) 
			{
				if($row['G'] != 0 || !is_null($row['G']))
				{
					$pitchingTable .= "\t<tr>\n";
					$pitchingTable .= "\t\t<td>" . $row['yearID']  . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['teamID']  . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['lgID']  . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['W'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['L'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . getEra($row['ER'],$row['IPouts']) . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['G'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['GS'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['CG'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['SHO'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['SV'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . number_format(($row['IPouts']/3), 1) . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['H'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['ER'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['HR'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['BB'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['SO'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['IBB'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['WP'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['HBP'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['BK'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['BFP'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['GF'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['R'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['SH'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['SF'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['GIDP'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . $row['BAOpp'] . "</td>\n";
					$pitchingTable .= "\t\t<td>" . getWhip($row['H'], $row['BB'] , $row['IPouts']) . "</td>\n";
					$pitchingTable .= "\t</tr>\n";
				}
			}
			$pitchingTable .= "</table>";
		}
	mysqli_close($connection);
	return $pitchingTable;
}
?>