<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{
	
	static function start($db)
	{
	
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';

		$routes = explode('/', $_SERVER['REQUEST_URI']);

		$routes_modify = explode('?',$routes[2]);
		$id_product = $routes_modify;

		if ( !empty($routes_modify[0]))
		{
			$controller_name = $routes_modify[0];
		}
		// получаем имя экшена
		if ( !empty($routes[3]) )
		{
			$action_name = $routes[3];
		}
		//var_dump($_SESSION);
	
		if (!$_SESSION['auth'] && $controller_name != 'user' && $action_name != 'auth') {
			$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
       
			header('Location:'.$host.'admin/user/auth');
		 } 

		 if ($_SESSION['role'] == '30' && $_SESSION['auth'] && ($controller_name == 'order' || $controller_name == 'orders')) {
		 	
		 }else 
				if ($_SESSION['role'] =='10' && $_SESSION['auth']) {
		 				
		 			}else{
		 				Route::ErrorPage404();
		 			}
		
		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		
		// echo "Model: $model_name <br>";
		// echo "Controller: $controller_name <br>";
		// echo "Action: $action_name <br>";
		

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "administrator/application/models/".$model_file;
		if(file_exists($model_path))
		{
		
			include "administrator/application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "administrator/application/controllers/".$controller_file;

		if(file_exists($controller_path))
		{
		
			include "administrator/application/controllers/".$controller_file;
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
		$controller = new $controller_name($db,$goods);
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action($db,$goods);
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
