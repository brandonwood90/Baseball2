<?

abstract class Player_Class {

/*
batting variables

*/

$hits; 
$atBats;
$atBats ; 
$hits;
$secondBase;
$thirdBase;
$rbi;
$alksBatting;
$strikeOutsBatting;
$caughtStealingBatting;
$intionalWalksbatting;
$hitbyPitch;
$sacrificeBunt;
$sacrificeFly;
$totalBases;
$goundedDouble;
$goundedOutRatio;
$numberPitchesFced;
$planeAperance;


/*
pitching variables

*/

$earnedRuns;
$inningsPitched;
$runsAlowed;
$hitsAllowed ;
$totalOpponents;
$hitsAlowed;
$walksAloud; 
$homeRunsAllowed;
$gamesPitched;
$gamesStarted;
$gamesSaved;
$saveOpertunities;
$battersStruckOut;
$gamesCompleted;
$shutOuts;
$battershit;
$intWalksPitched;

/*
fielding variables

*/


$standInnings;
 $putOuts; $assist; 
 $inningsPlayed; 
 $outs;
  $partialInning;
 $totalChances;
 $errors;
 $doublePlay;
 $stolenBasesAllowed;
 $stealsCaught;

/*
batting functions


*/




/*
batting average

The average number of hits by a batter defined by hits divided by at bats (H/AB).

*/


function GetBattingAverage( $hits, $atBats)
{

if ($atBats != 0)
{

$average = $hits/ $atBats;
}
else{
$battingAverage = 0;

}




return $battingAverage;
}


function SluggingPercent($atBats , $totalBases)
{


if ($totalBases == 0)
{
$slugging = 0;
}
else
{
$slugging = $atBats / $totalBases ;
}
return $slugging;

}


/*
on base persent get total bases then balls 
*/

function GetOnBasePercent($getTotalBases, $balls )
{


$onBasePercentLocal = $getTotalBases + $ballsLocal;

return $onBasePercentLocal;
}


function GetTotalBases($hits, $secondBase, $thirdBase)
{

$totalBases = $hits + $secondBase + $thirdBase;

return $totalBases;
}



/*
pitching knives

*/





/*
pitching get ERA,
average and whip


*/

/* GetERA

The average number of earned runs allowed by a pitcher; total number of earned runs allowed multiplied by 9 divided by the number of innings pitched. ((ERx9)/IP)

*/

function GetEra($earnedRuns,$inningsPitched )
{
	
	if ($inningsPitched == 0)
	{
	$era = 0;
	}
	else{
$era = ($earnedRuns 	* 9)/$inningsPitched;
return $era;
	}
}

/*
The total number of hits allowed by the pitcher divided by the total number of opponent at-bats (H/AB)

*/

function GetPitchingAverage($hitsAllowed , $totalOpponents;)
{
	
	if($totalOpponents != 0)
	{

$pitchingAverage = $hitsAllowed / $totalOpponents;
}
else
{
$pitchingAverage =0;
}
return $pitchingAverage;

}

/*
The average number of walks and hits by a pitcher, Hits plus walks allowed divided by innings pitched ((H+W)/IP)

*/

function GetWhip($hits, $walks, $inningsPitched )
{
	
	
	($hits + $walks)/ $inningsPitched;
	
return $whip;
}

/*
fielding functions

*/

/*
RF = (Standard Innings per Game x (Putouts + Assists)) / (Innings Played + (Outs (Partial Innings) Played / 3))

*/
function GetRangeFactor($standInnings,$putOuts , $assist , $inningsPlayed , $outs , $partialInning)
{
	
$rangeDenom = 	($inningsPlayed + ($outs * $partialInnings)/3);

if ($rangeDenom != 0)
{
	
$ramgeFactor = $standInnings * ($putOuts + $assists)	/ $rangeDenom;
}
else
{
$rangeFactor = 0;
}


return $rangeFactor;
}

/*
Formula: Putouts + assists/putouts + assists + errors 
*/

function GetFieldingPercent($Putouts,$assists, $errors )
{


$fieldDenomnator = $putouts + $assists + $errors;
if ($fieldDenomnator != 0)
{

 $feildingPercent =  $Putouts + $assists/ ;
}
else
{
$feildingPercent = 0;
}
return $feildingPercent;
}
}

?>