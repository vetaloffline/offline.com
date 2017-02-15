<link rel="stylesheet" type="text/css" href="/web/css/style_basket.css">
<div class="body_center">
<pre> </pre>
<div class="baskeet_glav">
</div>
<div class="basket_2">
	<a href="/katalog"><div class="img_close111"></div></a>
<div class="prod_bask_g">
<?
$bask=unserialize($_COOKIE['basket']);
 if (count($bask)>=1) {
?>
<div id='korz_pok'><h2>Корзина покупок</h2></div>
<?
foreach ($bask as $k => $v){;?>
<div class="product_basket">
	<div class="prod_bask">
		<div class="img_bask">
		<img src="/web/images/fotogoods/<?=$goods[$k]?>" class='img_baskw'>

		</div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane1"><b>Наименование товара</b></div>
		<div class="prod_nane1"><?=$db[$k]['name'];?></div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane3"><b>Цена</b></div>
		<div class="prod_nane3"><?=$db[$k]["price"];?>грн</div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane"><b>Количество</b></div>
		<div class="prod_nane">
			<div class="minus_b"><a href="/basket/basketminus?id=<?=$k?>">-</a></div>
			<form action="/basket/basketinput">
				<div><input type="text" name="kolTov" value="<?=$v?>" class="inp_b" maxlength="6" pattern="\d+" ></div>
				<input type="hidden" name="id" value="<?=$k?>">
				
			</form>
			<div class="plus_b">
				<a href="/basket/basketAdd?id=<?=$k?>">+</a>
			</div>
		</div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane2"><b>Сумма</b></div>
		<div class="prod_nane2"><?=$db[$k]['price']*$v;?>грн</div>
	</div>
	<div class="prod_bask">
		<a href="/basket/basketdel?id=<?=$k?>" class="delltov">
		<div class="prod_nane4"></div>
		</a>
	</div>
	<?$allsum=$allsum+$db[$k]['price']*$v;?>
</div>
<?}?>
<div class="allsum">Итого:<b><?=$allsum?></b>грн</div>
<div class="clear_basket_b">
	<a href="/basket/clearbasket" >
		<div class="floba"><b>Очистить корзину</b></div><div class="basketpde"></div>
	</a>
</div>
<a href="/drawning" class="zakazoff">
	<div class="zakazo">
	
	</div>
</a>
<?}else{?>
<div class="basket_nuul"><b>Корзина пустая</b></div>
	<?}?>
</div>
</div> 
</div>
