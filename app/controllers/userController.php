<?php
	class UserController extends IndexController {
		
		public function __construct() {
			
			parent::__construct();
			Session::start();
			$logged = Session::get('username');
			$role	= Session::get('role');
			
			//if the user is not logged in they have no business here
			if (!$logged || $role != 'owner') {
				Session::destroy();
				header("Location: /login");
				die();
			}
		}
		
		public function index() {
			
			$data = array(
				'title' => "Users",
				'users' => $this -> model -> getUsers()
			);
			
			$this -> load -> view('users/index', $data);
		}
		
		public function create() {
			
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			$role	  = $_POST['role'];
			
			$this -> model -> createUser($username, $password, $role);
			header("Location: /user");
		}
		
		public function edit($id) {
			
			$data = array(
				'title' => 'Edit User',
				'users' => $this -> model -> editUser($id)
			);
			$this -> load -> view("users/edit", $data);
		}
		
		public function updateUser($id) {
		
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			$role	  = $_POST['role'];
			
			$this -> model -> updateUser($id, $username, $password, $role);
			header("Location: /user");
		}
		
		public function delete($id) {
			
			$this -> model -> deleteUser($id);
			header("Location: /user");
		}
	}