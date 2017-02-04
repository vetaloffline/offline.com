<?php

class Controller {
	
	public $model;
	public $view;
	public $language;
	function __construct()
	{
		$this->view = new View();
		

	}
	
	// действие (action), вызываемое по умолчанию
	function action_index($db,$language)
	{
		var_dump($language);
	}
}
