<?php

namespace Controller;

class Admin extends Base
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
		// Call getPost method from model
		$posts = $this->admin->getPost($id);

		// Render header
		$this->renderHeader();

		// Include main page content
		include 'view/templates/edit_form.php';

		// Render footer
		$this->renderFooter();
	}

	/**
	 * Updates the posts table with input from edit_post.php
	 * @return [redirect]
	 */
	public function adminUpdate($id)
	{
		// Call updatePost method from model
		$this->admin->updatePost($id);

	 	// increments session counter
		$_SESSION['updates'] = $_SESSION['updates'] + 1;

		// redirects to admin page controller
		header("location: ./admin");
	}

	/**
	 * controller method for adding posts
	 */
	public function createPost()
	{
		// Render header
		$this->renderHeader();

		// Include main page content
		include 'view/templates/add_post.php';

		// Render footer
		$this->renderFooter();
	}

	/*
	 * For new posts 
	 */
	public function adminInsert()
	{
		// Use insertPost method from model
		$this->admin->insertPost();

		// Increment updates counter
		$_SESSION['updates'] = $_SESSION['updates'] + 1;

		// redirects to admin page controller
		header("location: ./admin");
	}

	/*
	 * Logout admin
	 */
	public function logout()
	{
		// End session
		session_destroy();

		// Redirect
		header("location: ./");
	}
}