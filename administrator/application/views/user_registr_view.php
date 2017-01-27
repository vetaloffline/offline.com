<?
include "menu.php";
?>
<div class="body_center">
	<pre> </pre>
	<div class="baskeet_glavvv">
	</div>
	<div class="basket_2vv">
		<a href="/"><div class="img_close111vv"></div></a>
		<div class="prod_bask_gvv">
			<h2>Регистрация</h2>
			<form action="/admin/user/registr" method="POST" enctype="multipart/form-data">
				Введите Email<br>
				<input type="text" name="email" pattern="([a-z-0-9]{1,}\.){0,}[a-z-0-9]{1,}@[a-z0-9-]{1,}(\.[a-z0-9-]+){0,}\.[a-z]{2,6}"><br>
				Введите пароль	<br>
				<input type="password" name="passworduser"><br>
				<input type="hidden" name="nameses" value="<?=$nameses?>"><p>
				<input type="hidden" name="token" value="<?=$_SESSION['token']?>">
				<input type="submit" name="registr" value="Зарегистрироваться">
			</form>
		</div>
	</div> 
</div>