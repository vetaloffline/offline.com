<?
class Model_product extends Model
	{	
		public $id;
		public function get_good($id)
			{
				$this->id = $id;
				$querry = "SELECT * 
							FROM `goods`
							WHERE id = '".$this->id."'";
			 	return $this->db->makeGood($querry);
			
			}
		public function makeColorsGood($id)
			{
				$this->id = $id;
				$querry = "SELECT *
							FROM `colors` 
							INNER JOIN `goodcolors`
							ON idcolor = id
							WHERE idgood = '".$this->id."';";
			 	return $this->db->makeQuery($querry);
			}
		public function makeImg_smallGood($id)
			{
				$this->id = $id;
				$querry = "SELECT `nameimg`
							FROM `goodimg`
							WHERE good_id = '".$this->id."'
							AND descriptionimg = 'small_img';";
			 	return $this->db->makeQuery($querry);
			}

	}

?>