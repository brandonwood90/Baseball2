




<?php 

include 'baseBall_db.class.php';


class baseBall_db_write extends baseBall_db_AClass
{
	
	private $queryResultArray;
	
	public function __construct($dbServer,$dbUser,$dbpass,$dbDataName)
	{
		parent::_construct($dbpass,$dbServer,$dbUser,$dbDataName);
	}
	
	public function createQuery(String $queryInfo)
	{
		$this->queryResultArray = parent::queryDB("INSERT INTO $queryInfo;");
	}
	
	public function createQuery(String $queryInfo,String $tableInfo)
	{
		$this->queryResultArray = parent::queryDB("INSERT INTO $queryInfo $tableInfo;");
	}
	
	public function  createQuery(array $queryInfo)
	{
		if(is_array($queryInfo))
		{
			$queryString = "INSERT INTO ";
			
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
	
	
	
}



?>


