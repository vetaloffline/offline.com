<!DOCTYPE html>
<html>
<head>
	<title>offline</title>
	<link rel="stylesheet" type="text/css" href="/web/css/style1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="/web/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="html_g">
		<header class="header_g">
			<div class="head_t">
				<div class="head_c1"></div>
				<div class="head_c2"></div>
				<div class="head_c3">
				<div>
					<a href="/multilanguage/ua"><img src="/web/images/ua.png" class="imglanguage"></a>
					<a href="/multilanguage/ru"><img src="/web/images/ru.png" class="imglanguage"></a>
					<a href="/multilanguage/en"><img src="/web/images/en.png" class="imglanguage"></a>
				</div>
					<div class="register">
						<div class="reg_le"></div><div id="uLogin" data-ulogin="display=small;theme=classic;fields=first_name,last_name,email;providers=facebook;redirect_uri=http%3A%2F%2Foffline.com/user/facebook;mobilebuttons=0;"></div>
						<div class="reg_r"><?
	if ($_SESSION['auth']) {?>
	<div class="">
		<div class="reg_m">
			<?;$name=$_SESSION['name'];
			echo "Здравствуй ". "<b>".$name."</b>";?>
		</div>
		<div class="reg_m">
			<?if($_SESSION['auth']){?>
			<a href="/user/profile">Профиль</a>
			<a href="/user/exit_user" class="a_exit">Выход</a>
			<?}?>
		</div>
	</div><?
	}else{
?>
<div class="">
	<form action="/user/auth" method="POST">
	<input type="hidden" name="token" value="<?=$_SESSION['token']?>">
		<div class="reg_m">
			<input type="text" name="userNameForm" required placeholder="Введите имя" class="form_reg"  pattern="([a-z-0-9]{1,}\.){0,}[a-z-0-9]{1,}@[a-z0-9-]{1,}(\.[a-z0-9-]+){0,}\.[a-z]{2,6}"><br />

		</div>
		
		<div class="reg_m">
			<input type="password" name="passwd" required placeholder="Введите пароль" class="form_reg" ><br />

		</div>

		<div class="reg_m">
			<input type="submit" value="Вход" name="auth">
			<input type="hidden" name="token" value="<?=$_SESSION['token']?>">
			<a href="/user/registr">Регистрация</a>

		</div>
		<script src="//ulogin.ru/js/ulogin.js"></script>

	
	</form>
</div>
<?}
?></div><br>
					</div>
					<div class="basket_h">
						<div class="bask1"></div>
						<div class="bask2">
							<a href="/basket" class="baska"><div class="baskkol"><?=$language['basket']?> 
							<?
							$arr=unserialize($_COOKIE['basket']);
						if(count($arr)!==0)
							{?>
								<div class="koltovfg"><?=count($arr)?></div>
							<?}
							else{
								echo $language['empty'];
								} ?></div></a>
								<br>
						</div>
					</div>
				</div>
			</div>
			<div class="head_b">
				<div class="head_menu_b">
					<a href="/"><div class="menu_head"><div class="menu_h_v"><?=$language['home']?></div></div></a>
					<a href="/katalog"><div class="menu_head"><div class="menu_h_v"><?=$language['catalog']?></div></div></a>
					<a href="/about"><div class="menu_head"><div class="menu_h_v"><?=$language['about']?></div></div></a>
					<a href="/contacts"><div class="menu_head"><div class="menu_h_v"><?=$language['contacts']?></div></div></a>
				</div>
			</div>
		</header>
		<div class="body_g">
			<?php include 'web/application/views/'.$content_view; ?>
			<div class="body_right"></div>
		</div>
		<div class="footer_g">
		</div>
	</div>
</body>
</html>

						
					
