<?php

	class UserModel extends Model {
		
		public function __construct() {
			
			parent::__construct();
		}
		
		/**
		* @desc a default user info
		*/
		public function userInfo() {
			
			return array(
				
				"firstname" => "Stevenson",
				"lastname"  => "Dorastin",
				"title"		=> "Dashboard"
			);
		}
		
		/**
		* display the users info
		*/
		public function getUsers() {
			
			$this -> database -> doQuery("SELECT `ID`, `userName`, `date`, `role` FROM `users` WHERE `role` != 'owner'");
			$users = $this -> database -> loadData();
			$aUser = "";
			foreach ($users as $key => $user) {
				
				$aUser .= '<tr><td>' . $user['userName'] . '</td><td>' . 
				date('M d, Y h : i A', strtotime($user['date'])) . '</td><td>' . $user['role'] . 
				'</td><td><a href="/user/edit/' . $user['ID']  . '">Edit</a> <a href="/user/delete/' 
				 . $user['ID'] . '"' . "onclick=\"return confirm('Are you sure you want to delete it?');\">Delete</a></td></tr>";
			}
			
			return $aUser;
		}
		
		/**
		* Create a new user
		*/
		public function createUser($username, $pass, $role) {
			
			$success = $this -> database -> doQuery("INSERT INTO `users` (`userName`, `password`, `date`, `role`) VALUES('{$username}', '{$password}', NOW(), '{$role}')");
			
			if ($success) {
				return "Success";
			}
			else {
				return "failed";
			}
		}
		
		
		/**
		* Edit a user
		*/
		public function editUser($id) {
			
			$user = $this -> database -> doQuery("SELECT `ID`, `userName`, `role` FROM `users` WHERE `ID` = {$id}");
			
			return mysql_fetch_row($user);
		}
		
		/**
		* Saves the updated data back to the db
		*/
		public function updateUser($id, $username, $password, $role) {
			
			$success = $this -> database -> doQuery("UPDATE `users` SET `userName` = '{$username}', `password` = '{$password}', `date` = NOW(), `role` = '{$role}' WHERE `ID` =" . (int) $id);
			
			if ($success) {
				return "Success";
			}
			else {
				return "failed";
			}

		}
		
		
		/**
		* Delete a user
		*/
		public function deleteUser($id) {
			
			$this -> database -> doQuery("DELETE FROM `users` WHERE `ID` = " . (int) $id);
		}
	}