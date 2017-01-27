
<link rel="stylesheet" type="text/css" href="css/style_p.css">
<div class="body_center">
	<div class="name_p_p"> 
		<div class="good_name">
			<span class="good_name_p">Мобильный телефон <?=$goods["name"]?></span>
		</div>
	</div>
	<div class="menu_top_p">
		<a href="#"><div class="menu_div_p"><div class="text_menu">Все о товаре</div></div></a>
		<a href="#"><div class="menu_div_p"><div class="text_menu">Характеристики</div></div></a>
		<a href="#"><div class="menu_div_p"><div class="text_menu">Обзор и Видео</div></div></a>
		<a href="#"><div class="menu_div_p"><div class="text_menu">Фото</div></div></a>
		<a href="#"><div class="menu_div_p"><div class="text_menu">Отзывы <?=$good["reviews"]?></div></div></a>
		<a href="#"><div class="menu_div_p"><div class="text_menu">Услуги</div></div></a>
		<a href="/katalog"><div class="menu_div_p"><div class="text_menu">Вернуться назад</div></div></a>
	</div>
	<div class="menu_cen_p">
		<div class="img_pro_b">
				<?
				 foreach ($fef as $key => $value) {
				 	var_dump($value);
				 	?>
					
						<div class="img_b_b">
							<div class="img_b_b1">
								<a href=""><img src="web/images/fotogoods/<?=$value['nameimg']?>"  class="sssaaasd"></a>
							</div>
						</div>
					<?}?>
		</div>
			<div class="img_pro_a">
					<div class="image_p">
						<div class="good_img">
							<img src="/images/<?=$goods['img']?>" class="img_a_g">
						</div>
					</div>
					<span class="<?=$goods["sticker"]?>"></span>
					<div class="predlog">
					<div class="grn100_g">
							<span class="grn100"><a href="#" class="grn101">Дарим 100грн на распаковку</a></span>
						</div>
							<div class="video1">
								<?if($goods["video"]){?>
								<a href="<?=$goods["video"]?>" class="video_a">Видеообзор</a>
								<?}?>
							</div>
							<div class="demovideo1">
								<?if($goods["demo"]){?>
								<a href="<?=$goods["demo"]?>" class="demo_a">Демонстрация товара</a>
								<?}?>
							</div>
					</div>
				<div class="idGood">
					<a href="/procces/basket/basketAdd.php?id=<?=$id?>" class="idGood1"></a>
				</div>
			</div>
			<div class="dopol">
				<div class="text_color">Цвет</div>
				<div class="colors_p">
				<? foreach ($colorg as $k => $v) 
				{?>
				<div class="white1">
					<a href="#" class="<?=$v['namecolor']?>"></a>
				</div>
				<?}?>
				</div>
				<div class="block12">
					<div class="oplata"></div>
					<div class="srav_ves12">
						<div class="verh_p">
							<div class="levo_p">
								<div>
									<a href="" class="love"></a>
								</div>
							</div>
							<div class="pravo_p">
								<div>
									<a href="" class="sravn"></a>
								</div>
							</div>
						</div>
						<div class="niz_p">
							<div class="levo_p">
								<div></div>
							</div>
							<div class="pravo_p">
								<div></div>
							</div>
						</div>
					</div>
				</div>
				<div class="opisanie_p">


				<div class="otz_opis">
					<div class="reiting">
						<div class="reiting1">
							<a hre="#" >
							<?
							if($goods["rating"]==0){echo "<a href='#otziv' class='reiting2'><img src='../static/img/r0.png'class='reiting2'></a>";}
							if($goods["rating"]==0.5){echo "<a href=''><img src='../static/img/r05.png'class='reiting2'></a>";}
							if($goods["rating"]==1){echo "<a href=''><img src='../static/img/r1.png'class='reiting2'></a>";}
							if($goods["rating"]==1.5){echo "<a href=''><img src='../static/img/r15.png'class='reiting2'></a>";}
							if($goods["rating"]==2){echo "<a href=''><img src='../static/img/r2.png'class='reiting2'></a>";}
							if($goods["rating"]==2.5){echo "<a href=''><img src='../static/img/r25.png'class='reiting2'></a>";}
							if($goods["rating"]==3){echo "<a href=''><img src='../static/img/r3.png'class='reiting2'></a>";}
							if($goods["rating"]==3.5){echo "<a href=''><img src='../static/img/r35.png'class='reiting2'></a>";}
							if($goods["rating"]==4){echo "<a href=''><img src='../static/img/r4.png'class='reiting2'></a>";}
							if($goods["rating"]==4.5){echo "<a href=''><img src='../static/img/r45.png'class='reiting2'></a>";}
							if($goods["rating"]==5){echo "<a href=''><img src='../static/img/r5.png' class='reiting2'></a>";}
							?>
							</a>
						</div>
						<div class="reviews">
							
							<?
							for($f=$good["reviews"][1];$f<=$good["reviews"][1];$f++)
								{
								$rest=$f%10;
								if(($f===0) || ($rest>=5 && $rest<=9) || ($f%100>=10 && $f%100<=20))
									{
									$okonch="ов";
									}else if($rest===1)
									{
									$okonch= "";
									}else{$okonch= "a";}
									}?>
									<a href="" class="reviews1"><?=$good["reviews"][1]." "."Отзыв".$okonch?> </a>
							
						</div> 
					</div>
					<div class="ima_dop"></div>
				</div>


				</div>
			</div>
	</div>
</div>
