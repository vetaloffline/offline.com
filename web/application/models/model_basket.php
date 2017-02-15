<?
class Model_basket extends Model
	{	
	
	
		function getallgoodbasket(){
			$goods = unserialize($_COOKIE['basket']);
			if ($goods) {
				foreach ($goods as $key => $value) {
				$idgood = $key;
				$query = "SELECT * 
					  FROM `goods` 
					  WHERE id = '$idgood'";
				$good = $this->db->makeQuery($query)[0];
				$goodsbasket[$idgood] = $good;
			}
			return $goodsbasket;
			}

		}

		function basketAdd(){
			$id=$_GET['id'];
			//var_dump($id);
			$ass=unserialize($_COOKIE['basket']);

			if($ass[$id]==false)
				{
				$ass[$id]=1;
				}
				else
					{
					$ass[$id]=$ass[$id]+1;
					}
					
			$saa=serialize($ass);
			setcookie("basket",$saa,0,"/");
			header("location: /basket");
		}

		function clearbasket(){
			$arr=unserialize($_COOKIE['basket']);
			unset($arr);
			$arr=serialize($arr);
			setcookie("basket",$arr,0,"/");
			header("location: /");
		}

		function basketdel(){
			$id=$_GET['id'];
			$arr=unserialize($_COOKIE['basket']);
			unset($arr[$id]);
			$seri=serialize($arr);
			setcookie("basket",$seri,0,"/");
			header("Location: /basket");
		}

		function basketinput(){
			$id=$_GET['id'];
			$kolTov=trim(htmlspecialchars(strip_tags($_GET['kolTov'])));
			$arr=unserialize($_COOKIE['basket']);
			if(ctype_digit($kolTov))
				{
				if($kolTov>0)
					{
					$arr[$id]=$kolTov;
					}
				}			
			$arr=serialize($arr);
			setcookie("basket",$arr,0,"/");
			header("Location: /basket");
		}

		function basketMin(){
			$id=$_GET['id'];
			$arr=unserialize($_COOKIE['basket']);
			if($arr[$id]>1)
				{
				$arr[$id]=$arr[$id]-1;
				}
			$ars=serialize($arr);
			setcookie("basket",$ars,0,"/");
			header("Location: /basket");
		}
		
		function getImgbask(){
			$ids = unserialize($_COOKIE['basket']);
			if ($ids) {
				foreach ($ids as $ke => $va) {
				$query = "SELECT `nameimg` 
					 	  FROM `goodimg` 
					 	  WHERE `good_id` = '$ke'
					 	  AND `descriptionimg` = 'small_img'";
				$name = $this->db->makeQuery($query)[0]['nameimg'];
				$names[$ke] = $name;
			}return $names;	
			}
		} 

		function getInfo(){

		}





	}

?>