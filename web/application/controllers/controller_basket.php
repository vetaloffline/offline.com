<?

class Controller_basket extends Controller
{
	public $good;
	public $colors;
	public $small_img;
	function __construct($db)
	{	
		$this->model = new Model_basket($db);
		$this->view = new View();
	}
	function action_index($db)
	{	$data = $this->model->getallgoodbasket();
		$img = $this->model->getImgbask();
		$this->model->getallgoodbasket();
		$this->view->generate('basket_view.php', 'template_view.php',$data,$img);

	}
	function action_basketAdd(){
		$this->model->basketAdd();
	}
	function action_clearbasket(){
		$this->model->clearbasket();
	}
	function action_basketdel(){
		$this->model->basketdel();
	}
	function action_basketinput(){	
		$this->model->basketinput();
	}
	function action_basketminus(){
		$this->model->basketMin();
	}
	function action_basketplus(){
		$this->model->basketPlus();
	}



}?>