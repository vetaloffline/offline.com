<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{
	protected $db;
	static function start($db)
	{
	
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';

		$uRi = $_SERVER['REQUEST_URI'];

		$query = "SELECT `real_rout`
				  FROM `routes` 
				  WHERE `alias_uri` = '$uRi'";
		$alias = $db->makeQuery($query)[0]['real_rout'];
		var_dump($uRi);
		if ($alias) {
			$uRi = $alias;
		}

;		$routes = explode('/', $uRi);
		$routes_modify = explode('&',$routes[1]);
		$idgood = explode('=', $routes_modify[1])[1];
		$_GET['id'] = $idgood;

		
		if ( !empty($routes_modify[0]))
		{
			$controller_name = $routes_modify[0];
		}
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}
		

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		
		// echo "Model: $model_name <br>";
		 //echo "Controller: $controller_name <br>";
		// echo "Action: $action_name <br>";
		

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "web/application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "web/application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "web/application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "web/application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controller_name($db);
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action($db);
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			 Route::ErrorPage404();
		}
	
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
