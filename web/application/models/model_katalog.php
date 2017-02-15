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
 		 public function get_goods()
 	{
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
			$query  = "SELECT * FROM `goods` WHERE `public` = 1 ORDER BY $sorting ";
		return $data = $this->db->makeGoods($query,'id');
		}else{


 		$query  = "SELECT * FROM `goods` WHERE `public` = 1 ORDER BY `rating` DESC";
		return $this->db->makeGoods($query,'id');
 	}}
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