<?php

class View
{
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
		include '/language.php';
		$language = $language[$lang];
		$cart = unserialize($_COOKIE['basket']);
		include '/web/application/views/'.$template_view;
	}
}
