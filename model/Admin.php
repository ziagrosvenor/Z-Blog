<?php

class Admin
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
	 * @param  [$id] Post ID
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

		// Return Array of rows
		return $posts;
	}

	// Update post
	public function updatePost($id)
	{
		// Converts any HTML in input to plain text
	 	$update_name = htmlentities($_POST['name']);
	 	$update_post = htmlentities($_POST['content']);

	 	// Query
	 	$stmt = $this->db->query("UPDATE posts SET name= :name, post= :posts WHERE id= :id");

	 	// Binds variables to PDO
	 	
	 	// $stmt->bindParam(':name', $update_name);
	 	// $stmt->bindParam(':posts', $update_post);
	 	// $stmt->bindParam(':id', $id);

	 	// Execute Query
	 	$stmt->execute(array(':name' => $update_name, ':posts' => $update_post, ':id' => $id));
	}

	// Insert Post
	public function insertPost()
	{	
		// XSS security fix
		$post_name = htmlentities($_POST['name']);
	 	$post_content = htmlentities($_POST['content']);

	 	// Query 
	 	$stmt = $this->db->query("INSERT INTO posts VALUES ( DEFAULT, (:name), (:content))");

	 	// Execute query
	 	$stmt->execute(array(':update_name'=>$update_name, ':update_content'=>$update_post));
	}
		 

}