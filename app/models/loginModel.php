<?php
	
	class LoginModel extends Model {
		
		public function __construct() {
			
			parent::__construct();
		}
		
		/**
		* Fetch the user if the user exist set a session and let them in
		*/
		public function run() {
			
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			
			$user = $this -> database -> doQuery("SELECT `id`, `userName`, `role` FROM `users` WHERE `userName` ='{$username}' AND `password` ='{$password}'");
			//I don't know why the loadData() method is not working;
			$data = mysql_fetch_object($user);
			
			//See if there is a match
			$count = mysql_num_rows($user);
			
			//If there is a match let them in
			if ($count > 0) {
				
				//login
				Session::start();
				Session::set('role', $data -> role);
				Session::set('username', $data -> userName);
				header("Location: /dashboard");
			}
			else {
				header("Location: /login");
				die();
			}
		}
	} //End login class