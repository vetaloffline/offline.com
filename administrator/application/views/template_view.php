<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>offlines</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/web/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/administrator/css/style_admin.css">
	<script type="text/javascript"></script>
</head>
<body>
	<div id="body_home">
		<div id="body_head">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="/">Выход</a>
					</div>
					<ul class="nav navbar-nav">
						<li><a href="/admin/orders">Список заказов</a></li>
						<li><a href="/admin/goodslist">Каталог</a></li>
						<li><a href="/admin/users">Настройки пользователей</a></li>
						<li><a href="/admin/goodadd">Добавить товар</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div id="body_body">
			<div id="center_body">
				<div class="container-fluid">
					<div class="row content">
						<div class="col-sm-3 sidenav">
							<ul class="nav nav-pills nav-stacked menu_navbar">
								<li class="li_menu_admin"><a href="/admin/goodslist">Каталог</a></li>
								<li class="li_menu_admin"><a href="/admin/goodadd">Добавить товар</a></li>
								<li class="li_menu_admin"><a href="/admin/orders">Список заказов</a></li>
								<li class="li_menu_admin"><a href="/admin/users">Пользователи</a></li>
							</ul><br>
						</div>
						<div class="col-sm-9">
							<?include 'administrator/application/views/'.$content_view;?>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</body>
</html>