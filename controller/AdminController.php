<?php

class AdminController extends BaseController 
{
	// $blog property for injecting blog model
	public $admin;

	/**
	 * Requires blog object and assigns it to controller property blog
	 * @param [object] $blog
	 */
	function __construct($admin)
	{
		$this->admin = $admin;
	}

	public function adminList()
	{
		$updates_counter = $_SESSION['updates'];
		$posts = $this->admin->getPosts();
		$this->renderHeader();
		include 'view/templates/admin.inc.php';
		$this->renderFooter();
	}

	/**
	 * Render post for edit post form
	 */
	public function adminEdit($id)
	{
		$posts = $this->admin->getPost($id);
		$this->renderHeader();
		include 'view/templates/edit_form.php';
		$this->renderFooter();
	}
	/**
	 * Updates the posts table with input from edit_post.php
	 * @return [redirect]
	 */
	public function adminUpdate($id)
	{
		$this->admin->updatePost($id);
	 	// increments session counter
		$_SESSION['updates'] = $_SESSION['updates'] + 1;
		// redirects to admin page controller
		header("location: index.php?page=admin");
	}

	/**
	 * controller method for adding posts
	 */
	public function createPost()
	{
		$this->renderHeader();
		include 'view/templates/add_post.php';
		$this->renderFooter();
	}


	public function adminInsert()
	{
		$this->admin->insertPost();
		$_SESSION['updates'] = $_SESSION['updates'] + 1;
		// redirects to admin page controller
		header("location: index.php?page=admin");
	}

	public function logout()
	{
		session_destroy();
		header("location: index.php");
	}
	// public function adminEdit()
	// {

	// }
}