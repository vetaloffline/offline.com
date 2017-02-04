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

		static function valpassword($str){
				if(preg_match('/[^\w\s\)\(\+\_\$\.\\\%\^\?\|\[\]]/',$str))
					{
				//"Nedopustim simvol";	
					}else if(preg_match('/[A-Za-z]/',$str) && preg_match('/[0-9]/',$str) && preg_match('/.{8,64}/',$str))
									{
									$ys++;
									return $ys;
									}
									else
									{
									//'proverka ne proudena';
									}
		}

		static function valmail($mail){
			if(preg_match("/[^\w\.,@]/i",$mail)){}

				else if (preg_match_all('/([a-z-0-9]+\.)*[a-z-0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*\.[a-z]{2,6}/',$mail,$arr)) 
					{
					 $aaa++;
					 return $aaa;
					}
					else{}
		}

	static function valtel($tel)
	{
	if (preg_match('/[^\d]/',$tel))
		 {
		 //"Ne dopustimuy simvol";
		 }
		 elseif (preg_match('/\d{6,7}/',$tel,$arr))
		 	{
			$asdf++;
			return $asdf;
			}
			else
				{
				//"Proverka ne proudena";
				}
	}

	static function valruss($rus)
	{if(preg_match('/[^а-яё]/iu',$rus,$arr))
			{
			
			}else{
					$yes++;
				return  $yes;
			}
	}

	static function valname($name){
		if (preg_match('/^[a-z]{1,20}$/i', $name)) {
			return true;
		}else{return false;}
	}

	static function language($lan){
		while ($row = mysqli_fetch_assoc($lan)) {
				$arr[$row['name']] = $row['transfer'];
			}return $arr;
	}

		
	}
?>