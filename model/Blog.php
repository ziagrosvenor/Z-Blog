<?php

class Blog
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

}
