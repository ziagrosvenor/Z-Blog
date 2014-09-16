<?php


class Admin
{
	public $db;
	public $posts;
	
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
		// Select all columns from the table posts
		$result = $this->db->query("SELECT * FROM posts");

		// Create an empty array for the posts
		$posts = array();

		// loop through $result
		while($row = mysqli_fetch_array($result)) {
			// data from posts is added to the array
			$posts[] = $row;
		}	
		
		return $posts;
	}

	/**
	 * Queries for post of id $id
	 * @return [array]
	 */
	public function getPost($id)
	{
		// Select all columns from the table posts
		$result = $this->db->query("SELECT * FROM posts WHERE id='$id'");

		// Create an empty array for the posts
		$posts = array();

		// loop through $result
		while($row = mysqli_fetch_array($result)) {
			// data from posts is added to the array
			$posts[] = $row;
		}	

		return $posts;
	}

	public function updatePost($id)
	{
		// Converts any HTML in input to plain text
	 	$update_name = htmlentities($_POST['name']);
	 	$update_content = htmlentities($_POST['content']);

	 	// do query and check if it failed. Takes data from admin edit variables
	 	$this->db->query("UPDATE posts SET name='" . mysqli_escape_string($this->db->con, $update_name) . "', post='" . mysqli_escape_string($this->db->con, $update_content) . "' WHERE id='$id'");
	}

	public function insertPost()
	{
		$post_name = htmlentities($_POST['name']);
	 	$post_content = htmlentities($_POST['content']);

	 	$this->db->query("INSERT INTO posts VALUES ( DEFAULT, '" . mysqli_escape_string($this->db->con, $post_name) . "','" . mysqli_escape_string($this->db->con, $post_content) . "')" );
	}
		 

}