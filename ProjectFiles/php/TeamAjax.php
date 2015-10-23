<?php
include('Functions.php');
if(isset($_POST['TeamSelected'])) 
{
	
	$connection = mysqli_connect("localhost", "root", "", "baseball");
	$TeamName = mysqlsafe($_POST['TeamSelected'],$connection);
	
	$query = mysqli_query($connection, "SELECT  yearID FROM teams WHERE name='$TeamName'");
	echo "<option disabled selected hidden>Choose A Team</option>\n";
	while($row = mysqli_fetch_assoc($query)) 
	{
        echo "<option value='" . $row["yearID"] . "'>" . $row["yearID"] . "</option>\n";
    }
	//echo($input);
}
else if(isset($_POST['TeamYear']))
{
	$connection = mysqli_connect("localhost", "root", "", "baseball");
	$TeamName = mysqlsafe($_POST['TeamName'],$connection);
	$TeamYear = mysqlsafe($_POST['TeamYear'], $connection);
	
	
	$query = mysqli_query($connection, "
SELECT master.playerID AS playerID, master.nameFirst AS Firstname, master.nameLast AS Lastname
FROM `appearances`
INNER JOIN master ON appearances.playerID = master.playerID
INNER JOIN teams ON appearances.teamID = teams.teamID 
WHERE teams.name = '$TeamName'
AND appearances.yearID = '$TeamYear'
Group BY master.playerID
ORDER BY nameLast ASC, nameFirst ASC");

	 echo "<option disabled selected hidden>Choose A Player or Click Submit</option>\n";
	while($row = mysqli_fetch_assoc($query)) 
	{
		echo "<option value='" . $row["playerID"] . "'>" . $row["Firstname"] . " " . $row["Lastname"] . "</option>\n";
    }
}

?>