<?
class Model_editgood extends Model
{	
	public function Getgoods($id)
		{
			$query  = "SELECT * 
					   FROM `goods`
					   WHERE id = '".$id."'";
		return $this->db->makeGoods($query,'id');

		}
	public function getColors(){
		$query  = "SELECT * 
				   FROM `goodcolors`";
		return $this->db->makeGoods($query,'id');
       }
        public function getidcolor($id){
        	$query = "SELECT `idcolor`
                      FROM `colors`
                      WHERE idgood = '".$id."';";
         return $this->db->makeQuery($query);

        }
        public function getFeche(){
    		$query  = "SELECT * 
    				   FROM `feche`";
		return $this->db->makeGoods($query,'id');
       }
        public function getidfeche($id){
        	$query = "SELECT `idfeche`
                      FROM `goodfeche`
                      WHERE idgood = '".$id."';";
         return $this->db->makeQuery($query);

        }
        public function getFoto($id){

            $query = "SELECT `nameimg`,`descriptionimg`,`communication`
                      FROM `goodimg`
                      WHERE good_id = '".$id."'";
            return $this->db->makeQuery($query);
        }
        public function deleteImage($id,$addidel){

             $query = "SELECT `nameimg`
                  FROM `goodimg`
                  WHERE `good_id` = $id
                  AND `communication` = $addidel";

              $additionaldel = $this->db->makeQuery($query);
              
            foreach ($additionaldel as $k => $v) {
               $name = $v['nameimg'];
                unlink("web/images/fotogoods/$name");
            }


            $query = "DELETE FROM `goodimg` 
                      WHERE `good_id` = $id
                      AND `communication` = $addidel";

           $this->db->makeQuery($query);

       
        header("Location: /admin/editgood&?id=$id");
        }

