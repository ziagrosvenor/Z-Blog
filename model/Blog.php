<?php

class Blog
{
	// Blog properties
	public $db;
	public $posts;
	
	// Assign parameter to Blog property
	public function __construct($db)
	{
		$this->db = $db;
	}

	/**
	 * Queries for all in posts table
	 * @return [array]
	 */
	public function getPosts()
	{
		// Query
		$stmt = $this->db->query("SELECT * FROM posts");

		// Executes query
		$stmt->execute();

		// Create an empty array for the posts
		$posts = array();

		// loop through $result
		while($row = $stmt->fetch()) {

			// data from posts is added to the array
			$posts[] = $row;

		}	
		// Return Array of rows
		return $posts;
	}

	/**
	 * Queries for post of id $id
	 * @return [array]
	 */
	public function getPost($id)
	{
		// Query
		$stmt = $this->db->query("SELECT * FROM posts WHERE id=(:id)");

		// Binds $id parameter to the PDO
		$stmt->bindParam(':id', $id);

		// Execute query
		$stmt->execute();

		// Create an empty array for the posts
		$posts = array();

		while($row = $stmt->fetch()) {
			// Data from posts is added to the array
			$posts[] = $row;
		}	

		//Return Array of rows
		return $posts;
	}

}
