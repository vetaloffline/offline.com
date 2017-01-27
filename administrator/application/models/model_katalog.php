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

 		$query  = "SELECT * FROM `goods`";
		return $this->db->makeGoods($query,'id');
 	}
 		 public function get_colors()
 	{

 		$queryee = "SELECT * FROM `colors`";
		return $this->db->makeQuery($queryee);
 	}
 	 public function get_feche()
 	{

 		$qquery = "SELECT * FROM `goodfeche`";
		return $this->db->makeQuery($qquery);
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
 		}
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
 		}return $goodsds;

 	}

}
?>