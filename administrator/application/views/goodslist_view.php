<?include "menu.php";?>

<link rel="stylesheet" type="text/css" href="/administrator/css/goodslist.css">
<div class="body_center">
	<div class="goods_list1">
		<div class="good_list1"><b>Код товара</b></div>
		<div class="good_list1"><b>Фото товара</b></div>
		<div class="good_list_name1"><b>Название</b></div>
		<div class="good_list1"><b>Цена</b></div>
		<div class="good_list_editing1"><b>Редактирование</b></div>
	</div>
	<?
foreach ($db as $key => $value){?>
		<div class="goods_list">
			<div class="good_list_code"><?=$value['id']?></div>
			<div class="good_list_img"><img src="/web/images/fotogoods/<?=$value['small_img'][0]['nameimg']?>"></div>
			<div class="good_list_name"><?=$value['name']?></div>
			<div class="good_list"><?=$value['price']?></div>
			<div class="good_list_editing"><a href="/admin/editgood&?id=<?=$value['id']?>">Редактировать</a></div>
		</div>
	<?}?>
</div>

