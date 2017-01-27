<?php

class Controller_Services extends Controller
{

	function __construct($db)
	{
		$this->model = new Model_Services($db);
		$this->view = new View();
	}
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('services_view.php', 'template_view.php', $data);
	}
}
