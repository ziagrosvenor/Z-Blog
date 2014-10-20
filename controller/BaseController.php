<?php

namespace Controller;

class Base 
{
	/**
	 * Render header method
	 */
	public function renderHeader()
	{
		include 'view/templates/head.inc.php';
		include 'view/templates/nav.inc.php';
	}

	/*
	 * Render footer method
	 */
	public function renderFooter()
	{
		include 'view/templates/footer.inc.php';
	}
}