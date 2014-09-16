<?php 
class Database
{
	public $server 	 = 'localhost';
	public $username = 'root';
	public $password = 'root';
	public $database = 'posts';
	public $con;
	
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
		// assign connection to $con
		$con = mysqli_connect($this->server, $this->username, $this->password);
		// Select database
		mysqli_select_db($con, $this->database);
		// Echo failed if connection error
		if (mysqli_connect_errno()) {
			echo 'Failed to connect';
		}
		// Used instead of return to update the database objects parameter
		// $con inside the function is added to the objects parameter con
		else {
			$this->con = $con;
		}
	}
	/**
	 * Queries database for the argument $sql
	 * @param  string $sql
	 * @return mysqli_query object
	 */
	public function query($sql)
	{
		$result = mysqli_query($this->con, $sql);
		// when errors die error
		if (!$result) {
			die(mysqli_error($this->con));
		} 
		// return mysql query array
		else {
			return $result;
		}
	}

	public function escape($string)
	{
		return mysqli_escape_string($this->con, $string);
	}
}