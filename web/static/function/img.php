<?
 include "funcimg.php";
 ?>
 <form action="#" method="POST" enctype="multipart/form-data">
 	<input type="file" name="imgfoto1">
 	<input type="submit" name="">
 </form>
 <?
if ((int)$_FILES['imgfoto1']['error'] === 0) 
		{
		$filetype=$_FILES['imgfoto1']['type'];
		$fileform=explode(".",$_FILES['imgfoto1']['name']);
		$fileform=$fileform[count($fileform)-1];
		if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
			{$nazvaimg=md5(microtime().uniqid().rand(0,9999));
			move_uploaded_file($_FILES['imgfoto1']["tmp_name"], "../../images/".$nazvaimg.".".$fileform);

			}
			$nameimg=$nazvaimg.".".$fileform;
			}




 
 $file_input='../../images/'.$nameimg;
 $file_output='small_img.jpg';
 $w_o=100;
 //$h_o=30;
resize($file_input,  $file_output,  $w_o,  $h_o);
$sss= getimagesize('../../images/'.$nameimg);
if ($sss[0] > $sss[1]) {
	echo 'ширина больше';
}else{echo 'Высота больше';}

?>