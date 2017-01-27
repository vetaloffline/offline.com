<?php

class Controller_about extends Controller
{

	function __construct($db)
	{
		$this->view = new View();
	}
	
	function action_index()
	{
				
		$this->view->generate('about_view.php', 'template_view.php');
	}
}