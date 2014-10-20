<?php 

namespace Model;

class User
{
	// User property
	public $db;

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
			header("location: ./login_form");
		}
	}

	/**
	 * Redirect for when admin is logged in
	 */
	public function forceLogin()
	{
		// Check if admin session is set
	    if (isset($_SESSION['admin'])) {
	    	// Redirect
			header("location: ./admin");
		}
	}

	/**
	 * Verifies if user input from the login form matches data base details
	 * @param  [string] $user_name
	 * @param  [string] $password
	 * @todo   change header('location') to MVC index.php?page=admin
	 */
	public function verifyUser($user_name, $password)
	{
		// Query for login
		$stmt = $this->db->query("SELECT * FROM users WHERE name=(:username)");

		// Execute query
		$stmt->execute(array(':username'=>$user_name));
			
		// Creates array for users
		$users = array();

		// loop for mySQL result
		while ($row = $stmt->fetch()) {
			// creates a array from mysqli object $result and then assigns that to users array
			$users[] = $row;
		}

		// boolean variable used in if and foreach loops to check if there are user details being returned from queryDatabase.
		$found_a_user_with_credentials = false;

		// loops through all users
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
				header('location: ./admin');
			}
		}

		else {
			// redirect and add invalid $_GET for form
			header('location: index.php?page=login_form&login=invalid');
		}
	}
}