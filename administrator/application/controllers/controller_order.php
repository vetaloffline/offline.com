<?

class Controller_order extends Controller
{
	public $data;
	public $goods;
	public $status;
	function __construct($db)
	{	
		$this->model = new Model_order($db);
		$this->view = new View();
	}

	function action_index(){
		$this->data = $this->model->getorder();
		$this->goods = $this->model->getgoodsorder();
		$this->status = $this->model->getstatusorder();
		$this->view->generate('order_view.php', 'template_view.php',$this->data,$this->goods,$this->status);
	}
	function action_edit(){
		$this->data = $this->model->editorder();
	}
	function action_delete(){
		$this->data = $this->model->deleteorder();
	}
	function action_editstatus(){
		$this->model->editstatus();
	}
	function action_goodadd(){
		$this->model->gooaddorder();
	}




}?>