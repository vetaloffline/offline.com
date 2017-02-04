<?
include "menu.php";
?>
<div class="body_center">
<form action="/user/profile" method="POST">
	<div class="profileuser">
		<div class="form-group username">
		  <label for="usr">Имя</label>
		  <input type="text" class="form-control" id="usr" name="name" value="<?=$db['name']?>">
		</div>
		<div class="form-group username">
		  <label for="usr">Фамилия</label>
		  <input type="text" class="form-control" id="usr" name="surname" value="<?=$db['surname']?>">
		</div>
		<div class="form-group username">
		  <label for="usr">Отчество</label>
		  <input type="text" class="form-control" id="usr" name="patronymic" value="<?=$db['patronymic']?>">
		</div>
		<div class="form-group username">
		  <label for="usr">Номер телефона</label>
		  <input type="text" class="form-control" id="usr" name="phone" value="<?if ($db['phone'] != 0) {echo $db['phone'];}?>">
		</div>
		<?if (!$_SESSION['soc']) {?><a href="#" class="btn btn-warning submituser"> Изменить пароль </a><?}?>
		<div class="submituser">
		<?if (!$_SESSION['soc']) {?><input type="submit" name="auth" value="Редактировать профиль" class="btn btn-success"><?}?>
		</div><br>
		<div>
			<a href="/user/historyorder" class="username btn btn-default">История заказов</a>
		</div>
	</div>
</form>
</div>
