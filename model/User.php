<?php 

class User
{

	public $db;
	// public $posts;
	public function __construct($db)
	{
		$this->db = $db;
	}
	/**
	 * Encrypts passwords with B_CRYPT algo
	 * @param  [string] $password_to_hash
	 * @return [string]
	 */
	public function passwordHasher($password_to_hash) 
	{
		$password_post_hash = password_hash($password_to_hash, PASSWORD_DEFAULT);
		return $password_post_hash;
	}

	/**
	 * Checks for user session and redirects accordingly
	 * @todo change "location:" to MVC $_GET location
	 */
	public function forceAdmin()
	{
		if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
			header("location: index.php?page=login_form");
		}
	}
	public function forceLogin()
	{
	    if (isset($_SESSION['admin'])) {
			header("location: index.php?page=admin");
		}
		// else if(!$_POST) {
		// 	header("location: index.php?page=login_form");
		// } 
	}
	/**
	 * Verifies if user input from the login form matches data base details
	 * @param  [string] $user_name
	 * @param  [string] $password
	 * @todo   change header('location') to MVC index.php?page=admin
	 */
	public function verifyUser($user_name, $password)
	{
		// Queries for users table for login details
		$result = $this->db->query("SELECT * FROM users WHERE name='" . $this->db->escape($user_name) . "'");
		// Creates array for users
		$users = array();
		// loop through users row returned from query and add to an array
		while ($row = mysqli_fetch_array($result)) {
			// creates a array from mysqli object $result and then assigns that to users array
			$users[] = $row;
		}
		// boolean variable used in if and foreach loops to check if there are user details being returned from queryDatabase.
		$found_a_user_with_credentials = false;
		// loops through all users and adds details to a user array
		foreach ($users as $user) {
		$found_a_user_with_credentials = true;
		}
		// redirects if there are user details
		if ($found_a_user_with_credentials === true) {
			$hash = $user['password'];
			if (password_verify($password, $hash)) {
				// Sets session admin
				$_SESSION['admin'] = $user_name;
				$_SESSION['updates'] = 0;
				// redirect
				header('location: index.php?page=admin');
			}
		}
		else {
			// redirect and add invalid $_GET for form
			header('location: index.php?page=login_form&login=invalid');
		}
	}
}