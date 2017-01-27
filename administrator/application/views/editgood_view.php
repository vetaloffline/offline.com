<link rel="stylesheet" type="text/css" href="/administrator/css/style_godadd.css">
<?include "menu.php";
$id=$_GET['id'];
$row= $db;
$colors=$goods;
$idcolors=$colorg;
$feche = $fef;
$idfeche = $idcolor;

foreach ($idfec as $key => $value) {
  if ($value['descriptionimg'] == 'mean_img') {
   $goodmainimg=$value['nameimg'];
  }
  if ($value['descriptionimg'] == 'small_img' && $value['communication'] == 'additional_foto_1') {
   $goodaddimg1=$value['nameimg'];
  }
  if ($value['descriptionimg'] == 'small_img' && $value['communication'] == 'additional_foto_2') {
   $goodaddimg2=$value['nameimg'];
  }
  if ($value['descriptionimg'] == 'small_img' && $value['communication'] == 'additional_foto_3') {
   $goodaddimg3=$value['nameimg'];
  }
}

?>
<div class="body_center">
<pre> </pre>
<div class="aaasssddd"></div>
<div class="asdsafgcxer">

  <a href="/admin/goodslist">
    <div class="img_close111"></div>
  </a>
  <div id='korz_pok'><h2>Редактирование товара</h2></div>
  <div id="main_g123">
    <form action="/admin/editgood/edit" method="POST" enctype="multipart/form-data">
  <label  class="formnazgod"><b>Название товара:</b><br></label>
  <input type="text" class="formnazgod" name="name_good" placeholder="Название товара.." size=50px value="<?=$row[$id]['name']?>"><br>
  <b>Alias</b><br>
  <input type="text" name="alias_good" placeholder="Путь к товару" class="formnazgod" value="<?=$row[$id]['alias']?>"><br>

 <label  class="formnazgod"><b>Видеообзор</b></label> <br>   
 <input type="text" class="formnazgod" placeholder="Ссылка на видео.." name="mediaLinkVideo" value="<?=$row[$id]['video']?>"><br>

  <label  class="formnazgod" ><b>Демонстрация товара</b></label>  <br>  
 <input type="text" class="colorgod" placeholder="Ссылка на видео.." name="demo" value="<?=$row[$id]['demo']?>"><br>

  <label for="stiker" class="formnazgod"><b>Стикер </b>    
   <select name="stiker1" class="colorgod">
     <option  value="t1" <?if($row[$id]['sticker'] == ""){echo 'selected';}?>>- - - - - - -</option>      
     <option  value="t2" <?if($row[$id]['sticker'] == "superPrice"){echo 'selected';}?>>Суперцена</option>
     <option  value="t3" <?if($row[$id]['sticker'] == "topSales"){echo 'selected';}?>>Топ продаж</option>
     <option  value="t4" <?if($row[$id]['sticker'] == "stock"){echo 'selected';}?>>Акция</option>  
      </select><br>
      <label for="photo" class="colorgod"><b>Главное Фото:</b></label><br>
      <img src="/web/images/fotogoods/<?=$goodmainimg?>"><br>
      <input type="file" name="imgfoto1" class="colorgod"><br>
      
      <label for="photo" class="colorgod"><b>Фото товара 2:</b></label>
      <?if($goodaddimg1){?><img src="/web/images/fotogoods/<?=$goodaddimg1?>"><br>
      <a href="/admin/editgood/deleteimg/&?id=<?=$id?>&foto='additional_foto_1'">Удалить фото</a>
      <?}?>
      <input type="file" name="imgfoto2" class="colorgod"><br>
      
      <label for="photo" class="colorgod"><b>Фото товара 3:</b></label>
      <?if($goodaddimg2){?><img src="/web/images/fotogoods/<?=$goodaddimg2?>"><br>
      <a href="/admin/editgood/deleteimg/&?id=<?=$id?>&foto='additional_foto_2'">Удалить фото</a>
      <?}?>
      <input type="file" name="imgfoto3" class="colorgod"><br>
      
      <label for="photo" class="colorgod"><b>Фото товара 4:</b></label>
      <?if($goodaddimg3){?><img src="/web/images/fotogoods/<?=$goodaddimg3?>"><br>
      <a href="/admin/editgood/deleteimg/&?id=<?=$id?>&foto='additional_foto_3'">Удалить фото</a>
      <?}?>
      <input type="file" name="imgfoto4" class="colorgod"><br>

       <label for="colors" class="colorgod"><b>Цвет товара (Все возможные)</b></label><br>
       <?
       foreach ($idcolors as $idi => $color) {
          $idcc = $color['idcolor'];
           $idcolorf[] = $idcc;
           ?>
          <span id="<?=$colors[$idcc]['namecolor']?>"><b><?=$colors[$idcc]['linkcolor']?></b></span><input type="checkbox" name="<?=$colors[$idcc]['namecolor']?>" class="colorgod" checked>
      <?}
      foreach ($colors as $keys => $values) {$idcolorsd[]=$values['id'];} 
  if ($idcolorf !== NULL) {
    $diff = array_diff($idcolorsd, $idcolorf);
      foreach ($diff as $keya => $valuea) {?>
      <span id="<?=$colors[$valuea]['namecolor']?>"><b><?=$colors[$valuea]['linkcolor']?></b></span><input type="checkbox" name="<?=$colors[$valuea]['namecolor']?>" class="colorgod" >
  <?}}else{
    foreach ($colors as $keya => $valuea) {?>
      <span id="<?=$valuea['namecolor']?>"><b><?=$valuea['linkcolor']?></b></span><input type="checkbox" name="<?=$valuea['namecolor']?>" class="colorgod" > 
     <? }}?>
        <br>
		<?$avalibi=$row['availability'];?>
      <label for="stiker33" class="colorgod"><b>Наличие  </b>   
     <select name="stiker22" class="colorgod">

     <option <?if($row[$id]['availability'] == 1){echo 'selected';}?> value="t11">В наличии</option>      
     <option <?if($row[$id]['availability'] == 0){echo 'selected';}?> value="t22">Заканчивается</option>
      </select><br>
		
      <label  class="colorgod"><b>Старая цена</b></label>
      <input type="text"  name="oldPrice"   pattern="\d+"  class="colorgod" value="<?if($row[$id]['oldprice'] > 0){echo $row[$id]['oldprice'];}?>"><small> грн</small><br> 

       <label class="colorgod"><b>Цена товара</b></label>
       <input type="text"  name="Price"  pattern="\d+" value="<?=$row[$id]['price']?>"  class="colorgod"><small>  грн</small><br>

       <label  ><b>Рейтинг</b></label>

  <select name="raiting123" class="colorgod">
      <option <?if($row[$id]['rating'] == 0){echo 'selected';}?> value="t1">0</option>      
     <option <?if($row[$id]['rating'] == 0.5){echo 'selected';}?> value="t2">0.5</option>
     <option <?if($row[$id]['rating'] == 1){echo 'selected';}?> value="t3">1</option>
     <option <?if($row[$id]['rating'] == 1.5){echo 'selected';}?> value="t4">1.5</option>
      <option <?if($row[$id]['rating'] == 2){echo 'selected';}?> value="t5">2</option> 
      <option <?if($row[$id]['rating'] == 2.5){echo 'selected';}?> value="t6">2.5</option> 
       <option <?if($row[$id]['rating'] == 3){echo 'selected';}?> value="t7">3</option> 
        <option <?if($row[$id]['rating'] == 3.5){echo 'selected';}?> value="t8">3.5</option> 
      <option <?if($row[$id]['rating'] == 4){echo 'selected';}?> value="t9">4</option>
       <option <?if($row[$id]['rating'] == 4.5){echo 'selected';}?> value="t10">4.5</option> 
        <option <?if($row[$id]['rating'] == 5){echo 'selected';}?> value="t11">5</option>     
      </select><br>
       <label for="colors" class="colorgod"><b>Особенности товара (Все возможные)</b></label><br>

    <div class="asgadg">
