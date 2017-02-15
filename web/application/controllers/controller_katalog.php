<?php

class Controller_katalog extends Controller
{
	public $goods;
	public $colorg;
	public $fef;
	public $idcolor;
	public $idfec;
	public $model;
	public $feche;
	public $imagesgood;
	function __construct($db)
	{	
		$this->model = new Model_Katalog($db);
		$this->view = new View();
	}
	function action_index($db)
	{	
		$this->colorg = $this->model->get_idcolor();
		$this->fef = $this->model->get_idfech();
		$this->goods = $this->model->get_goods();
		$this->idcolor = $this->model->get_colors();
		$this->idfec = $this->model->get_feche();
		$this->feche = $this->model->MakeFeche();
		$this->imagesgood = $this->model->getimages('mean_img');
		$this->view->generate('katalog_view.php', 'template_view.php',$db,$this->goods,$this->colorg,$this->fef,$this->idcolor,$this->idfec,$this->imagesgood);



	}

}