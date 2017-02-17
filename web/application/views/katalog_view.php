<div class="body_catalog">
<?include "menu.php";
if ($goods) {

foreach ($goods as $key => $good) {

	 ?>
	<div class="good">
		<div class="good_left">
			<div class="video">
				<?if($good["video"]){?>
				<a href="<?=$good["video"]?>" class="video_a">Видеообзор</a>
				<?}?>
			</div>
			<div class="demovideo">
				<?if($good["demo"]){?>
				<a href="<?=$good["demo"]?>" class="demo_a">Демонстрация товара</a>
				<?}?>
			</div>
		</div>
		<div class="good_right">
			<div class="good_t">
				<span class="<?=$good["sticker"]?>"></span>
				<div class="img_url_katalog">
					<a href="<?=$good['alias']?>" alt="<?=$good['img']?>" title="<?=$good['imgGood'][3]?>">
						<img src="web/images/fotogoods/<?=$imagesgood[$key]['nameimg']?>">
					</a>
				</div>
				<div class="good_right_r">
					<?	
						foreach ($idcolor as $ka => $vs) 
							{
							if ($vs['idgood'] == $key) 
								{$vac = $vs['idcolor'];?>
								<div class="white1">
									<a href="?route=product&id=<?=$key?>" class="<?=$colorg[$vac]['namecolor']?>"></a>
								</div>
						<?}}?>			
				</div>
			</div>
			<div class="good_b">
				<div class="good_name">
					<a href="?route=product&id=<?=$key?>" class="good_na"><?=$good["name"]?></a>
				</div>
				<?if($good["availability"] == 0){?>
				<div class="endingGood1">
					<span class="endingGood2"><b>Заканчивается</b></span>
				</div><?}?>
				<?if($good["oldprice"]){?>
				<div class="oldPrice1">
					<b><span class="oldPrice2"><?=$good["oldprice"]?></span></b><span class="grn"><small> грн</small></span>
				</div>
				<?}?>
				<div class="ss123">
					<div class="price">
						<b><span class="price1"><?=$good["price"]?></span></b><span class="grn"><small> грн</small></span>
					</div>
					<div class="reiting">
						<div class="reiting1">
							<a hre="#" >
							<?
							if($good["rating"]==0){echo "<a href='#otziv' class='reiting2'><img src='web/static/img/r0.png'class='reiting2'></a>";}
							if($good["rating"]==0.5){echo "<a href=''><img src='web/static/img/r05.png'class='reiting2'></a>";}
							if($good["rating"]==1){echo "<a href=''><img src='web/static/img/r1.png'class='reiting2'></a>";}
							if($good["rating"]==1.5){echo "<a href=''><img src='web/static/img/r15.png'class='reiting2'></a>";}
							if($good["rating"]==2){echo "<a href=''><img src='web/static/img/r2.png'class='reiting2'></a>";}
							if($good["rating"]==2.5){echo "<a href=''><img src='web/static/img/r25.png'class='reiting2'></a>";}
							if($good["rating"]==3){echo "<a href=''><img src='web/static/img/r3.png'class='reiting2'></a>";}
							if($good["rating"]==3.5){echo "<a href=''><img src='web/static/img/r35.png'class='reiting2'></a>";}
							if($good["rating"]==4){echo "<a href=''><img src='web/static/img/r4.png'class='reiting2'></a>";}
							if($good["rating"]==4.5){echo "<a href=''><img src='web/static/img/r45.png'class='reiting2'></a>";}
							if($good["rating"]==5){echo "<a href=''><img src='web/static/img/r5.png' class='reiting2'></a>";}
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
				</div>
				<div class="">
					<div class="idGood">
						<a href="/basket/basketadd?id=<?=$key?>"><div class="button_buy_goods"></div></a>
					</div>
				</div>
				<div class="features">
					<?
						foreach ($idfec as $kas => $vss) {
							if ($vss['idgood'] == $key) {
								$idfeche = $vss['idfeche'];?>
								<span class="features1"><img src="web/static/img/<?=$fef[$idfeche]['wayfech']?>"></span>
							<?}
						}?>
				</div>
				<div class="description123" >
					<span class="description1"><?=$good["description"]?></span>
				</div>
			</div>
		</div>
	</div>
<?}}?>
</div>
