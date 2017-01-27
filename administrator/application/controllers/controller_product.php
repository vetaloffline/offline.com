<?php

class Controller_product extends Controller
{
	public $good;
	public $colors;
	public $small_img;
	function __construct($db)
	{	
		$this->model = new Model_product($db);
		$this->view = new View();
	}
	function action_index($db)
	{	
		$id = $_GET['id'];
		var_dump($id);
		$this->good = $this->model->get_good($id);

		$this->colors = $this->model->makeColorsGood($id);

		$this->small_img = $this->model->makeImg_smallGood($id);

		$this->view->generate('product_view.php', 'template_view.php',$db,$this->good,$this->colors,$this->small_img);

		
	}


}?>