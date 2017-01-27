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
	{	

		$this->view->generate('basket_view.php', 'template_view.php',$db);

		
	}


}?>