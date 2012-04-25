<?php
	/**
	* Check to the login info if valid log them in
	*/
	class LoginController extends IndexController {
		
		public function index() {
		
			//Sets the current page title
			$title['title'] = "Log In";
			$this -> load -> view("login/index", $title);
		}
		
		/**
		* Call the login model to authenticate a user
		*/
		public function run() {
			
			$this -> model -> run();
		}
	}