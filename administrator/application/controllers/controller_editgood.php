<?php

class Controller_editgood extends Controller
{
	public $goods;
	public $goodscolor;
	public $goodidcolor;
	public $feche;
	public $idfeche;
	public $fotoimg;

	function __construct($db)
	{	
		$this->model = new Model_editgood($db);
		$this->view = new View();
	}
	function action_index($db)
	{	
		$id = $_GET['id'];
		$this->goods = $this->model->Getgoods($id);
		$this->goodscolor = $this->model->getColors();
		$this->goodidcolor = $this->model->getidcolor($id);
		$this->feche = $this->model->getFeche();
		$this->idfeche = $this->model->getidfeche($id);
		$this->fotoimg = $this->model->getFoto($id);

		$this->view->generate('editgood_view.php', 'template_view.php',$this->goods,$this->goodscolor,$this->goodidcolor,$this->feche,$this->idfeche,$this->fotoimg);

		
	}
	function action_edit(){
		$add = Lib::clearRequest($_POST['edit']);
		if ($add) {
			$this->model->editGood($id);
			
			}
	}

	function action_deleteimg(){
			$id = $_GET['id'];
			$addi = $_GET['foto'];
			$this->model->deleteImage($id,$addi);
			}


}

?>