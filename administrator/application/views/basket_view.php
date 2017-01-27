<link rel="stylesheet" type="text/css" href="/css/style_basket.css">
<?include "menu.php";?>
<div class="body_center">
<pre> </pre>
<div class="baskeet_glav">
</div>
<div class="basket_2">
	<a href="/index.php?route=katalog"><div class="img_close111"></div></a>
<div class="prod_bask_g">
<?
$unch=unserialize($_COOKIE['add']);
 if (count($unch)>=1) {
?>
<div id='korz_pok'><h2>Корзина покупок</h2></div>
<?
foreach ($unch as $k => $v){
$id=$k;
$idgood=$_GET['id'];
$good= $goods[$id];?>
<div class="product_basket">
	<div class="prod_bask">
		<div class="img_bask">
			
					<?
						$dbc = mysqli_connect("localhost",db,password,login);

						$querry = "SELECT `nameimg`
							 	FROM `goodimg` 
							 	WHERE good_id = '".$id."'
							 	AND descriptionimg = 'small_img'";

						$req = mysqli_query($dbc, $querry);
						$roq = mysqli_fetch_assoc($req);
						$img = $roq['nameimg'];
						mysqli_close($dbc);
						
					?>
		<img src="/images/<?=$img?>" class='img_baskw'>

		</div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane1"><b>Наименование товара</b></div>
		<div class="prod_nane1"><?=$good['name'];?></div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane3"><b>Цена</b></div>
		<div class="prod_nane3"><?=$good["price"];?>грн</div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane"><b>Количество</b></div>
		<div class="prod_nane">
			<div class="minus_b"><a href="/procces/basket/basketplmin.php?id=<?=$k?>">-</a></div>
			<form action="/procces/basket/basketInput.php">
				<div><input type="text" name="kolTov" value="<?=$v?>" class="inp_b" maxlength="6" pattern="\d+" ></div>
				<input type="hidden" name="id" value="<?=$k?>">
			</form>
			<div class="plus_b">
				<a href="/procces/basket/basketAdd.php?id=<?=$k?>">+</a>
			</div>
		</div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane2"><b>Сумма</b></div>
		<div class="prod_nane2"><?=$good["price"]*$v;?>грн</div>
	</div>
	<div class="prod_bask">
		<a href="/procces/basket/basketDel.php?idb=<?=$k?>" class="delltov">
		<div class="prod_nane4"></div>
		</a>
	</div>
	<?$allsum=$allsum+$good["price"]*$v;?>
</div>
<?}?>
<div class="allsum">Итого:<b><?=$allsum?></b>грн</div>
<div class="clear_basket_b">
	<a href="/procces//basket/basketClear.php" >
		<div class="floba"><b>Очистить корзину</b></div><div class="basketpde"></div>
	</a>
</div>
<a href="/index.php?route=oformzakaz" class="zakazoff">
	<div class="zakazo">
	
	</div>
</a>
<?}else{?>
<div class="basket_nuul"><b>Корзина пустая</b></div>
	<?}?>
</div>
</div> 
</div>
