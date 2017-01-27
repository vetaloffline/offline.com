<?class Model_goodslist extends Model
{	

	public function get_goods()
 	{

 		$query  = "SELECT * FROM `goods`";
		return $this->db->makeGoods($query,'id');
 	} 
 	public function get_goods_list()
 		{	
 			$this->goods = $this->get_goods();
 			$goods = $this->goods;
 			//var_dump($this->goods);

 			foreach ($this->goods as $ke => $va) {

 				$query = "SELECT `nameimg`,`good_id`
			 	      FROM `goodimg` 
			 	      WHERE `descriptionimg`='small_img'
			 	      AND good_id = '".$ke."'
			 	      ";
			 	 $this->goodList =$this->db->makeQuery($query);
			 
			 	$goods[$ke]['small_img'] =  $this->goodList;
			 	
			 	
 			} return $goods;
	
 		}


}