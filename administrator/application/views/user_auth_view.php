<?include "menu.php";?>
<div class="body_center">
	<div id="main_g">
		<form method='POST' action="/admin/user/auth">
			Логин<br>
			<input type="text" name="userNameForm"><br>
			Пароль<br>
			<input type="password" name="passwd"><br>
			<input type="hidden" name="token" value="<?=$_SESSION['token']?>">
			<input type="submit" name="auth" value="Войти">
		</form>
		<a href="/admin/user/registr">Регистрация</a>
	</div>
</div>