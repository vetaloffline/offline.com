<?php

class Controller_goodslist extends Controller
{
	public $goods;
	function __construct($db)
	{	
		$this->model = new Model_goodslist($db);
		$this->view = new View();
	}
	function action_index($db)
	{	
		//$this->goods = $this->model->get_goods();
		
		$this->goods = $this->model->get_goods_list();

		$this->view->generate('goodslist_view.php', 'template_view.php',$this->goods);

		
	}


}?>