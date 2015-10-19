


<?php 

include 'baseBall_db.class.php';


class baseBall_db_read extends baseBall_db_AClass
{
	
	private $queryResultArray;
	
	public function __construct($dbServer,$dbUser,$dbpass,$dbDataName)
	{
		parent::_construct($dbpass,$dbServer,$dbUser,$dbDataName);
	}
	
	public function createQuery(String $queryInfo)
	{
		$this->queryResultArray = parent::queryDB("SELECT $queryInfo;");
	}
	
	public function createQuery(String $queryInfo,String $tableInfo)
	{
		$this->queryResultArray = parent::queryDB("SELECT $queryInfo $tableInfo;");
	}
	
	public function  createQuery(array $queryInfo)
	{
		if(is_array($queryInfo))
		{
			$queryString = "SELECT ";
			
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
	
	public function getAllTeams()
	{
		parent::queryDB("CALL getAllTeams();");
		$this->queryResultArray = parent::getResultsArray();
	}
	
	public function getAllYearsofTeams(String $searchTeam)
	{
		parent::queryDB("CALL getAllYearsofTeam($searchTeam);");
		$this->queryResultArray = parent::getResultsArray();
	}
	
	public function getAllPlayerYearTeam(String $searchTeam, String $searchYear)
	{
		parent::queryDB("CALL getAllPlayerYearTeam($searchTeam,$searchYear);");
		$this->queryResultArray = parent::getResultsArray();
	}
	
	public function getPlayerInfo(String $playerID)
	{
		parent::queryDB("CALL getPlayerInfo($playerID);");
		$this->queryResultArray = parent::getResultsArray();
	}
	
	public function getPlayerPitchingStats(String $playerID)
	{
		parent::queryDB("CALL getPlayerPitchingStats($playerID);");
		$this->queryResultArray = parent::getResultsArray();
	}
	
	public function getPlayerFieldingStats(String $playerID)
	{
		parent::queryDB("CALL getPlayerFieldingStats($playerID);");
		$this->queryResultArray = parent::getResultsArray();
	}
	
	public function getPlayerBattingStats(String $playerID)
	{
		parent::queryDB("CALL getPlayerBattingStats($playerID);");
		$this->queryResultArray = parent::getResultsArray();
	}
	
	
}



?>


