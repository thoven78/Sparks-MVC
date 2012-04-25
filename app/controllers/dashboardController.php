<?php
	
	
	/**
	* this the dashboard where a user needs to authenticate to access the resource
	*/
	class DashboardController extends IndexController {
		
		public function __construct() {
			
			parent::__construct();
			Session::start();
			$loggedIn = Session::get('username');
			
			//if the user is not logged in they have no business here
			if (!$loggedIn) {
				Session::destroy();
				header("Location: /login");
				die();
			}
		}
		
		/**
		* load the index file when a user is logged in
		*/
		public function index() {
									
			$data = array(
				
				'title' => 'Dashboard',
				'users' => $this -> model -> getUsers()
			);
			
			$this -> load -> view("dashboard/index", $data); 
		}
		
		/**
		* adding data to the database using ajax
		*/
		public function ajaxAdd() {

			$this -> model -> ajaxAdd();
		}

    	/**
		* getting data from the database using ajax
		*/
		public function ajaxGet() {

			$this -> model -> ajaxGet();
		}

        /**
		* editing data from the database using ajax
		*/
		public function ajaxEdit($id) {
			//show the edit form
			echo "Edit action " . $id;
		}

		public function ajaxUpdate($id) {
			//saves the data
			echo "Update action " . $id;
		}

		public function ajaxDelete($id) {

			$this -> model-> ajaxDelete($id);
		}
		
		/**
		* Log out a user
		*/
		public function logOut() {
			
			Session::destroy();
			header("Location: /login");
		}
	}