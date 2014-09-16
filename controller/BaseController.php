<?php

class BaseController 
{
	/**
	 * Controller for general site header
	 */
	public function renderHeader()
	{
		include 'view/templates/head.inc.php';
		include 'view/templates/nav.inc.php';
	}

	public function renderFooter()
	{
		include 'view/templates/footer.inc.php';
	}
}