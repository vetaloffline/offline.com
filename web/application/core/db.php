<?
class Db
{
	protected $dbc;
	protected $result;
	protected $id_good;
	function __construct()
	{
		$this->dbc = new mysqli('localhost', login, password, db);
		if ($this->dbc->connect_error) {
			die();
		}
	}

	public function makeQuery($query){

		$this->result = $this->dbc->query($query);

		if (!$this->result) {
			var_dump($query);
			die();
		}
		return (is_bool($this->result)) ? $this->result : Lib::mysqli_fetch_all_my($this->result);
	} 


	 public function makeGoods ($query,$id)
		{
			$this->result = $this->dbc->query($query);
	 		$this->id_good = $id;
	 	if (!$this->result) {
			var_dump($query);
	 		die();
	 	}
	 	return (is_bool($this->result)) ? $this->result : Lib::get_goods($this->result,$this->id_good);
	 	}



	public function getOneparametr($query,$id)
		{
			$this->result = $this->dbc->query($query);
			$parametr = ($this->id_good = $id);

		if (!$this->result)
			{
			var_dump($query);
			die();
			}
			$row = mysqli_fetch_assoc($this->result);
			return $name_img_good = $row[$parametr];
		}

	public function makeGood($query)
		{
			$this->result = $this->dbc->query($query);
			if (!$this->result)
			{
			var_dump($query);
			die();
			}
			return $row = mysqli_fetch_assoc($this->result);
			
		}

	function __destruct(){
		$this->dbc->close();
	}
}?>