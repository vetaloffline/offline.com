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
		static function colorfeche($row,$parameters)
			{
				$arr=[];
				while ($rows = mysqli_fetch_assoc($row)) {
						$arr[]=$rows;
					}
				$arrr=[];
				foreach ($arr as $k => $v) 
					{
					$name =$v[$parameters];
					if ($_POST[$name] =='on') 
						{
							$arrr[]=$v[$parameters];
						}
					
					}return $arrr;
			}


		static function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
				list($w_i, $h_i, $type) = getimagesize($file_input);
				if (!$w_i || !$h_i) {
					echo 'Невозможно получить длину и ширину изображения';
					return;
			        }
			        $types = array('','gif','jpeg','png');
			        $ext = $types[$type];
			        if ($ext) {
			    	        $func = 'imagecreatefrom'.$ext;
			    	        $img = $func($file_input);
			        } else {
			    	        echo 'Некорректный формат файла';
					return;
			        }
				if ($percent) {
					$w_o *= $w_i / 100;
					$h_o *= $h_i / 100;
				}
				if (!$h_o) $h_o = $w_o/($w_i/$h_i);
				if (!$w_o) $w_o = $h_o/($h_i/$w_i);

				$img_o = imagecreatetruecolor($w_o, $h_o);
				imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
				if ($type == 2) {
					return imagejpeg($img_o,$file_output,100);
				} else {
					$func = 'image'.$ext;
					return $func($img_o,$file_output);
				}
			}

		static function translit($s) {
			  $s = (string) $s; // преобразуем в строковое значение
			  $s = strip_tags($s); // убираем HTML-теги
			  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
			  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
			  $s = trim($s); // убираем пробелы в начале и конце строки
			  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
			  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
			  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
			  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
			  return $s; // возвращаем результат
			}

		static function alias_valid($str){
				if(preg_match('/^[a-z,0-9,-]{4,20}$/i',$str)){
						$ys++;
						return $ys;
				}
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

	function valtel($tel)
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

	function valruss($rus)
	{if(preg_match('/[^а-яё]/iu',$rus,$arr))
			{
			
			}else{
					$yes++;
				return  $yes;
			}
	}

		
	}
?>