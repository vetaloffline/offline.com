<?php

class Controller_drawning extends Controller
{

	function __construct($db)
	{
		$this->model = new Model_drawning($db);
		$this->view = new View();
	}
	
	function action_index()
	{	
		$id = $_SESSION['iduser'];
		if ($id) {
			$data = $this->model->getInfo($id);
		}
		$regions = $this->model->getregion();
		

		$this->view->generate('drawing_view.php', 'template_view.php',$data,$regions);
	}

	function action_processing()
	{	
		$this->model->processing();
	}

	function action_happy(){
		$this->view->generate('happy_view.php', 'template_view.php');
	}

}