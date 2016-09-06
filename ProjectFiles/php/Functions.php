<?php
//makes string safe for mysql database
function mysqlsafe($string, $connection)
{
	$safeString = mysqli_real_escape_string($connection, stripslashes($string));
	return $safeString;
}
//removes spaces and everything after
function RemoveSpacePlus($string)
{
	$string = strtok($string,' ');
	return $string;
}

//Gets the average number of hits divided by at bats (H/AB).
function getAverage( $hits, $atBats)
{
	$average = 0;
	if (!$atBats == 0)	
	{	
		$average = $hits / $atBats;
	}

	return number_format($average,  3);
}

//SLG = (H+2B+(2*3B)+(3*HR))/AB
function getSluggingPercent($H,$H2B,$H3B,$HR, $AB)
{
	$slugging = 0;
	if (!$AB == 0)
	{
		$slugging =  ($H+$H2B+(2*$H3B)+(3*$HR))/$AB;
	}
	
	return number_format($slugging, 3);
}

// (H + BB + HBP)/(AB + BB + HBP + SF)
function getOnBasePercent($H, $BB, $HBP, $AB, $SF)
{	
	$onBasePercentLocal = 0;
	if (($AB + $BB + $HBP + $SF) != 0)
	{
		$onBasePercentLocal = ($H + $BB + $HBP)/($AB + $BB + $HBP + $SF);
	}
	
	return number_format($onBasePercentLocal, 3);
}
//OBP+SLG
function getOnBasePercentPlusSlugging($OBP,$SLG)
{
	$total = $OBP + $SLG;
	return number_format($total, 3);
}
/* 
getERA
The average number of earned runs allowed by a pitcher; total number of earned runs allowed multiplied by 9 divided by the number of innings pitched. ((ERx9)/IP)
*/
function getEra($earnedRuns,$outsPitched )
{
	$era = 0;
	if($outsPitched !=0)
	{
		$era = ($earnedRuns * 9)/($outsPitched/3);
	}
	
	return number_format($era, 2);
	
}

/*
The average number of walks and hits by a pitcher, Hits plus walks allowed divided by innings pitched ((H+W)/IP)

*/

function getWhip($hits, $walks, $outsPitched )
{
	$whip = 0;
	if ($outsPitched != 0)
	{
		$whip = ($hits + $walks) * 3/ ($outsPitched);
	}
	
	return number_format($whip, 2);
}

/*
fielding functions

*/
/*
old range factor formula
mlb uses this formula
RF = (PO + $A)/G
*/
function getOldRangeFactor($PO, $A, $G)
{
	$rangeFactor = 0;
	if ($G != 0)
	{
		$rangeFactor = ($PO + $A)/ $G;
	}
	
	return number_format($rangeFactor, 2);
}
/*
//new range factor formula
RF = 9 *(PO+ A)/(InnOuts / 3))
*/

function getNewRangeFactor($putOuts , $assists , $innouts)
{
	$rangeFactor = 0;
	if (($innouts / 3) != 0)
	{
		$rangeFactor = 9 *($putOuts + $assists)/($innouts / 3);
	}	
	
	return number_format($rangeFactor, 2);
}

/*
Formula: (putouts + assists)/(putouts + assists + errors) 
*/

function getFieldingPercent($putouts, $assists, $errors)
{ 
	$feildingPercent = 0;
	if (($putouts + $assists + $errors) != 0 )
	{
		$feildingPercent =  ($putouts + $assists)/($putouts + $assists + $errors);
	}
	return number_format($feildingPercent, 3);
}
?>