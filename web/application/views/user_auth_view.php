
<div class="body_center">
	<div id="main_g">
	<div id="auth_user">
	<div id="auth_name_user"><h2><center><?=$language['authorization']?></center></h2></div>
	<div id="form_auth">
		<form method='POST' action="/user/auth">
			Логин<br>
			<input type="text" name="userNameForm" class="form-control"><br>
			Пароль<br>
			<input type="password" name="passwd" class="form-control"><br>
			<input type="hidden" name="token" value="<?=$_SESSION['token']?>">
			<input type="submit" name="auth" value="Войти" class="btn btn-info" id="submit_ayth_user">
		</form>
		<a href="/user/registr" id="registr_auth_user"><?=$language['registration']?></a>
		</div>
		</div>
	</div>
</div>