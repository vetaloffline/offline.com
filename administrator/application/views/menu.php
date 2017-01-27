<div class="body_left">
	<div class="menu_g">
		<a href="/"><div class="menu_neg">Главная</div></a>
		<a href="/katalog"><div class="menu_neg">Каталог товаров</div></a>
		<a href="/about"><div class="menu_neg">О нас</div></a>
		<a href="/contacts"><div class="menu_neg">Контакты</div></a>
		<?if($_SESSION['role'] == '10' && $_SESSION['auth']){?><a href="/admin/goodadd"><div class="menu_neg">Добавить товар</div></a><?}?>
		<?$uri = $_SERVER['REQUEST_URI'];?>
		<?if($uri == "/katalog" || $route == 'goods_list'){?>
		<div class="menu_neg">
			<form action="">
				<select name="sel"  onchange="this.form.submit()">
					<option value="reting"  <?if($select == "reting"){echo 'selected';}?>		>По рейтингу</option>
					<option value="az"  	<?if($select == "az"){echo 'selected';}?> 		        >От А-я</option>
		  			<option value="za"  	<?if($select == "za"){echo 'selected';}?>   	   	    >От Я-а</option>
		  			<option value="maxmin"  <?if($select == "maxmin"){echo 'selected';}?> >От большего 10-1</option>
		  			<option value="minmax"  <?if($select == "minmax"){echo 'selected';}?>  >От меншего 1-10</option>
		  		<!-- 	<input type="submit" name=""> -->
				</select>
					<br>100-0<input type="radio" name="price" value="100_0" <?if($_GET['price'] == '100_0'){echo 'checked';}?>>
					0-100<input type="radio" name="price" value="0_100" <?if($_GET['price'] == '0_100'){echo 'checked';}?>>
					<input type="hidden" name="route" value="katalog" >
					<br>samsung<input type="checkbox" name="brand0" value="samsung" <?if($_GET['brand0'] == 'samsung'){echo 'checked';}?>>
					<br>apple<input type="checkbox" name="brand1" value="apple" <?if($_GET['brand1'] == 'apple'){echo 'checked';}?>>
					<br>nokia<input type="checkbox" name="brand2" value="nokia" <?if($_GET['brand2'] == 'nokia'){echo 'checked';}?>>
					<br><input type="submit" name="">
			</form>
		</div><?}?>
		<?if($_SESSION['role'] == '10' && $_SESSION['auth']){?><a href="/admin/goodslist"><div class="menu_neg">Список товаров</div></a><?}?>
	</div>
</div>