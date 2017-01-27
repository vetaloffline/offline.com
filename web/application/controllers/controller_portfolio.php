<?php

class Controller_Portfolio extends Controller
{

	function __construct($db)
	{
		$this->model = new Model_Portfolio($db);
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('portfolio_view.php', 'template_view.php', $data);
	}
}