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
		 		<p><a href="/user/registr">Вернуться назад</a>
		 	<?
		 	die();
		}

		if (Lib::valmail($login) == false) {
				file_put_contents('administrator/logo_admin.php', $time." Не пройдена проверка Имейла(@mail) "."(".$login.")"." IP ".$ip." HOST ".$host."\n",FILE_APPEND);
				
			header("Location: /user/registr");
			die();
		}

		if (Lib::valpassword($password) == false) {
			file_put_contents('administrator/logo.php', $time." Не пройдена проверка Пароля "."(".$password.")"." IP ".$ip." HOST ".$host ,FILE_APPEND);
	
			header("Location: /user/registr");
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
	
			header("Location: /user/auth");
			die();
		}
		$query = "SELECT `name`, `password`, `id`,`role`
				  FROM   `users` 
				  WHERE  `login` = '$login'";
		$user = $this->db->makeQuery($query)[0];
		if (!$user){
			// нет такого логина 
			header("Location: /user/auth");
			die();
		}
		$passwd = Lib::valpassword($_POST['passwd']);
		$password = $_POST['passwd'];
		if (!$passwd){
			file_put_contents('administrator/logo.php', $time." Не пройдена проверка Пароля "."(".$password.")"." IP ".$ip." HOST ".$host ,FILE_APPEND);
	
			header("Location: /user/auth");
			die();
		}
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
	unset($_SESSION['soc']);
	unset($_SESSION['token']);
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
				$query = "INSERT INTO `users`(`login`,`name`,`surname`,`email`,`role`,social) 
						  VALUES            ('".$login."','".$nameuser."','".$surname."','".$email."','20',1)";
				$this->db->makeQuery($query);
				$iduser = $this->db->getLastid();		
				}
		$_SESSION['name'] = $nameuser;
		$_SESSION['auth'] = true;
		$_SESSION['iduser'] = $iduser;
		$_SESSION['soc'] = 'soc';
		$_SESSION['role'] = 20;
		}
		header("Location: /");	
	}

	function getDataUser(){

		$iduser = $_SESSION['iduser'];
		$auth = $_SESSION['auth'];
		if ($iduser && $auth) {
			$query ="SELECT * 
					 FROM `users` 
					 WHERE id = '$iduser'";
		return $this->db->makeQuery($query)[0];
		}
	}

	function editprofile(){

		$iduser = $_SESSION['iduser'];
		$name = Lib::clearRequest($_POST['name']);
		$surname = Lib::clearRequest($_POST['surname']);
		$patronymic = Lib::clearRequest($_POST['patronymic']);
		$phone = Lib::clearRequest($_POST['phone']);

		if (!empty($phone) ) { 
			$valphone = Lib::valtel($phone);
		}else{
			  $valphone = 1;
			  $phone = NULL;
			 }
		$valname = Lib::valruss($name);
		$valsurname = Lib::valruss($surname);
		$valpatronymic = Lib::valruss($patronymic);

		if (!$valphone || !$valname || !$valsurname || !$valpatronymic) {
			header("Location: /user/profile");
			die();
		}
		$query = "UPDATE `users`
				  SET `name`='".$name."',`surname`='".$surname."',`patronymic`='".$patronymic."',`phone`='".$phone."'
				  WHERE id = '$iduser'";
		$this->db->makeQuery($query);
		$_SESSION['name'] = $name;
	}

	function getordersuser(){
		$iduser = $_SESSION['iduser'];
		$query = "SELECT * 
				  FROM HistoryOForders
				  INNER JOIN order_goods 
				  ON id = id_order
				  WHERE id_user= '$iduser'";
		$data = $this->db->makeQuery($query);
		foreach ($data as $key => $value) {
			if (!$datafull[$value['id_order']]) {
				$datafull[$value['id_order']][] = $value;
			}else{$datafull[$value['id_order']][] = $value;
			}

		}return $datafull;
	}

	function getgoodsorder($data){
		if ($data) {
			
		
		foreach ($data as $key => $value) {
			foreach ($value as $k => $v) {
				$id = $v['id_good'];
				if (!$goods[$id]) {
				$query = "SELECT * 
						  FROM `goods` 
						  WHERE id = '$id'";
				$good = $this->db->makeQuery($query)[0];
				$goods[$good['id']]=$good;}
			}return $goods;
		}
	}}




}
?>