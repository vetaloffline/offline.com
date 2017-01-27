<?php

class Controller_goodadd extends Controller
{
	
	function __construct($db)
	{	
		$this->model = new Model_goodadd($db);
		$this->view = new View();
	}
	function action_index($db)
	{	
		$colors = $this->model->getColors();
		$feches = $this->model->getFeches();
		$this->view->generate('goodadd_view.php', 'template_view.php',$colors,$feches);

		
	}
	function action_add($db)
		{
			$add = Lib::clearRequest($_POST['goodadd']);

			if ($add) {

				$alias_good=$_POST['alias_good'];
				if(empty($alias_good)){
					$name_good = $_POST['name123'];
					$alias_good = Lib::translit($name_good);

				};

				$data = $this->model->productAdd($alias_good);
				
			}
		}


}?>