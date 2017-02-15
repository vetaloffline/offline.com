<link rel="stylesheet" type="text/css" href="/administrator/css/style_godadd.css">

<?
$colors = $db;
$feches = $goods;
?>
<div class="body_add_good">
  <div id='korz_pok'><h2>Добавление товара</h2></div>
  <div id="main_g">
    <form action="/admin/goodadd/add" method="POST" enctype="multipart/form-data">
      <div class="firsr_block_form">
        <div class="first_block_in_1">
          <label for="video" class=""><b>Название товара:</b></label><br>
          <input type="text" class="form-control input_good_add_name" name="name123" placeholder="Название товара.." size=50px><br>
          <b>Alias</b><br>
          <input type="text" name="alias_good" placeholder="Путь к товару" class="form-control input_good_add_name"><br>
          <label for="video" class=""><b>Видеообзор</b></label> <br>   
          <input type="text" class="form-control input_good_add_name" placeholder="Ссылка на видео.." name="mediaLinkVideo"><br>

          <label for="demo" class="" ><b>Демонстрация товара</b></label>  <br>  
          <input type="text" class="colorgod form-control input_good_add_name" placeholder="Ссылка на видео.." name="demo"><br>
        </div>
        <div class="first_block_in_2">
         <div>
          <label for="photo" class=""><b>Главное Фото:</b></label>
          <input type="file" name="imgfoto1" class="colorgod btn btn-default" id="upload">
        </div>
        <div>
         <label for="photo" class="input_img_admin"><b>Фото 2:</b></label>
         <input type="file" name="imgfoto2" class="color_good colorgod btn btn-default">
       </div>
       <div>
         <label for="photo" class="input_img_admin"><b>Фото 3:</b></label>
         <input type="file" name="imgfoto3" class="colorgod btn btn-default">
       </div>
       <div>
         <label for="photo" class="input_img_admin"><b>Фото 4:</b></label>
         <input type="file" name="imgfoto4" class="colorgod btn btn-default"><br>
       </div>
     </div>
   </div>
   <div class="second_block_form">
     <div class="second_block_in_1">
       <label for="stiker" class=""><b>Стикер</b>    
         <select name="stiker1" class="form-control input_select_stick">
           <option selected value="t1">- - - - - - -</option>      
           <option  value="t2">Суперцена</option>
           <option  value="t3">Топ продаж</option>
           <option  value="t4">Акция</option>   
         </select><br>
         <label for="stiker33" class=""><b>Наличие  </b>   
           <select name="stiker22" class="form-control input_select_stick">
             <option selected value="t11">В наличии</option>      
             <option value="t22">Заканчивается</option>    
           </select><br>
           <label for="video" class="colorgod"><b>Цена товара</b></label>
           <input type="text"  name="Price"  pattern="\d+"  class="colorgod form-control input_select_stick">
           <label for="video" class="colorgod"><b>Старая цена</b></label>
           <input type="text"  name="oldPrice"   pattern="\d+"  class="colorgod form-control input_select_stick">
           </div>
           <div class="second_block_in_2">
             <label for="" class=""><b>Цвет товара (Все возможные)</b></label><br>
             <? foreach ($colors as $keyb => $valueb) {
              ?>
             <div class="colors_forms">
             <input type="checkbox" name="<?=$colors[$keyb]['namecolor']?>" class="checkboxx check_colors_<?=$colors[$keyb]['namecolor']?>" id="color_<?=$colors[$keyb]['namecolor']?>">
             <label for="color_<?=$colors[$keyb]['namecolor']?>" id="<?=$colors[$keyb]['namecolor']?>"><b><?=$colors[$keyb]['linkcolor']?></b></label></div>
             <?}?>
           </div>
         </div>
         <label for="video" ><b>Рейтинг</b></label>
         <select name="raiting123" class="form-control input_select_stick">
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
        <label for="" class="">
          <b>Особенности товара (Все возможные)</b>
        </label><br>
        <div class="fech_block_main">
          <? foreach ($feches as $keyi => $valuei) {?>
          <div class="fech_div">
            <div>
          <label for="fech_<?=$valuei['wayfech']?>"><b><?=$valuei['namefech']?></b></label>
          </div>
              <input type="checkbox" name="<?=$valuei['namefech']?>" class="checkbox_inpu_fech" id="fech_<?=$valuei['wayfech']?>">
          <label for="fech_<?=$valuei['wayfech']?>">
              <img src="/administrator/static/img/<?=$valuei['wayfech']?>">
          </label>
          </div>
          <?}?>
        </div>
        <br>
        <div>
          <div>
           <input type="checkbox" name="public" id="public_chek"><label for='public_chek'><b><span id="public_checkbox">Опубликовать</span></b></label>
         </div><br>
        <!--  <a href="/?route=fechadd">Добавить Новую фичу</a>
         <a href="/?route=deletefech">Удалить фичу</a> -->
       </div>
       <label for="" class=""><b><span id="public_checkbox">Описание товара</span></label><br>
       <textarea type="text" name="description" placeholder="Описание товара.." class="colorgod11 form-control"></textarea><br> 
       <input type="submit" name="goodadd" value="Добавить товар" class="btn btn-primary">
     </form>
   </div>
 </div>

			