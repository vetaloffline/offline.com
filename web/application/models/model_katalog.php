<?
class Model_Katalog extends Model
{	
 	
 public function get_idcolor()
 	{

 		$querry = "SELECT `namecolor`,`id`
					FROM `goodcolors` ";
		return $this->db->makeGoods($querry,'id');
 	}
 	 public function get_idfech()
 	{

 		$queryy = "SELECT `wayfech`,`id`,`namefech`
					FROM `feche` ";
		return $this->db->makeGoods($queryy,'id');
 	}
 		public function get_goods($colors_filtr = NULL,$feche_filtr = NULL){

 			$price = $_GET['price'];
			if (ctype_digit($price)) {
				$priceq = ' AND price = '.$price;
				$query = "SELECT id FROM goods where price = '$price'";
				$array = $this->db->makeQuery($query)[0];
				$idarray = $array['id'];
			}else{
				$explo = explode(' - ', $price);
				$query = "SELECT id FROM goods where price >= '$explo[0]' AND price <='$explo[1]'";
				$array = $this->db->makeQuery($query);
				foreach ($array as $key => $value) {
					$idarray[$value['id']]=$value['id'];
				}}


 				if (!$feche_filtr && !$colors_filtr) {
 					if ($idarray) {

 					foreach ($idarray as $k => $v) {
 						if ($i<1) {
 							$qver = $qver.' AND id='.$v;
 						}else{
 						$qver = $qver.' OR id='.$v;}
 						$i++;
 					}}
 				}
 			if ($feche_filtr != NULL || $colors_filtr !=NULL) {

 			if (!$feche_filtr) {

 				$aar = array_intersect($colors_filtr,$idarray);

	 			foreach ($aar as $k => $v) {
	 				if ($i <1) {
	 					$qver = ' AND id='.$k;
	 				}else{
		 				$qver = $qver.' OR id='.$k;
		 			}	$i++;
	 			}
	 			if (empty($qver)) {
	 				$qver = $qver.' AND id= -1';
	 			}	
 			}



 			if (!$colors_filtr) {
 			$aar = array_intersect($feche_filtr,$idarray);

	 			foreach ($aar as $k => $v) {
	 				if ($i <1) {
	 					$qver = ' AND id='.$k;
	 				}else{
		 				$qver = $qver.' OR id='.$k;
		 			}	$i++;
	 			}
	 			if (empty($qver)) {
	 				$qver = $qver.' AND id= -1';
	 			}	
 			}



 			if ($colors_filtr && $feche_filtr) {
 				
 				$aar = array_intersect($colors_filtr,$feche_filtr);
 				$aar = array_intersect($idarray,$aar);

 				foreach ($aar as $k => $v) {

 					if ($i <1) {
 					$qver = ' AND id='.$k;
 				}else{
 				$qver = $qver.' OR id='.$k;
 				}
 				$i++;
 				}
 				if (empty($aar)) {
 					$qver = ' AND id = -1';
 				}


 			}



			if ($_GET['sel']) {
				$sort = $_GET['sel'];
				switch ($sort) {
					case 'za':
						$sorting = '`name` DESC';
						break;
					case 'az':
						$sorting = '`name`';
						break;
					case 'maxmin':
						$sorting = '`price` DESC';
						break;
					case 'minmax':
						$sorting = '`price`';
						break;
					default:
						$sorting = '`rating` DESC';
						break;
				}

			} 
			// $qver
			$query  = "SELECT * FROM `goods` WHERE `public` = 1 $qver ORDER BY $sorting ";
			 return $data = $this->db->makeGoods($query,'id');

			}else{
	 		$query  = "SELECT * FROM `goods` WHERE `public` = 1 $qver ORDER BY `rating` DESC";
			return $this->db->makeGoods($query,'id');
 			}

 		}




 	public function get_id_good_colors(){

			$query = "SELECT id,idgood,namecolor FROM colors,goodcolors WHERE id=idcolor";
			$array = $this->db->makeQuery($query);
			foreach ($_GET as $k => $v) {
				foreach ($array as $ke => $va) {
					if ($k == $va['namecolor']) {
					$arr_good[$va['idgood']]=$va['idgood'];
					}
				}
			}return $arr_good;
 		}


 		public function get_id_good_feches(){

			$query = "SELECT id,idgood,namefech FROM feche,goodfeche WHERE id=idfeche";
			$array = $this->db->makeQuery($query);
			foreach ($_GET as $k => $v) {
				foreach ($array as $ke => $va) {
					if ($k == $va['namefech']) {
					$arr_good[$va['idgood']]=$va['idgood'];
					}
				}
			}return $arr_good;
 		}






 		 public function get_colors()
 	{

 		$queryee = "SELECT * FROM `colors`";
		return $this->db->makeQuery($queryee);
 	}
 	 public function get_feche()
 	{

 		$query = "SELECT * FROM `goodfeche`";
		return $this->db->makeQuery($query);
 	}
 		 public function MakeFeche()
 	{
 		$this->goods = $this->get_goods();
 		foreach ($this->goods as $key => $value) {
 			
 			$query = "SELECT * 
			 	  FROM `feche` 
			 	  INNER JOIN `goodfeche` 
			 	  ON id=idfeche
			 	  WHERE idgood = '".$key."'
			 	  ";
			$this->feche =  $this->db->makeQuery($query);
			$value['feche'] = $this->feche;
			$goodds[$key]=$value;

 		}if ($goodds) {
 			
 		
 		foreach ($goodds as $ky => $vue) {
 			$query = "SELECT * 
			 	  FROM `colors` 
			 	  INNER JOIN `goodcolors` 
			 	  ON idcolor=id
			 	  WHERE idgood = '".$ky."'
			 	  ";
			$this->feche =  $this->db->makeQuery($query);
			$vue['color'] = $this->feche;
			 $goodsds[$ky]=$vue;
 		}}return $goodsds;

 	}
 	function getimages($description){
 		$query = "SELECT `nameimg`,`good_id`
			 	  FROM `goodimg` 
			 	  WHERE descriptionimg = '".$description."'
			 	  ";
		return $this->feche =  $this->db->makeGoods($query,'good_id');
 	}


}
?>