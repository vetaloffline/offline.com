<?

class Controller_orders extends Controller
{
	
	function __construct($db)
	{	
		$this->model = new Model_orders($db);
		$this->view = new View();
	}

	function action_index(){
		$data = $this->model->getallorders('new');
		$status = $this->model->getallstatus();
		$this->view->generate('orders_view.php', 'template_view.php',$data,$status);
	}

	function action_accept(){
		$data = $this->model->getallorders('accept');
		$status = $this->model->getallstatus();
		$this->view->generate('orders_view.php', 'template_view.php',$data,$status);
	}
	function action_way(){
		$data = $this->model->getallorders('way');
		$status = $this->model->getallstatus();
		$this->view->generate('orders_view.php', 'template_view.php',$data,$status);
	}
	function action_perform(){
		$data = $this->model->getallorders('perform');
		$status = $this->model->getallstatus();
		$this->view->generate('orders_view.php', 'template_view.php',$data,$status);
	}


}?>