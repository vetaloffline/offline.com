<?php

class Controller_Main extends Controller
{

	function action_index($db)
	{
		$this->view->generate('main_view.php', 'template_view.php',$db);
		
	}
}