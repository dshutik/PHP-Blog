<?php
header("Content-Type:text/html;charset=UTF8");

require_once("config.php");

function __autoload($c){
    if(file_exists("controllers/".$c.".php")){
        require_once("controllers/".$c.".php");
    }
    if(file_exists("models/".$c.".php")){
        require_once("models/".$c.".php");
    }
}

if($_GET['page']){
	$class = trim(strip_tags($_GET['page']));
}
else{
	$class = 'main';
}
	if(class_exists($class)) {

		$obj = new $class;
		$obj->get_body($class);
	}
	else{
		exit("<p>Данного класса не существует!</p>");
	}

?>