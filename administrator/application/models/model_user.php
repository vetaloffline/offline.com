<?
class Model_user extends Model{	
		
	function register(){

		$password=$_POST['passworduser'];
		$login=$_POST['email'];
		$time = date('c');
		$host= $_SERVER['REMOTE_HOST'];
		$ip= $_SERVER['REMOTE_ADDR'];


		$query = "SELECT `login`
				  FROM `users` 
				  WHERE `login` = '$login'";

		if ($this->db->makeQuery($query)) {
			echo "Такой Логин уже существует";?>
		 		<p><a href="/admin/user/registr">Вернуться назад</a>
		 	<?
		 	die();
		}

		if (Lib::valmail($login) == false) {
				file_put_contents('administrator/logo_admin.php', $time." Не пройдена проверка Имейла(@mail) "."(".$login.")"." IP ".$ip." HOST ".$host."\n",FILE_APPEND);
				
			header("Location: /admin/user/registr");
			die();
		}

		if (Lib::valpassword($password) == false) {
			file_put_contents('administrator/logo.php', $time." Не пройдена проверка Пароля "."(".$password.")"." IP ".$ip." HOST ".$host ,FILE_APPEND);
	
			header("Location: /admin/user/registr");
			die();
		}else{

				$pas= password_hash($password, PASSWORD_DEFAULT);
				$avatar = 'ava_mean.jpg';
				$avatar1 ='ava_full.jpg';
				$query = "INSERT INTO `users`(`password`,`email`,`avatar_mean`,`login`,`avatar_full`,`role`) 
						   VALUES            ('".$pas."','".$login."','".$avatar1."','".$login."','".$avatar."','20')";
				
				if (!$this->db->makeQuery($query)) {
						var_dump($queryy);
							};

				$iduser = $this->db->getLastid();
				$_SESSION['auth'] = true;
				$_SESSION['iduser'] = $iduser;
				$_SESSION['role'] = 20;
				header("Location: /");
		}
	}

	function authorization(){
		$login = $_POST['userNameForm'];
		$valLogin = Lib::valmail($_POST['userNameForm']);
		if (!$valLogin) {
			file_put_contents('administrator/logo.php', $time." Не пройдена проверка Логина "."(".$login.")"." IP ".$ip." HOST ".$host ,FILE_APPEND);
	
			header("Location: /admin/user/auth");
			die();
		}
		$query = "SELECT `login`
				  FROM   `users` 
				  WHERE  `login` = '$login'";
		if (!$this->db->makeQuery($query)){
			// нет такого логина 
			header("Location: /admin/user/auth");
			die();
		}
		$passwd = Lib::valpassword($_POST['passwd']);
		$password = $_POST['passwd'];
		if (!$passwd){
			file_put_contents('administrator/logo.php', $time." Не пройдена проверка Пароля "."(".$password.")"." IP ".$ip." HOST ".$host ,FILE_APPEND);
	
			header("Location: /admin/user/auth");
			die();
		}
		$query = "SELECT `name`, `password`, `id`,`role`
				  FROM   `users` 
				  WHERE   login = '".$login."'";
		$user = $this->db->makeQuery($query)[0];

		if (password_verify($password,$user['password'])){

			$_SESSION['name'] = $user['name'];
			$_SESSION['auth'] = true;
			$_SESSION['iduser'] = $user['id'];
			$_SESSION['role'] = $user['role'];
			header("location: /");
		}
	}
	function exit_user(){
	unset($_SESSION['auth']);
	unset($_SESSION['role']);
	unset($_SESSION['iduser']);
	unset($_SESSION['name']);
	header("location: /");
	}

	function input_facebook(){
		$facebook = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
		$user = json_decode($facebook, true);
		$user['network']; //- соц. сеть, через которую авторизовался пользователь
		$user['identity']; //- уникальная строка определяющая конкретного пользователя соц. сети
		$nameuser=$user['first_name'];// - имя пользователя
		$surname=$user['last_name']; //- фамилия пользователя
		$email=$user['email']; //Email
		$login=$user['uid']; // id user

		if ($user) {
		$query = "SELECT `email`,`id` 
				  FROM `users` 
				  WHERE login='".$login."';";
		$row = $this->db->makeQuery($query)[0];
		$iduser=$row['id'];
		if ($row) {
			//echo 'такой логин есть';
		}else{
				$query = "INSERT INTO `users`(`login`,`name`,`surname`,`email`,`role`) 
						  VALUES            ('".$login."','".$nameuser."','".$surname."','".$email."','20')";
				$this->db->makeQuery($query);			
				}
		$_SESSION['name'] = $nameuser;
		$_SESSION['auth'] = true;
		$_SESSION['iduser'] = $iduser;
		$_SESSION['soc'] = 'soc';
		$_SESSION['role'] = 20;
		}
		header("Location: /");	
	}
}
?>