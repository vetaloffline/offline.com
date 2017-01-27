<?php

class View
{
	
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/
	function generate($content_view, 
					  $template_view, 
					  $db = NULL,
					  $goods = NULL,
					  $colorg = NULL,
					  $fef = NULL,
					  $idcolor = NULL,
					  $idfec = NULL
					  )
	{
		
		/*
		if(is_array($data)) {
			
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		
		/*
		динамически подключаем общий шаблон (вид),
		внутри которого будет встраиваться вид
		для отображения контента конкретной страницы.
		*/
		
		include 'administrator/application/views/'.$template_view;
	}
}
