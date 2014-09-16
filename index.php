<?php 

/**
 * @todo build session framework
 */
session_start();

// Database class framework 
include	'framework/Database.php';

// Models for user and admin
include 'model/User.php';
include 'model/Admin.php';
include 'model/Blog.php';

// Controllers to configure view files
include 'controller/BlogController.php';
include 'controller/AdminController.php';

// instantiate frameworks
$db = new Database();

// Instantiate the models
$user = new User($db);
$admin = new Admin($db);
$blog = new Blog($db);

// Instantiate the controllers
$blogController = new BlogController($blog);
$adminController = new AdminController($admin);

// Assign get variables
if (isset($_GET['post_id'])) {
	$id = $_GET['post_id'];
}

if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

else {
	$page = 'blog';
}

// Switch to determine the controller
switch ($page) {

	case 'blog':
	$blogController->blogList();
	break;

	case 'blog_view':
	$blogController->blogView($id);
	break;

	case 'login_form':
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$user->verifyUser($_POST['username'], $_POST['password']);
	}
	else {
		$user->forceLogin();
		$blogController->loginForm();
	}
	break;

	case 'admin':
	$user->forceAdmin();
	$adminController->adminList();
	break;

	case 'edit_post':
	$user->forceAdmin();
	$adminController->adminEdit($id);
	break;

	case 'update_post':
	$user->forceAdmin();
	$adminController->adminUpdate($id);
	break;

	case 'create_post':
	$user->forceAdmin();
	$adminController->createPost();
	break;

	case 'insert_post':
	$user->forceAdmin();
	$adminController->adminInsert();
	break;

	case 'logout':
	$adminController->logout();
	break;

	default:
	$blogController->pageNotFound();
	die();
}