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
					  $idfec = NULL,
					  $imagesgood = NULL)
	{
		$lang = $_SESSION['language'];
		include '/web/'.$lang.'.php';
		include '/web/application/views/'.$template_view;
	}
}
