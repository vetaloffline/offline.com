
<link rel="stylesheet" type="text/css" href="/web/css/oform.css">
<div class="body_center">
<pre></pre>
<div class="baskeet_glav">
</div>
	<div class="basket_2">
		<a href="/"><div class="img_close111"></div></a>
		<div class="prod_bask_g">
		<div id="nazvaoform"><b>Офoрмление заказа</b></div>
		<div id="bodyform">
			<form action="/drawning/processing" method="POST">
				<div class="formazakaza">
					<div><b>Выбирите способ доставки</b></div>
					<div class="formazakaza">
						<label for="nova">Нова почта</label>
						<input type="radio" name="delivery" value="NP" id="nova">
						<label for="ukrp">УкрПочта</label>
						<input type="radio" name="delivery" value="UP" id="ukrp">
						<label for="inta">Інтайм</label>
						<input type="radio" name="delivery" value="IP" id="inta">
					</div>
				</div>
				<div class="formazakaza">
					<div><b>Выбирите способ оплаты</b></div>
					<div class="formazakaza">
						<label for="nal" class="radioin">Наличными</label><input type="radio" name="payment" value="cash" id="nal" class="radioin">
						<label for="bank" class="radioin">На карту банка<input type="radio" name="payment" value="bank" id="bank" class="radioin">
						<label for="naloj" class="radioin">Наложеный платеж<input type="radio" name="payment" value="imposed" id="naloj">
					</div>
				</div>
				<div>
					<b>Выбирите область отправки</b>
				</div>	
				<div>
					<select name="regions" class="form-control">
						<?
						foreach ($goods as $key => $value) {?>
							<option><?=$value['name']?></option>
						<?}?>
					</select>
				</div>
				<div class="formazakaza">
					<div><b>Имя</b></div>
					<div><input type="text" name="name" value="<?=$db['name']?>" class="form-control inputof"></div>
				</div>
				<div class="formazakaza">
					<div><b>Фамилия</b></div>
					<div><input type="text" name="surname" value="<?=$db['surname']?>" class="form-control inputof"></div>
				</div>
				<div class="formazakaza">
					<div><b>Телефон</b></div>
					<div><input type="text" name="phone" value="<?=$db['phone']?>" class="form-control inputof"></div>
				</div>
				<div class="formazakaza">
					<div><b>Имейл</b></div>
					<div><input type="text" name="email" value="<?=$db['email']?>" class="form-control inputof"></div>
				</div>
				<div class="formazakaza">
					<input type="submit" name="auth" value="Оформить" class="btn btn-success">
				</div>
			</form>
		</div>
		</div>
	</div> 
</div>