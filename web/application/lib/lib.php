<?
	class Lib 
	{
		static function clearRequest($req){
			return trim(strip_tags(htmlspecialchars($req)));		
		}

		static function mysqli_fetch_all_my($rows){
			$arr=[];
			while ($row = mysqli_fetch_assoc($rows)) {
				
				$arr[] = $row;
			}
			
			return $arr;
		}

		static function get_goods($rows,$id)
			{
				$arr=[];
			while ($row = mysqli_fetch_assoc($rows)) {
				$idd = $row[$id];
				$arr[$idd] = $row;
			}
			
			return $arr;
			}

		
	}
?>