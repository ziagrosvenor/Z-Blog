<?php 
class Database
{
	public $server 	 = 'localhost';
	public $username = 'root';
	public $password = 'root';
	public $database = 'posts';
	public $pdo;
	
	/**
	 * Self invoking function to always connect to db when using db class
	 */
	public function __construct() 
	{
		$this->connect();
	}

	/**
	 * Connects to the database
	 * @return mysqli object
	 */
	public function connect()
	{	
		$dsn = 'mysql:host=' . $this->server . ';dbname=' . $this->database;

		// assign connection to $con
		$pdo = new PDO($dsn, $this->username, $this->password);

		// Echo failed if connection error
		if (mysqli_connect_errno()) {
			echo 'Failed to connect';
		}
		// Used instead of return to update the database objects parameter
		// $con inside the function is added to the objects parameter con
		else {
			$this->pdo = $pdo;
		}
	}

	/**
	 * Queries database for the argument $sql
	 * @param  string $sql
	 * @return mysqli_query object
	 */
	public function query($sql)
	{	

		$statement = $this->pdo->prepare($sql);

		// when errors die error
		if (!$statement) {
			die(mysqli_error($this->pdo));
		} 
		// return mysql query array
		else {
			return $statement;
		}
	}

	// public function escape($string)
	// {
	// 	return mysqli_escape_string($this->, $string);
	// }
}