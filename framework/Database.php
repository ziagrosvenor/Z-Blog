<?php 

class Database
{
	/*
	 * Database properties
	 */
	private $server 	 = 'localhost';
	private $username = 'root';
	private $password = 'root';
	private $database = 'posts';
	public $pdo;
	
	// Public static property used to instantiate singleton
	public static $instance;

	/**
	 * Static method used to instantiate singleton
	 * @return [object] Database object
	 */
	public static function getInstance() {
		if (!isset($instance)) {
			Database::$instance = new Database();
		}
		return Database::$instance;
	}

	/**
	 * Contructor magic method connects to the database upon instantiation
	 */
	private function __construct() 
	{
		$this->connect();
	}

	/**
	 * Connects to the database
	 */
	private function connect()
	{	
		// Assign dsn string
		$dsn = 'mysql:host=' . $this->server . ';dbname=' . $this->database;

		// Assign connection to $pdo
		$pdo = new PDO($dsn, $this->username, $this->password);

		// $pdo inside the function is added to the objects parameter pdo
		else {
			$this->pdo = $pdo;
		}
	}

	/**
	 * Queries database for the argument $sql
	 * @param  string $sql
	 * @return Sql Query $statement
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