        function editGood(){
            $name_good=$_POST['name_good'];///Имя товара
            $mediaLinkVideo= Lib::clearRequest($_POST['mediaLinkVideo']);/////Видео о товаре
            $demo=Lib::clearRequest($_POST['demo']);//демонстрация товара
            $stiker=$_POST['stiker1'];//Стикеры
            $availability=$_POST['stiker22'];//Наличие товара
            $oldPrice=$_POST['oldPrice'];//старая цена товара
            $Price=$_POST['Price'];//актуальная цена товара
            $raiting=$_POST['raiting123'];//
            $description=$_POST['description'];
            $id = $_POST['id_good_ob'];
            $alias = $_POST['alias_good'];
            $public = $_POST['public'];
            if ($public) {
               $public = 1;
            }

 //////////////////////////////ALIAS
            if (!$alias) {////проверка на пустоту
                header("Location: /admin/editgood&?id=$id");
                die();
            }else{
               $alias = Lib::translit($alias);
               $alias = '/'.$alias;
               //todo проверка совпадений алиас
            }






            ///////////Проверка на пустоту строки имени
            $length_name=mb_strlen($name_good);
            $name_g = Lib::clearRequest($name_good);
                if ($length_name < 1)
                    {
                        header("Location: /admin/editgood&?id=$id");
                        die();
                    }
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

             $length_price=mb_strlen($Price);
             $digit = ctype_digit($Price);           
            if($Price == 0 || $length_price > 6 || $length_price < 1)
                {
                header("Location: /admin/editgood&?id=$id");
                die();
                }

            if ($availability == "t22") {
                    $endgood = 0;
                }else{$endgood = 1;}

            $length_oldprice=mb_strlen($oldPrice);
                 if($length_oldprice > 6)
                {
                header("Location: /admin/editgood&?id=$id");
                die();
                }


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
            $query = "UPDATE `goods`
                      SET `name`= '".$name_g."',
                          `video`='".$mediaLinkVideo."',
                          `demo`='".$demo."',
                          `rating`='".$rating."',
                          `price`='".$Price."',
                          `availability`='".$endgood."',
                          `oldprice`='".$oldPrice."',
                          `sticker`='".$stick."',
                          `description`='".$description."',
                          `public`='".$public."',
                          `alias`='".$alias."'
                      WHERE id = '".$id."';";
            $this->db->makeQuery($query);
//////////////////////////////////////////////////////
            $subsSTR = substr($alias, 0,1);
            if ($subsSTR !== '/') {
              $alias = '/'.$subsSTR;
            }
            $query = "UPDATE `routes`
                    SET `public`='$public',`alias_uri`='$alias'
                    WHERE `goodid` = '$id
                    '";
            $this->db->makeQuery($query);
////////////////////////////COLORS///////////////////////
            $query = "SELECT *
                      FROM `colors`
                      WHERE idgood = '".$id."';";

            $colorsgood = $this->db->makeQuery($query);

            $query = "SELECT * FROM `goodcolors`";

            $colors = $this->db->makeQuery($query);

            
///////////////////пихаем в масив айди цветов с пост запроса   
            foreach ($colors as $key => $value) {
                if ($_POST[$value['namecolor']]) {
                    $idcolorpost[$value['id']]= $value['id'];
                }}
///////////////////пихаем в масив айди цветов с базы              
            foreach ($colorsgood as $k => $v) {
                    $idcolosgood[$v['idcolor']]=$v['idcolor'];
                }
/////////////////////Проверяем что нужно записать а что удалить         
            foreach ($colors as $ke => $va) {
            
                if ($idcolorpost[$va['id']] == NULL && $idcolosgood[$va['id']]) {
                   
                    $idcolor = $idcolosgood[$va['id']];
                    $query ="DELETE FROM `colors` 
                             WHERE idcolor = $idcolor
                             AND idgood = $id";
                    $this->db->makeQuery($query);

                }else if ($idcolorpost[$va['id']] && $idcolosgood[$va['id']] == NULL) {

                    $idcolor = $idcolorpost[$va['id']];
                    $query = "  INSERT INTO `colors`
                                    (`idgood`, `idcolor`) 
                                VALUES ($id,$idcolor)";
                    $this->db->makeQuery($query);
                }
            }

////////////////////////////////Feaches///////////////////////

            $query = "SELECT *
                      FROM `goodfeche`
                      WHERE idgood = '".$id."';";

            $fechesgood = $this->db->makeQuery($query);

            $query = "SELECT * FROM `feche`";

            $feaches = $this->db->makeQuery($query);
          
///////////////////пихаем в масив айди цветов с пост запроса   
            foreach ($feaches as $key => $value) {
                if ($_POST[$value['namefech']]) {
                    $idfechpost[$value['id']]= $value['id'];
                }}
///////////////////пихаем в масив айди цветов с базы              
            foreach ($fechesgood as $k => $v) {
                    $idfechesgood[$v['idfeche']]=$v['idfeche'];
                }
/////////////////////Проверяем что нужно записать а что удалить         
            foreach ($feaches as $ke => $va) {
            
                if ($idfechpost[$va['id']] == NULL && $idfechesgood[$va['id']]) {
                  
                    $idfech = $idfechesgood[$va['id']];
                    $query ="DELETE FROM `goodfeche` 
                             WHERE idfeche = $idfech
                             AND idgood = $id";
                    $this->db->makeQuery($query);

                }else if ($idfechpost[$va['id']] && $idfechesgood[$va['id']] == NULL) {
                   
                    $idfech = $idfechpost[$va['id']];
                    $query = "  INSERT INTO `goodfeche`
                                    (`idgood`, `idfeche`) 
                                VALUES ($id,$idfech)";
                   $this->db->makeQuery($query);
                }
            }


//////////////////////////////////////////////////////////////////////////////////////

$query =                 "SELECT *
                            FROM `goodimg` 
                            WHERE good_id = '".$id."'";
                $arrayimgg = $this->db->makeQuery($query);
                foreach ($arrayimgg as $keyqq => $valueqq) {
                    if ($valueqq['communication'] == 'main') {
                        $nameingmain[] = $valueqq['nameimg']; 
                    }
                    if ($valueqq['communication'] == 'additional_foto_1') {
                       $nameimgaddi1[] = $valueqq['nameimg'];
                    }
                    if ($valueqq['communication'] == 'additional_foto_2') {
                       $nameimgaddi2[] = $valueqq['nameimg'];
                    }
                    if ($valueqq['communication'] == 'additional_foto_3') {
                       $nameimgaddi3[] = $valueqq['nameimg'];
                    }};



            if ((int)$_FILES['imgfoto1']['error'] === 0) 
            {
            $filetype=$_FILES['imgfoto1']['type'];
            $fileform=explode(".",$_FILES['imgfoto1']['name']);
            $fileform=$fileform[count($fileform)-1];
            if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
                {
                $nazvaimg=md5(microtime().uniqid().rand(0,9999));
                $nameimgfull = $nazvaimg;
                move_uploaded_file($_FILES['imgfoto1']["tmp_name"], "web/images/fotogoods/".$nameimgfull.".".$fileform);

        
                $nameimg=$nameimgfull.".".$fileform;
                

                  foreach ($nameingmain as $keyimg => $valueimg) 
                    {
                        $name = $valueimg;
                        unlink("web/images/fotogoods/$name");
                    }
                        $query =        "UPDATE `goodimg` 
                                        SET `nameimg`= '$nameimg'
                                        WHERE good_id = '".$id."'
                                        AND descriptionimg = 'full_img'
                                        AND communication = 'main'";

                        $this->db->makeQuery($query);


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

                            $query =        "UPDATE `goodimg` 
                                             SET `nameimg`= '$mean_img'
                                             WHERE good_id = '".$id."'
                                             AND descriptionimg = 'mean_img'
                                             AND communication = 'main'";

                            $this->db->makeQuery($query);

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
                            $query =        "UPDATE `goodimg` 
                                             SET `nameimg`= '$small_img'
                                             WHERE good_id = '".$id."'
                                             AND descriptionimg = 'small_img'
                                             AND communication = 'main'";
                                            
                            $this->db->makeQuery($query);
////////////////REKLAMA
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

                            $query =        "UPDATE `goodimg` 
                                             SET `nameimg`= '$reklama_img'
                                             WHERE good_id = '".$id."'
                                             AND descriptionimg = 'reklama_img'
                                             AND communication = 'main'";

                            $this->db->makeQuery($query);
                    
                  }}   
                
          
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
                                

                                $file_input='web/images/fotogoods/'.$nameimgdop;
                                $file_output='web/images/fotogoods/small_img'.$nameimgdop;
                                $small_img_addi='small_img'.$nameimgdop;
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

                                if ($nameimgaddi1 !== NULL) {
                                     foreach ($nameimgaddi1 as $keyimg => $valueimgadd) 
                                    {
                                        $nameadd = $valueimgadd;
                                        unlink("web/images/fotogoods/$nameadd");
                                    }
                                     $this->query =  "UPDATE `goodimg` 
                                                 SET `nameimg`= '$nameimgdop'
                                                 WHERE good_id = '".$id."'
                                                 AND descriptionimg = 'additional_foto'
                                                 AND communication = 'additional_foto_1'";;
                                    $this->db->makeQuery($this->query);

                                    $this->query =  "UPDATE `goodimg` 
                                                 SET `nameimg`= '$small_img_addi'
                                                 WHERE good_id = '".$id."'
                                                 AND descriptionimg = 'small_img'
                                                 AND communication = 'additional_foto_1'";

                                    $this->db->makeQuery($this->query);
                                 }else{
                                        $this->query =  "INSERT INTO `goodimg`
                                                                  (`nameimg`,`descriptionimg`,`good_id`,`communication`) 
                                                         VALUES ('$nameimgdop','additional_foto',$id,'additional_foto_1');";
                                        $this->db->makeQuery($this->query);

                                        $this->query =  "INSERT INTO `goodimg`
                                                             (`nameimg`,`descriptionimg`,`good_id`,`communication`) 
                                                        VALUES ('$small_img_addi','small_img',$id,'additional_foto_1');";

                                        $this->db->makeQuery($this->query);

                                 } 

                                }

                                
                            }




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
                                

                                $file_input='web/images/fotogoods/'.$nameimgdop;
                                $file_output='web/images/fotogoods/small_img'.$nameimgdop;
                                $small_img_addi='small_img'.$nameimgdop;
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
                                        
                                if ($nameimgaddi2 !== NULL) {
                                     foreach ($nameimgaddi2 as $keyimg => $valueimgadd) 
                                    {
                                        $nameadd = $valueimgadd;
                                        unlink("web/images/fotogoods/$nameadd");
                                    }
                                     $this->query =  "UPDATE `goodimg` 
                                                 SET `nameimg`= '$nameimgdop'
                                                 WHERE good_id = '".$id."'
                                                 AND descriptionimg = 'additional_foto'
                                                 AND communication = 'additional_foto_2'";;
                                    $this->db->makeQuery($this->query);

                                    $this->query =  "UPDATE `goodimg` 
                                                 SET `nameimg`= '$small_img_addi'
                                                 WHERE good_id = '".$id."'
                                                 AND descriptionimg = 'small_img'
                                                 AND communication = 'additional_foto_2'";

                                    $this->db->makeQuery($this->query);
                                 }else{
                                        $this->query =  "INSERT INTO `goodimg`
                                                                  (`nameimg`,`descriptionimg`,`good_id`,`communication`) 
                                                         VALUES ('$nameimgdop','additional_foto',$id,'additional_foto_2');";
                                        $this->db->makeQuery($this->query);

                                        $this->query =  "INSERT INTO `goodimg`
                                                             (`nameimg`,`descriptionimg`,`good_id`,`communication`) 
                                                        VALUES ('$small_img_addi','small_img',$id,'additional_foto_2');";

                                        $this->db->makeQuery($this->query);

                                 } 

                                }

                                
                            }



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
                                

                                $file_input='web/images/fotogoods/'.$nameimgdop;
                                $file_output='web/images/fotogoods/small_img'.$nameimgdop;
                                $small_img_addi='small_img'.$nameimgdop;
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
                                        
                                if ($nameimgaddi3 !== NULL) {
                                     foreach ($nameimgaddi3 as $keyimg => $valueimgadd) 
                                    {
                                        $nameadd = $valueimgadd;
                                        unlink("web/images/fotogoods/$nameadd");
                                    }
                                     $this->query =  "UPDATE `goodimg` 
                                                 SET `nameimg`= '$nameimgdop'
                                                 WHERE good_id = '".$id."'
                                                 AND descriptionimg = 'additional_foto'
                                                 AND communication = 'additional_foto_3'";;
                                    $this->db->makeQuery($this->query);

                                    $this->query =  "UPDATE `goodimg` 
                                                 SET `nameimg`= '$small_img_addi'
                                                 WHERE good_id = '".$id."'
                                                 AND descriptionimg = 'small_img'
                                                 AND communication = 'additional_foto_3'";

                                    $this->db->makeQuery($this->query);
                                 }else{
                                        $this->query =  "INSERT INTO `goodimg`
                                                                  (`nameimg`,`descriptionimg`,`good_id`,`communication`) 
                                                         VALUES ('$nameimgdop','additional_foto',$id,'additional_foto_3');";
                                        $this->db->makeQuery($this->query);

                                        $this->query =  "INSERT INTO `goodimg`
                                                             (`nameimg`,`descriptionimg`,`good_id`,`communication`) 
                                                        VALUES ('$small_img_addi','small_img',$id,'additional_foto_3');";

                                        $this->db->makeQuery($this->query);

                                 } 

                                }
}
                                
                            




        header("Location: /admin/editgood&?id=$id");}
   
       }  
           	
