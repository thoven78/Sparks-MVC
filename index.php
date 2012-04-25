<?php
	//Application path
	define('ROOT', dirname(realpath(__FILE__))); 
	
	require_once(ROOT . '/core/init.php');
	//This is where you need to change your Database stuff
	require_once(ROOT . '/config/application.php');
	
	$app = new Init();
	//Auto load files
	function __autoload($class) {
		$file;
		if (file_exists(ROOT . "/core/" . $class . ".php")) {
			
			$file = ROOT . "/core/" . $class . ".php";
		}
		
		if (file_exists(ROOT . "/app/controllers/" . $class . ".php")) {
			
			$file = ROOT . "/app/controllers/" . $class . ".php";
		}
		
		if (file_exists(ROOT . "/app/models/" . $class . ".php")) {
			
			$file = ROOT . "/app/models/" . $class . ".php";
		}
		
		//Search for the files being requested from the url
		if (isset($file)) {
		
			if(!file_exists($file)) {
			
				$app -> error();
			}
			else {
				require_once($file);
				unset($file);
			}
	
			if (!class_exists($class, FALSE)) {
			
				$app -> error();
				return false;
			} 
		}
	}