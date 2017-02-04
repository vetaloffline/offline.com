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

		 if ($alias) {
		 	$uRi = $alias;
			var_dump($uRi);
			$explod= explode('/', $uRi);
			$explod2 = explode('?', $explod[1]);
			$routes[]= 0;
			$routes[]= $explod2[0];
			$idgood = explode('=', $explod2[1])[1];
			$_GET['id'] = $idgood;
		 }else{
		$routes = explode('/', $uRi);
		$routes_modify = explode('?',$routes[2]);
		$idgood = explode('=', $routes_modify[1]);
		$_GET['id'] = $idgood;
		}
		if ( !empty($routes[1]))
		{
			$controller_name = $routes[1];
		}
		// получаем имя экшена
		if ( !empty($routes_modify[0]) )
		{
			$action_name = $routes_modify[0];
		}
		//var_dump($uRi);
		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		if (!$_SESSION['auth'] && $controller_name == 'Controller_user') {
			Route::ErrorPage404();
		}
		
		//echo "Model: $model_name <br>";
		//echo "Controller: $controller_name <br>";
		//echo "Action: $action_name <br>";
		

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
			$controller->$action($db,$language);
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
