<?

class Controller_users extends Controller
{
	
	
	function __construct($db)
	{	
		$this->model = new Model_users($db);
		$this->view = new View();
	}

	function action_index()
	{	$role = $this->model->getallrole();
		$data = $this->model->getalluser('20');
		$this->view->generate('users_view.php', 'template_view.php',$data,$role);
	}
	function action_manager()
	{	$role = $this->model->getallrole();
		$data = $this->model->getalluser('30');
		$this->view->generate('users_view.php', 'template_view.php',$data,$role);
	}
	function action_administrator()
	{	$role = $this->model->getallrole();
		$data = $this->model->getalluser('10');
		$this->view->generate('users_view.php', 'template_view.php',$data,$role);
	}
	function action_editrole(){
		$role = $this->model->editRoleuser();
	}


}?>