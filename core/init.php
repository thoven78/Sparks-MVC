<?php

	class Init {
		
		public function __construct() {
			
			$url = explode("/", trim($_SERVER['REQUEST_URI'], '/'));
			
			//Get controller Name
			$controller = !empty($url[0]) ? $url[0] . 'Controller' : 'IndexController';
			
			//Get method name of the controller specify in the url
			$method = !empty($url[1]) ? $url[1]  : 'index';
			
			//Get argument passed in to the method
			$arg = !empty($url[2]) ? $url[2] : NULL;
			
			//create an instance of a controller that  matches a given url 
			if (class_exists($controller)) {
				
				$controll = new $controller;
				$controll -> loadModel($url[0]);
				
				if (method_exists($controll, $arg)) {
					$controll -> $method(); 
				}
				
				elseif (method_exists($controll, $method)) {
					
					$controll -> $method($arg);
				}
				else {
					$this -> error();
				}
			}
			else {
				
				$this -> error();
			}
			
		}

		/**
		* If nothing was found then return 404
		*/
		function error() {
		
			require ROOT . '/app/controllers/errorController.php';
			$controller = new ErrorController();
			$controller -> index();
			return false;
		}
	} //End Init class