<?
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
<div class="body_add_good">
  <a href="/admin/goodslist">
    <div class="img_close111"></div>
  </a>
  <div id='korz_pok'><h2>Редактирование товара</h2></div>
  <div id="main_g">
    <form action="/admin/editgood/edit" method="POST" enctype="multipart/form-data">
      <div id="edit_good_list">
        <label  class="formnazgod"><b>Название товара:</b><br></label>
        <input type="text" class="form-control input_good_add_name" name="name_good" placeholder="Название товара.." size=50px value="<?=$row[$id]['name']?>"><br>
        <b>Alias</b><br>
        <input type="text" name="alias_good" placeholder="Путь к товару" class="form-control input_good_add_name" value="<?=$row[$id]['alias']?>"><br>

        <label  class="formnazgod"><b>Видеообзор</b></label> <br>   
        <input type="text" class="form-control input_good_add_name" placeholder="Ссылка на видео.." name="mediaLinkVideo" value="<?=$row[$id]['video']?>"><br>

        <label  class="formnazgod" ><b>Демонстрация товара</b></label>  <br>  
        <input type="text" class="form-control input_good_add_name" placeholder="Ссылка на видео.." name="demo" value="<?=$row[$id]['demo']?>"><br>

        <label for="stiker" class="formnazgod"><b>Стикер </b>    
         <select name="stiker1" class="form-control input_select_stick">
           <option  value="t1" <?if($row[$id]['sticker'] == ""){echo 'selected';}?>>- - - - - - -</option>      
           <option  value="t2" <?if($row[$id]['sticker'] == "superPrice"){echo 'selected';}?>>Суперцена</option>
           <option  value="t3" <?if($row[$id]['sticker'] == "topSales"){echo 'selected';}?>>Топ продаж</option>
           <option  value="t4" <?if($row[$id]['sticker'] == "stock"){echo 'selected';}?>>Акция</option>  
         </select><br>



         <?$avalibi=$row['availability'];?>
         <label for="stiker33" class="colorgod"><b>Наличие  </b>   
           <select name="stiker22" class="form-control input_select_stick">

             <option <?if($row[$id]['availability'] == 1){echo 'selected';}?> value="t11">В наличии</option>      
             <option <?if($row[$id]['availability'] == 0){echo 'selected';}?> value="t22">Заканчивается</option>
           </select><br>
             <label class="colorgod"><b>Цена товара</b></label>
           <input type="text"  name="Price"  pattern="\d+" value="<?=$row[$id]['price']?>"  class="form-control input_select_stick">
           <label  class="colorgod"><b>Старая цена</b></label>
           <input type="text"  name="oldPrice"   pattern="\d+"  class="form-control input_select_stick" value="<?if($row[$id]['oldprice'] > 0){echo $row[$id]['oldprice'];}?>"><br>
          

           <label  ><b>Рейтинг</b></label>

           <select name="raiting123" class="form-control input_select_stick">
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



          <div id="feck_block_edit">
          <label for="colors" class="colorgod"><b>Особенности товара (Все возможные)</b></label><br>
          <div class="">
            <?
            foreach ($idfeche as $keyfe => $valuefe){
              $idf = $valuefe['idfeche'];
              $idfechef[]=$idf;
              ?>
              <div class="fech_div">
              <div>
                  <label for="fech_<?=$feche[$idf]['wayfech']?>"><b><?=$feche[$idf]['namefech']?></b>
                  </label>
              </div>
              <label for="fech_<?=$feche[$idf]['wayfech']?>">
              <img src="/administrator/static/img/<?=$feche[$idf]['wayfech']?>">
              </label>
              <input type="checkbox" name="<?=$feche[$idf]['namefech']?>" class="checkbox_inpu_fech" checked id="fech_<?=$feche[$idf]['wayfech']?>">
              </div>

              <?}
              foreach ($feche as $keyq => $valueq) {
                $idfechesgood[]=$valueq['id'];
              }
              if ($idfechef !== NULL) {
               $difffech = array_diff($idfechesgood,$idfechef);
               foreach ($difffech as $kbb => $vbb) {
                $namefech = $feche[$vbb]['namefech'];
                ?>
                
                <div class="fech_div">
                <div>
                    <label for="fech_<?=$feche[$vbb]['wayfech']?>"><b><?=$namefech?></b>
                    </label>
                </div>
                <label for="fech_<?=$feche[$vbb]['wayfech']?>">
                <img src="/administrator/static/img/<?=$feche[$vbb]['wayfech']?>">
                </label>
                <input type="checkbox" name="<?=$namefech?>" class="checkbox_inpu_fech" id="fech_<?=$feche[$vbb]['wayfech'];?>">

                </div>
                <?}}else{
                  foreach ($feche as $keycc => $valuecc) {?>
                  
                  <div class="fech_div">
                  <div>
                   <label for="fech_<?=$valuei['wayfech']?>"><b><?=$feche[$keycc]['namefech']?></b></label>
                  </div>

                  <input type="checkbox" name="<?=$feche[$keycc]['namefech']?>" class="checkbox_inpu_fech" >

                  <label for="fech_<?=$valuei['wayfech']?>"><img src="/administrator/static/img/<?=$feche[$keycc]['wayfech']?>"></label>
                  </div>
                  <?}}?>
                </div><br>
                </div>
                <div>
                 <input type="checkbox" name="public" id="public_chek"<?if($row[$id]['public']){echo 'checked';}?>><label for='public_chek'><b><span id="public_checkbox">Опубликовать</b></span></label>
               </div>
               <div>
                  <!-- <a href="/?route=fechadd">Добавить Новую фичу</a>
                  <a href="/?route=deletefech">Удалить фичу</a> -->
                </div>
                <b><span id="public_checkbox">Описание товара</span><br>
                <div id="asdsad"><textarea type="text" name="description" placeholder="Описание товара.." class=" form-control"><?=$row[$id]['description']?></textarea></div><br> 
                <input type="submit"  value="Редактировать" name='edit' class="btn btn-primary">
                <input type="hidden" name="id_good_ob" value="<?=$id?>">
                 </div>
                  <div id="block_img_edit">
                <label for="photo" class="colorgod"><b>Главное Фото:</b></label><br>
                <img src="/web/images/fotogoods/<?=$goodmainimg?>"><br>
                <input type="file" name="imgfoto1" class="color_good colorgod btn btn-default"><br>

                <label for="photo" class="colorgod"><b>Фото 2:</b></label>
                <?if($goodaddimg1){?><img src="/web/images/fotogoods/<?=$goodaddimg1?>"><br>
                <a href="/admin/editgood/deleteimg/&?id=<?=$id?>&foto='additional_foto_1'">Удалить фото</a>
                <?}?>
                <input type="file" name="imgfoto2" class="color_good colorgod btn btn-default"><br>

                <label for="photo" class="colorgod"><b>Фото 3:</b></label>
                <?if($goodaddimg2){?><img src="/web/images/fotogoods/<?=$goodaddimg2?>"><br>
                <a href="/admin/editgood/deleteimg/&?id=<?=$id?>&foto='additional_foto_2'">Удалить фото</a>
                <?}?>
                <input type="file" name="imgfoto3" class="color_good colorgod btn btn-default"><br>

                <label for="photo" class="colorgod"><b>Фото 4:</b></label>
                <?if($goodaddimg3){?><img src="/web/images/fotogoods/<?=$goodaddimg3?>"><br>
                <a href="/admin/editgood/deleteimg/&?id=<?=$id?>&foto='additional_foto_3'">Удалить фото</a>
                <?}?>
                <input type="file" name="imgfoto4" class="color_good colorgod btn btn-default"><br>
              </div>
              <div id="colors_table_check">
               <label for="colors" class="colorgod"><b>Цвет товара (Все возможные)</b></label><br>
               <?
               foreach ($idcolors as $idi => $color) {
                $idcc = $color['idcolor'];
                $idcolorf[] = $idcc;
                ?>
               <div class="colors_forms"><input type="checkbox" name="<?=$colors[$idcc]['namecolor']?>" class="checkboxx check_colors_<?=$colors[$idcc]['namecolor']?>" id="color_<?=$colors[$idcc]['namecolor']?>" checked>
                 <label for="color_<?=$colors[$idcc]['namecolor']?>" id="<?=$colors[$idcc]['namecolor']?>"><b><?=$colors[$idcc]['linkcolor']?></b></label></div>
                <?}
                foreach ($colors as $keys => $values) {
                  $idcolorsd[]=$values['id'];} 
                if ($idcolorf !== NULL) {
                  $diff = array_diff($idcolorsd, $idcolorf);
                  foreach ($diff as $keya => $valuea) {
                    ?>
                  <div class="colors_forms"><input type="checkbox" name="<?=$colors[$valuea]['namecolor']?>" class="checkboxx check_colors_<?=$colors[$valuea]['namecolor']?>" id="color_<?=$colors[$valuea]['namecolor']?>" >
                   <label for="color_<?=$colors[$valuea]['namecolor']?>" id="<?=$colors[$valuea]['namecolor']?>"><b><?=$colors[$valuea]['linkcolor']?></b></label>
                  <?}}else{
                    foreach ($colors as $keyas => $array_colors) {
                      ?>
                    <div class="colors_forms">
                    <input type="checkbox" name="<?=$array_colors['namecolor']?>" class="checkboxx check_colors_<?=$array_colors['namecolor']?>" id="color_<?=$array_colors['namecolor']?>">
                     <label for="color_<?=$array_colors['namecolor']?>" id="<?=$array_colors['namecolor']?>"><b><?=$array_colors['linkcolor']?></b></label>
                    </div><? }}?>
                    <br>
                  </div>
                </form>
              </div>

            </div>