<?
foreach ($idfeche as $keyfe => $valuefe){
  $idf = $valuefe['idfeche'];
  $idfechef[]=$idf;
?>

<span id=""><?=$feche[$idf]['namefech']?><img src="/administrator/static/img/<?=$feche[$idf]['wayfech']?>"></span><input type="checkbox" name="<?=$feche[$idf]['namefech']?>" class="" checked>
<?}
foreach ($feche as $keyq => $valueq) {
  $idfechesgood[]=$valueq['id'];
}
if ($idfechef !== NULL) {
 $difffech = array_diff($idfechesgood,$idfechef);
 foreach ($difffech as $kbb => $vbb) {
  $namefech = $feche[$vbb]['namefech'];
?>
    <span id=""><?=$feche[$vbb]['namefech']?><img src="/administrator/static/img/<?=$feche[$vbb]['wayfech']?>"></span><input type="checkbox" name="<?=$feche[$vbb]['namefech']?>" class="" >
<?}}else{
  foreach ($feche as $keycc => $valuecc) {?>
    <span id=""><?=$feche[$keycc]['namefech']?><img src="/administrator/static/img/<?=$feche[$keycc]['wayfech']?>"></span><input type="checkbox" name="<?=$feche[$keycc]['namefech']?>" class="" >
  <?}}?>
</div><br>
<div>
 <input type="checkbox" name="public" id="public_chek"<?if($row[$id]['public']){echo 'checked';}?>><label for='public_chek'><b>Опубликовать</b></label>
</div><br>
<div>
  <a href="/?route=fechadd">Добавить Новую фичу</a>
  <a href="/?route=deletefech">Удалить фичу</a>
</div>
      <label for="video" class="jghfhfhdfjh"><b>Описание товара</label><br>
      <textarea type="text" name="description" placeholder="Описание товара.." class="colorgod11"><?=$row[$id]['description']?></textarea><br> 
      <input type="submit"  value="Редактировать" name='edit'>
      <input type="hidden" name="id_good_ob" value="<?=$id?>">
</form>
  </div>

</div>
</div>
			