<?php
	/**
	* @desc this is the about us page
	*/
	class AboutController extends IndexController {
		
		public function index() {
		
			//Sets the current page title
			$title['title'] = "About";
			
			//loads the about page
			$this -> load -> view('about/index', $title); 
		}
		
		public function add($name) {
			
			echo "Hello form the about page with the add method and with argument " . $name;
		}
	}