<!DOCTYPE html>
<html>
<head>
	<title>offline</title>
	<link rel="stylesheet" type="text/css" href="/web/css/style1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/web/font-awesome/css/font-awesome.min.css">
	<script src="//ulogin.ru/js/ulogin.js"></script>
	<link rel="stylesheet" href="ui/jquery-ui.css">
	<script src="ui/jquery-ui.js"></script>
	<link rel="stylesheet" href="ui/jquery-ui.css">
</head>
<body>
	<div class="html_g">
		<header class="header_g">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="/">Offlines</a>
					</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="/katalog"><?=$language['catalog']?></a></li>
						<li class="dropdown">
							<a class="dropdown-toggle"  href="/about"><?=$language['about']?></a>
						</li>
						<li><a href="/contacts"><?=$language['contacts']?></a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=$language['language']?>
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/multilanguage/ua"><img src="/web/images/ua.png" class="imglanguage"> Українська</a></li>
									<li><a href="/multilanguage/ru"><img src="/web/images/ru.png" class="imglanguage"> Русский</a></li>
									<li><a href="/multilanguage/en"><img src="/web/images/en.png" class="imglanguage"> English</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="/basket">
									<span class="glyphicon glyphicon-shopping-cart"></span>
										<?if (count($cart) <= 0) {echo $language['empty_cart'];}else{echo count($cart);}?>
								</a>
							</li>
							<?if (!$_SESSION['auth']) {?>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=$language['authorization']?>
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="li_form_autorize">
												<div>
													<center>
														<span id="login_bar"><b><?=$language['authorization']?></b></span>
													</center>
												</div>
												<form action="/user/auth" method="POST">
													<input type="hidden" name="token" value="<?=$_SESSION['token']?>">
													<li class="form_login_bar">
														<input type="text" name="userNameForm" required placeholder="Введите Email"  pattern="([a-z-0-9]{1,}\.){0,}[a-z-0-9]{1,}@[a-z0-9-]{1,}(\.[a-z0-9-]+){0,}\.[a-z]{2,6}" class="form-control">
													</li>
													<li class="form_login_bar">
														<input type="password" class="form-control" name="passwd" required placeholder="Введите пароль">
													</li>
													<li class="form_login_bar">
														<input type="submit" name="auth" class="btn btn-primary" value='<?=$language['to_come_in']?>'>
													</li>
												</form>
												<span id="reg_form_bar"><a href="/user/registr"><?=$language['registration']?></a></span>
												<div>
													<span id="text_autoriz"><b><?=$language['Authorize_using']?></b></span>
													<div id="uLogin" data-ulogin="display=panel;theme=classic;fields=first_name,last_name,email;providers=facebook;redirect_uri=http%3A%2F%2Fofflines.com/user/facebook;mobilebuttons=0;">
													</div>
												</div>
											</div>
										</li>
									</ul>  
								</li><?}else{?>
								<?if ($_SESSION['role'] == 10 || $_SESSION['role'] == 30) {?>
									<li>
									<a href="/admin/orders">ADMIN</a>
								</li>
								<?}?>
								<li class="dropdown">
									<a class="dropdown-toggle"  href="/user/profile"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['name']?></a>
								</li>

								<li class="dropdown">
									<a class="dropdown-toggle sdasdasdasd"  href="/user/exit_user"><div id="img_exit_bar"></div></a>
								</li>
								<?}?>
							</ul>
						</div>
					</nav>

				</header>
				<div class="body_g">
					<?php include 'web/application/views/'.$content_view; ?>
				</div> 
				<div class="footer_g">
		</div>
	</div>
</body>
</html>
