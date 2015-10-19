


<?php 

include 'baseBall_db.class.php';


class baseBall_db_update extends baseBall_db_AClass
{
	
	private $queryResultArray;
	
	public function __construct($dbServer,$dbUser,$dbpass,$dbDataName)
	{
		parent::_construct($dbpass,$dbServer,$dbUser,$dbDataName);
	}
	
	public function createQuery(String $queryInfo)
	{
		$this->queryResultArray = parent::queryDB("UPDATE  $queryInfo;");
	}
	
	public function createQuery(String $queryInfo,String $tableInfo)
	{
		$this->queryResultArray = parent::queryDB("UPDATE $tableInfo SET $queryInfo;");
	}
	
	public function  createQuery(array $queryInfo)
	{
		if(is_array($queryInfo))
		{
			$queryString = "UPDATE ";
			
			for($j = 0; $j < count($queryInfo); $j++)
			{
				if(is_array($queryInfo[$j]))
				{					
					
					for($k = 0; $k < count($queryInfo[$j]); $k++)
					{
						$queryString .= $queryString[$j][$k];
					}
					parent::queryDB($queryString.";");
					$this->queryResultArray = parent::getResultsArray();
				}
				else
				{
					parent::queryDB($queryString.$queryInfo[$j].";");
					$this->queryResultArray = parent::getResultsArray();
				}
			}
		}
	}
	
	public function updateMaster(String $playerID, String $updateColumn, String $updateValue)
	{
		parent::queryDB("CALL updateMaster($playerID,$updateColumn,$updateValue);");		
	}
	
	
	public function updateTeam(String $teamID, String $yearID, String $updateColumn,String $updateValue)
	{
		parent::queryDB("CALL updateTeam($teamID,$yearID,$updateColumn,$updateValue);");
	}
	
	
	public function updateBatting(String $teamID, String $yearID,String $playerID, String $updateColumn,String $updateValue)
	{
		parent::queryDB("CALL updateBatting($teamID,$yearID,$playerID,$updateColumn,$updateValue);");
	}
	
	
	public function updatePitching(String $teamID, String $yearID,String $playerID, String $updateColumn,String $updateValue)
	{
		parent::queryDB("CALL updatePitching($teamID,$yearID,$playerID,$updateColumn,$updateValue);");
	}
	
	
	public function updateFielding(String $teamID, String $yearID,String $playerID, String $updateColumn,String $updateValue)
	{
		parent::queryDB("CALL updateFielding($teamID,$yearID,$playerID,$updateColumn,$updateValue);");
	}
	
	
}



?>


