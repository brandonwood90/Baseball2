

<?php 

/*
 * created: Matthew Martin
 * date: 9/14/2015
 * 
 * 
 */
 
abstract class baseBall_db_AClass
{
	private $linkDB;//this will store the link to the database
	private $queryResults;//stores the results of the query
	
	protected function _construct($dbPassword, $dbServer,$dbUser,$databaseName)
	{
		/*
		 * this constructor excepts 4 pramables 
		 * $dbPassword = wich is the database password
		 * $dbServer = database server IP or name
		 * $dbUser = database username
		 * $databaseName = name of the database
		 * 
		 * this function will construct a object by setting 
		 * all of the class feilds to the proper pramable
		 * after doing so it will connect to the database
		 * and set the $linkDB = new mysqli() object
		 * 
		 * the mysqli object will be using the default port
		 * 
		 */
	
		$this->linkDB = new mysqli($this->server,$this->username,$this->password,$this->database);
		
		if($this->linkDB->connect_error)
		{
			printf("Connect failed: %s\n", $this->linkDB->connect_error);
			exit();
		}
	}
	
	public function queryDB($queryStatment)
	{
		
		$this->queryResults = $this->linkDB->query($queryStatment);
		
	}
	
	public function getResultsArray()
	{
		$resultArray;	
		
		for($i=0; $i < $this->getNumResults(); $i++)
		{
			$resultArray[$i] = $this->queryResults->fetch_array(MYSQLI_BOTH);
		}
		
		$this->queryResults->free();		
		return $resultArray;
	}
	
	public function getResults()
	{
		return $this->queryResults;
	}
	
	public function getNumResults()
	{
		return $this->queryResults->num_rows;
	}
	
	public function getErrorNum()
	{
		/*
		 * returns the error number of the last
		 * called sql query
		 * will return the error number if there is 
		 * an error or return 0 for no error
		 */
		
		return $this->linkDB->errno;
	}
	
	public function getErrorDescription()
	{
		/*
		 * returns a description of the last 
		 * error from a sql query
		 * will return the error in a String if
		 * there is an error or will return an
		 * empty String "" for no error
		 */
		
		return $this->linkDB->error;
	}
	
	public function closeDB()
	{
		$this->linkDB->close();
	}

	/*
	 * createQuery(String $queryInfo)is a function that
	 * will create a query for the database based off of the prama $queryInfo which
	 * should be String for of a query
	 * 
	 * createQuery(String $queryInfo, String $tableInfo) 
	 * $queryInfo = a string with the columns you want
	 * $tableInfo = a string with the table name you want
	 * 
	 * createQuery(array $queryInfo)
	 * $queryInfo = an single or multi dimmision array 
	 * with table and query informtion
	 * 
	 */
	abstract public function createQuery(String $queryInfo);
	abstract public function createQuery(String $queryInfo,String $tableInfo);
	abstract public function createQuery(array $queryInfo);
}


?>






