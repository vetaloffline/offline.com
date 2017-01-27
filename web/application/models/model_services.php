<?
class Model_Services extends Model
{
	
	public function get_data()
	{	
		return $this->db->makeQuery("SELECT * FROM goods");
		// Здесь мы просто сэмулируем реальные данные.
		
	
	}

}