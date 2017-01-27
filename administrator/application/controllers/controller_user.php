<?

class Controller_user extends Controller
{
	public $good;
	public $colors;
	public $small_img;
	
	function __construct($db)
	{	
		$this->model = new Model_user($db);
		$this->view = new View();
	}

	function action_auth()
	{	
		$auth = Lib::clearRequest($_POST['auth']);

		if (Lib::clearRequest($_POST['token']) != $_SESSION['token'] && $auth) {
			die();	
		}
		if ($auth) {
			$this->model->authorization();
		}
		$this->view->generate('user_auth_view.php','template_view.php',$data);
	}

	function action_registr(){
		$registr = Lib::clearRequest($_POST['registr']);
		if (Lib::clearRequest($_POST['token']) != $_SESSION['token'] && $registr) {
			die();	
		}
		if ($registr) {
			$this->model->register();
		}
		$this->view->generate('user_registr_view.php','template_view.php',$data);
	}

	function action_exit_user(){
		$this->model->exit_user();
	}

	function action_facebook(){
		$this->model->input_facebook();
	}

}?>