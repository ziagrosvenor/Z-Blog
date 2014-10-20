<?php

namespace Controller;

//BlogController requires BaseController to render views
require 'BaseController.php';

class Blog extends Base
{
	// $blog property for injecting blog model
	public $blog;

	/**
	 * Requires blog object and assigns it to controller property blog
	 * @param [object] $blog
	 */
	function __construct($blog)
	{
		$this->blog = $blog;
	}

	/**
	 * Controller method for blog homepage, query $db, fetch array, create view
	 */
	public function blogList()
	{
		// calls blog objects getPosts method
		$posts = $this->blog->getPosts();
		$this->renderHeader();
		include 'view/templates/blog.inc.php';
		$this->renderFooter();
	}

	/**
	 * Controller method for blog_view page, query $db, fetch array, configure view
	 */
	public function blogView($id)
	{
		$posts = $this->blog->getPost($id);
		$this->renderHeader();
		include 'view/templates/blog_view.inc.php';
		$this->renderFooter();
	}
	
	/**
	 * Controller for login form view
	 */
	public function loginForm()
	{
		$this->renderHeader();
		include 'view/templates/login_form.inc.php';
		$this->renderFooter();	
	}

	/**
	 * Controller for 404 view
	 */
	public function pageNotFound()
	{
		$this->renderHeader();
		include 'view/templates/404.php';
		$this->renderFooter();
	}
}