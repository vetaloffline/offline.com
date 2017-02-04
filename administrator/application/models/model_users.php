<?
class Model_users extends Model{	
		
		public $query;
	function getalluser($role){

		$this->query = "SELECT * 
						FROM `users`
						WHERE role = '$role'
						AND social != '1'";
		return array_reverse($this->db->makeQuery($this->query));
	}
	function getallrole(){
		$this->query = "SELECT * 
						FROM `roles`";
		return $this->db->makeQuery($this->query);
	}
	function editRoleuser(){
		$iduser = Lib::clearRequest($_POST['id']);
		$role = Lib::clearRequest($_POST['role']);

		$this->query = "SELECT `name` 
						FROM `roles`
						WHERE russname = '$role'";
		$role = $this->db->makeQuery($this->query)[0]['name'];
		
		$this->query = "UPDATE `users` 
						SET `role`='$role'
						WHERE id = '$iduser'";
		$this->db->makeQuery($this->query);
		header("Location: /admin/users");
	}

}
?>