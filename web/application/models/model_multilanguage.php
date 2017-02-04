<?
class Model_multilanguage extends Model{	
	
		function language($lang){
			$_SESSION['language'] = $lang;
			header("Location: /");
		}
	}

?>