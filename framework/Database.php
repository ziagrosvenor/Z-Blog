<?php 

class Database
{
	/*
	 * Database properties
	 */
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
		// Assign dsn string
		$dsn = 'mysql:host=' . $this->server . ';dbname=' . $this->database;

		// Assign connection to $pdo
		$pdo = new PDO($dsn, $this->username, $this->password);

		// Echo failed if connection error
		if (mysqli_connect_errno()) {
			echo 'Failed to connect';
		}

		// $pdo inside the function is added to the objects parameter pdo
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
		// Prepare SQL query
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
}