<?php
	
	/**
	* Home page
	*/
	class IndexController {
		
		protected $load;
		
		public function __construct() {
			//So you could do $data -> model -> userInfo(); $this -> load -> view('dashboard', $data); @param is optional
			$this -> load = new Load(); 
		}
		
		public function index() {
		
			$title['title'] = "Home";
			
			$this -> load -> view('home/index', $title);
		}
		
		/**
		* Will auto load a model based on the current controller or current page http://localhost/login it will load the loginModel class also
		*/
		public function loadModel($name) {
			
			$modelPath = ROOT . "/app/models/" . $name . "Model.php";
		
			if (file_exists($modelPath )) {
				
				require($modelPath);
				
				$modelName = $name . "Model";
				
				$this -> model = new $modelName; //create an instance
			}
		}

	} //End the Index Controller