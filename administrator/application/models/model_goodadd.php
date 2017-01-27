<?
class Model_goodadd extends Model
	{	
		protected $query;

		function getColors(){
			$this->query= "SELECT *
					FROM `goodcolors` ";
		return $this->db->makeGoods($this->query,'id');
		}

		function getFeches(){
			$this->query= "SELECT *
					FROM `feche` ";
		return $this->db->makeGoods($this->query,'id');
		}


		function productAdd($alias_good)
			{	
			
				$namegood = Lib::clearRequest($_POST['name123']);

					if(strlen($namegood) == 0){
				header("Location: /admin/goodadd");
				die();
					}
				$pricegood =Lib::clearRequest($_POST['Price']);

					if(strlen($pricegood) == 0){
				header("Location: /admin/goodadd");
				die();
					}
				$availability = Lib::clearRequest($_POST['stiker22']);

					if ($availability=="t22") {
						$endgood = 0;
					}else{$endgood = 1;}
				$mediaLinkVideo = Lib::clearRequest($_POST['mediaLinkVideo']);
				$demo = Lib::clearRequest($_POST['demo']);
				$stiker = Lib::clearRequest($_POST['stiker1']);

					switch ($stiker) {
						case 't2':
							$stick ="superPrice";
							break;
						case 't3':
							$stick ="topSales";
							break;
						case 't4':
							$stick ="stock";
							break;
						default:
							break;
					}
				$oldPrice = Lib::clearRequest($_POST['oldPrice']);

					$raiting=Lib::clearRequest($_POST['raiting123']);
				switch ($raiting) {
					case 't1':
						$rating=0;
						break;
					case 't2':
						$rating=0.5;
						break;
					case 't3':
						$rating=1;
						break;
					case 't4':
						$rating=1.5;
						break;
					case 't5':
						$rating=2;
						break;
					case 't6':
						$rating=2.5;
						break;
					case 't7':
						$rating=3;
						break;
					case 't8':
						$rating=3.5;
						break;
					case 't9':
						$rating=4;
						break;
					case 't10':
						$rating=4.5;
						break;
					case 't11':
						$rating=5;
						break;
				}
				$description = Lib::clearRequest($_POST['description']);
//////////////////////////////////////
	$public = $_POST['public'];
	if ($public) {
		$public = 1;
	}
//////////////////////////Добавляем ФОТО в базу


		if ((int)$_FILES['imgfoto1']['error'] === 0) 
		{
		$filetype=$_FILES['imgfoto1']['type'];
		$fileform=explode(".",$_FILES['imgfoto1']['name']);
		$fileform=$fileform[count($fileform)-1];
		if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
			{$nazvaimg=md5(microtime().uniqid().rand(0,9999));
			$nameimgfull = $nazvaimg;
			move_uploaded_file($_FILES['imgfoto1']["tmp_name"], "web/images/fotogoods/".$nameimgfull.".".$fileform);

				}
			$nameimg=$nameimgfull.".".$fileform;

			
			}else{
				header("Location: /admin/goodadd");
				die();}


		
	///////////////////////////////////////////////						
				$this->query = "INSERT INTO `goods`
											(`name`, `price` ,`availability`,`video`,`demo`,`sticker`,`oldprice`,`rating`,`description`,`public`) 
								VALUES ('$namegood',$pricegood,$endgood,'$mediaLinkVideo','$demo','$stick','$oldPrice','$rating','$description','$public');";

				$this->db->makeQuery($this->query);
				$idlastgood = $this->db->getLastid();
/////////////////делаем апдейт алиас в таблице гудс уже с полученый айди

		//$alias_good = Lib::translit($alias_good);
		$alias_good = "/".$alias_good;
		
		$this->query = "SELECT * 
				 		FROM `routes` 
				 		WHERE `alias_uri` = '$alias_good'";
		if ($this->db->makeQuery($this->query)) {
			$alias_good = $alias_good.'_'.$idlastgood;
		}

		$this->query = "UPDATE `goods` 
						SET `alias`= '$alias_good'
						WHERE `id` = '$idlastgood'";
		$this->db->makeQuery($this->query);

		$real_rout = '/product&?id='.$idlastgood;
		$this->query= "INSERT INTO `routes`(`alias_uri`, `real_rout`, `public`,`goodid`) 
 					   VALUES 			('$alias_good','$real_rout','$public','$idlastgood')";
 		$this->db->makeQuery($this->query);



///////////////////////////////////////////////////////////////////////////////////////
			$this->query =  "INSERT INTO `goodimg`
										(`nameimg`,`descriptionimg`,`good_id`,`communication`) 
							VALUES ('$nameimg','full_img',$idlastgood,'main');";

			$this->db->makeQuery($this->query);
///////////////////////////Добавляем цвета в базу
				 $this->query = "SELECT `id`,`namecolor`
				 				FROM `goodcolors`";

				 $goodcolors = $this->db->makeQuery($this->query);
				foreach ($goodcolors as $key => $value) {
					$colorarray[]=$value;
				 }
				 foreach ($colorarray as $k => $v) {

				 	if ($_POST[$v['namecolor']] !== NULL) {
				 		$idcolor = $v['id'];
				 		$this->query =  "INSERT INTO `colors`
											(`idgood`, `idcolor`) 
										VALUES ('$idlastgood',$idcolor);";

						$this->db->makeQuery($this->query);
				 	}
				 }

//////////////////////////Добавляем фичи в базу
				 $this->query = "SELECT `id`,`namefech`
				 				FROM `feche`";
				 $goodfeches = $this->db->makeQuery($this->query);
				 foreach ($goodfeches as $keyfech => $valuefech) {
				 	
				 	if ($_POST[$valuefech['namefech']] !== NULL) {
				 		$idfeche = $valuefech['id'];

				 		$this->query =  "INSERT INTO `goodfeche`
											(`idgood`, `idfeche`) 
										VALUES ('$idlastgood',$idfeche);";

						$this->db->makeQuery($this->query);
				 	}
				 }

/////////////////FOTO MEAN
			 $file_input='web/images/fotogoods/'.$nameimg;
			 $file_output='web/images/fotogoods/mean_img'.$nameimg;
			 $mean_img='mean_img'.$nameimg;
			$size_img=getimagesize('web/images/fotogoods/'.$nameimg);

			if ($size_img[0] > $size_img[1])
				{
					$w_o=130;
					Lib::resize($file_input,  $file_output,  $w_o,  $h_o);
				}
				else
					{
						$h_o=150;
						Lib::resize($file_input,  $file_output,  $w_o,  $h_o);
					}

				$this->query =  "INSERT INTO `goodimg`
										(`nameimg`,`descriptionimg`,`good_id`,`communication`) 
							VALUES ('$mean_img','mean_img',$idlastgood,'main');";

				$this->db->makeQuery($this->query);

//////////////////////FOTO BASKET
				$file_input='web/images/fotogoods/'.$nameimg;
				 $file_output='web/images/fotogoods/small_img'.$nameimg;
				 $small_img='small_img'.$nameimg;
				$size_img=getimagesize('web/images/fotogoods/'.$nameimg);

				if ($size_img[0] > $size_img[1])
					{
						$w_o=40;
						Lib::resize($file_input,  $file_output,  $w_o,  $h_o);
					}
					else
						{
							$h_o=40;
							Lib::resize($file_input,  $file_output,  $w_o,  $h_o);
						}
					$this->query =  "INSERT INTO `goodimg`
										(`nameimg`,`descriptionimg`,`good_id`,`communication`) 
							VALUES ('$small_img','small_img',$idlastgood,'main');";
									
					$this->db->makeQuery($this->query);
///////////////////////////////////////////////////////////
					$file_input='web/images/fotogoods/'.$nameimg;
					 $file_output='web/images/fotogoods/reklama_img'.$nameimg;
					 $reklama_img='reklama_img'.$nameimg;
					$size_img=getimagesize('web/images/fotogoods/'.$nameimg);

					if ($size_img[0] > $size_img[1])
						{
							$w_o1=80;
							Lib::resize($file_input,  $file_output,  $w_o1,  $h_o1);
						}
						else
							{
								$h_o1=100;
								Lib::resize($file_input,  $file_output,  $w_o1,  $h_o1);
							}

						$this->query =  "INSERT INTO `goodimg`
										(`nameimg`,`descriptionimg`,`good_id`,`communication`) 
							VALUES ('$reklama_img','reklama_img',$idlastgood,'main');";

						$this->db->makeQuery($this->query);


/////////////////////////////////////////additional photo
						if ((int)$_FILES['imgfoto2']['error'] === 0) 
							{	
							$filetype=$_FILES['imgfoto2']['type'];
							$fileform=explode(".",$_FILES['imgfoto2']['name']);
							$fileform=$fileform[count($fileform)-1];
							if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
								{
								$nazvaimg=md5(microtime().uniqid().rand(0,9999));
								move_uploaded_file($_FILES['imgfoto2']["tmp_name"], "web/images/fotogoods/".'_additional_foto'.$nazvaimg.".".$fileform);

								$nameimgdop='_additional_foto'.$nazvaimg.".".$fileform;

								$this->query =  "INSERT INTO `goodimg`
													(`nameimg`,`descriptionimg`,`good_id`,`communication`) 
												VALUES ('$nameimgdop','additional_foto',$idlastgood,'additional_foto_1');";
								$this->db->makeQuery($this->query);


								$file_input='web/images/fotogoods/'.$nameimgdop;
						 		$file_output='web/images/fotogoods/small_img'.$nameimgdop;
						 		$small_img='small_img'.$nameimgdop;
								$size_img=getimagesize('web/images/fotogoods/'.$nameimgdop);

								if ($size_img[0] > $size_img[1])
									{
										$w_o2=40;
										Lib::resize($file_input,  $file_output,  $w_o2,  $h_o2);
									}
									else
										{
											$h_o2=40;
											Lib::resize($file_input,  $file_output,  $w_o2,  $h_o2);
										}
								$this->query =  "INSERT INTO `goodimg`
												(`nameimg`,`descriptionimg`,`good_id`,`communication`) 
									VALUES ('$small_img','small_img',$idlastgood,'additional_foto_1');";

								$this->db->makeQuery($this->query);
								}

								
							}
							

						

						
/////////////////////////////////////////////////////////////////////////////////////////////

						if ((int)$_FILES['imgfoto3']['error'] === 0) 
							{
							$filetype=$_FILES['imgfoto3']['type'];
							$fileform=explode(".",$_FILES['imgfoto3']['name']);
							$fileform=$fileform[count($fileform)-1];
							if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
								{
								$nazvaimg=md5(microtime().uniqid().rand(0,9999));
								move_uploaded_file($_FILES['imgfoto3']["tmp_name"], "web/images/fotogoods/".'_additional_foto'.$nazvaimg.".".$fileform);

								$nameimgdop='_additional_foto'.$nazvaimg.".".$fileform;

								$this->query =  "INSERT INTO `goodimg`
												(`nameimg`,`descriptionimg`,`good_id`,`communication`) 
									VALUES ('$nameimgdop','additional_foto',$idlastgood,'additional_foto_2');";

								$this->db->makeQuery($this->query);

								$file_input='web/images/fotogoods/'.$nameimgdop;
						 		$file_output='web/images/fotogoods/small_img'.$nameimgdop;
						 		$small_img='small_img'.$nameimgdop;
								$size_img=getimagesize('web/images/fotogoods/'.$nameimgdop);

								if ($size_img[0] > $size_img[1])
									{
										$w_o2=40;
										Lib::resize($file_input,  $file_output,  $w_o2,  $h_o2);
									}
									else
										{
											$h_o2=40;
											Lib::resize($file_input,  $file_output,  $w_o2,  $h_o2);
										}
								}
								$this->query =  "INSERT INTO `goodimg`
												(`nameimg`,`descriptionimg`,`good_id`,`communication`) 
									VALUES ('$small_img','small_img',$idlastgood,'additional_foto_2');";

								$this->db->makeQuery($this->query);
							}
							
//////////////////////////////////////////////////////////////////////////////////////////////////////
						if ((int)$_FILES['imgfoto4']['error'] === 0) 
							{
							$filetype=$_FILES['imgfoto4']['type'];
							$fileform=explode(".",$_FILES['imgfoto4']['name']);
							$fileform=$fileform[count($fileform)-1];
							if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
								{
								$nazvaimg=md5(microtime().uniqid().rand(0,9999));
								move_uploaded_file($_FILES['imgfoto4']["tmp_name"], "web/images/fotogoods/".'_additional_foto'.$nazvaimg.".".$fileform);



								$nameimgdop='_additional_foto'.$nazvaimg.".".$fileform;

								$this->query =  "INSERT INTO `goodimg`
												(`nameimg`,`descriptionimg`,`good_id`,`communication`) 
									VALUES ('$nameimgdop','additional_foto',$idlastgood,'additional_foto_3');";

								$this->db->makeQuery($this->query);

								$file_input='web/images/fotogoods/'.$nameimgdop;
						 		$file_output='web/images/fotogoods/small_img'.$nameimgdop;
						 		$small_img='small_img'.$nameimgdop;
								$size_img=getimagesize('web/images/fotogoods/'.$nameimgdop);

								if ($size_img[0] > $size_img[1])
									{
										$w_o2=40;
										Lib::resize($file_input,  $file_output,  $w_o2,  $h_o2);
									}
									else
										{
											$h_o2=40;
											Lib::resize($file_input,  $file_output,  $w_o2,  $h_o2);
										}
								}
								$this->query =  "INSERT INTO `goodimg`
												(`nameimg`,`descriptionimg`,`good_id`,`communication`) 
									VALUES ('$small_img','small_img',$idlastgood,'additional_foto_3');";

								$this->db->makeQuery($this->query);
							}
							

				header("Location: /admin/goodadd");

			}

	}

?>