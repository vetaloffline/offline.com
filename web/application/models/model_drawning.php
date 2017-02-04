<?
class Model_drawning extends Model
	{	
		function getInfo($id){
			$query = "SELECT * 
					  FROM `users` 
					  WHERE id = '$id'";
			return $this->db->makeQuery($query)[0];
		}
		function getregion(){
			$query = "SELECT * 
					  FROM `region`;";
			return $this->db->makeQuery($query);
		}

		function processing(){
			$time = date('c');
			$host= $_SERVER['REMOTE_HOST'];
			$ip= $_SERVER['REMOTE_ADDR'];
			$delivery = Lib::clearRequest($_POST['delivery']);
			$payment = Lib::clearRequest($_POST['payment']);
			$regions = Lib::clearRequest($_POST['regions']);
			$name = Lib::clearRequest($_POST['name']);
			$surname = Lib::clearRequest($_POST['surname']);
			$phone = Lib::clearRequest($_POST['phone']);
			$email = Lib::clearRequest($_POST['email']);

///////////valid

			if (empty($delivery) || empty($payment)) {
				header("Location: /drawning");
				die();
			}

			if (!Lib::valtel($phone)) {
				file_put_contents('web/logo_web.php', $time." Не пройдена проверка телефона "."(".$phone.")"." IP ".$ip." HOST ".$host."\n",FILE_APPEND);
				
				header("Location: /drawning");
				die();
			}
			if (!Lib::valmail($email)) {
				file_put_contents('web/logo_web.php', $time." Не пройдена проверка Email "."(".$email.")"." IP ".$ip." HOST ".$host."\n",FILE_APPEND);
				
				header("Location: /drawning");
				die();
			}
			if (Lib::valname($name) || Lib::valruss($name)) {}else{
				file_put_contents('web/logo_web.php', $time." Не пройдена проверка Имени "."(".$name.")"." IP ".$ip." HOST ".$host."\n",FILE_APPEND);
				
				header("Location: /drawning");
				die();
			}
			if (Lib::valname($surname) || Lib::valruss($surname)) {}else{
				file_put_contents('web/logo_web.php', $time." Не пройдена проверка Фамилии "."(".$surname.")"." IP ".$ip." HOST ".$host."\n",FILE_APPEND);
				
				header("Location: /drawning");
				die();
			}

			$basket = unserialize($_COOKIE['basket']);
			foreach ($basket as $key => $value) {
				
				$query = "SELECT * 
					 	  FROM `goods` 
					 	  WHERE id = '$key'";
				$good = $this->db->makeQuery($query)[0];
				$goods[$key]=$good;
				$summagood = $good['price'] * $basket[$key];
				$summagoods = $summagoods + $summagood;
			}
			$iduser = $_SESSION['iduser'];
			$data = explode('+', $time);


			$query ="INSERT INTO `HistoryOForders`(`id_user`, `status`, `data`, `name`, `surname`, `phone`, `summa`, `payment`, `delivery`, `city`) 
					 VALUES ('".$iduser."','new','$data[0]','$name','$surname','$phone','$summagoods','$payment','$delivery','$regions')";
			if ($this->db->makeQuery($query)) {
				$idorder = $this->db->getLastid();
				foreach ($basket as $ke => $va) {
				$query = "SELECT `price` 
						  FROM `goods` 
						  WHERE id = '$ke'";
				$price = $this->db->makeQuery($query)[0]['price'];
				$query = "INSERT INTO `order_goods`(`id_good`, `id_order`, `count`, `price`) 
						  VALUES ('$ke','$idorder','$va','$price')";
				$this->db->makeQuery($query);
				}
				
				$arr=unserialize($_COOKIE['basket']);
				unset($arr);
				$arr=serialize($arr);
				setcookie("basket",$arr,0,"/");	
				header("Location: /drawning/happy");
				}

			}
	}

?>