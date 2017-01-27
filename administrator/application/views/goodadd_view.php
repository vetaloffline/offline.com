<link rel="stylesheet" type="text/css" href="/administrator/css/style_godadd.css">
<?include "menu.php";
$colors = $db;
$feches = $goods;
?>
<div class="body_center">
<pre> </pre>
<div class="aaasssddd"></div>
<div class="asdsafgcxer">

  <a href="/">
    <div class="img_close111"></div>
  </a>
  <div id='korz_pok'><h2>Добавление товара</h2></div>
  <div id="main_g123">
    <form action="/admin/goodadd/add" method="POST" enctype="multipart/form-data">
  <label for="video" class="formnazgod"><b>Название товара:</b><br></label>
  <input type="text" class="formnazgod" name="name123" placeholder="Название товара.." size=50px><br>
  <b>Alias</b><br>
  <input type="text" name="alias_good" placeholder="Путь к товару" class="formnazgod"><br>
 <label for="video" class="formnazgod"><b>Видеообзор</b></label> <br>   
 <input type="text" class="formnazgod" placeholder="Ссылка на видео.." name="mediaLinkVideo"><br>

  <label for="demo" class="formnazgod" ><b>Демонстрация товара</b></label>  <br>  
 <input type="text" class="colorgod" placeholder="Ссылка на видео.." name="demo"><br>

  <label for="stiker" class="formnazgod"><b>Стикер </b>    
   <select name="stiker1" class="colorgod">
     <option selected value="t1">- - - - - - -</option>      
     <option  value="t2">Суперцена</option>
     <option  value="t3">Топ продаж</option>
     <option  value="t4">Акция</option>   
      </select><br>

      <label for="photo" class="colorgod"><b>Главное Фото:</b></label>
      <input type="file" name="imgfoto1" class="colorgod"><br>

      <label for="photo" class="colorgod"><b>Фото товара 2:</b></label>
      <input type="file" name="imgfoto2" class="colorgod"><br>

      <label for="photo" class="colorgod"><b>Фото товара 3:</b></label>
      <input type="file" name="imgfoto3" class="colorgod"><br>

      <label for="photo" class="colorgod"><b>Фото товара 4:</b></label>
      <input type="file" name="imgfoto4" class="colorgod"><br>

       <label for="colors" class="colorgod"><b>Цвет товара (Все возможные)</b></label><br>
       <? foreach ($colors as $keyb => $valueb) {?>
          <span id="<?=$colors[$keyb]['namecolor']?>"><b><?=$colors[$keyb]['linkcolor']?></b></span><input type="checkbox" name="<?=$colors[$keyb]['namecolor']?>" class="colorgod" >
       <?}?>
<br>
      <label for="stiker33" class="colorgod"><b>Наличие  </b>   
   <select name="stiker22" class="colorgod">
     <option selected value="t11">В наличии</option>      
     <option value="t22">Заканчивается</option>    
      </select><br>

      <label for="video" class="colorgod"><b>Старая цена</b></label>
      <input type="text"  name="oldPrice"   pattern="\d+"  class="colorgod"><small> грн</small><br> 

       <label for="video" class="colorgod"><b>Цена товара</b></label>
       <input type="text"  name="Price"  pattern="\d+"  class="colorgod"><small>  грн</small><br>

       <label for="video" ><b>Рейтинг</b></label>

  <select name="raiting123" class="colorgod">
      <option selected value="t1">0</option>      
     <option value="t2">0.5</option>
     <option value="t3">1</option>
     <option value="t4">1.5</option>
      <option value="t5">2</option> 
      <option value="t6">2.5</option> 
       <option value="t7">3</option> 
        <option value="t8">3.5</option> 
      <option value="t9">4</option>
       <option value="t10">4.5</option> 
        <option value="t11">5</option>     
      </select><br>
       <label for="colors" class="colorgod"><b>Особенности товара (Все возможные)</b></label><br>
    <div class="asgadg">
    <? foreach ($feches as $keyi => $valuei) {?>
       <?=$valuei['namefech']?><input type="checkbox" name="<?=$valuei['namefech']?>" class="colors" >
 <img src="/administrator/static/img/<?=$valuei['wayfech']?>">
   <? } ?>
</div><br>
<div>
<div>
 <input type="checkbox" name="public" id="public_chek"><label for='public_chek'><b>Опубликовать</b></label>
</div><br>
  <a href="/?route=fechadd">Добавить Новую фичу</a>
  <a href="/?route=deletefech">Удалить фичу</a>
</div>
      <label for="video" class="jghfhfhdfjh"><b>Описание товара</label><br>
      <textarea type="text" name="description" placeholder="Описание товара.." class="colorgod11"></textarea><br> 
      <input type="submit" name="goodadd" value="Добавить товар">
</form>
</div>
</div>
</div>
			