<?php

class Controller_multilanguage extends Controller{

	function __construct($db){	
		$this->model = new Model_multilanguage($db);
		$this->view = new View();
	}
	
	function action_ua(){
		$this->model->language('ua');	
	}
	function action_ru(){
		$this->model->language('ru');	
	}
	function action_en(){
		$this->model->language('en');	
	}
}