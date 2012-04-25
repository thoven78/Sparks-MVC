<?php
	
	class DashboardModel extends Model {
		
		public function __construct() {
			
			parent::__construct();
		}
		
		public function ajaxAdd() {
			
			$todo = $_POST['todo'];
			
			$this -> database -> doQuery("INSERT INTO `todo` (`todos`) VALUES('{$todo}')");
			
			$data = array(
				'text'	=> $todo,
				'id'	=> mysql_insert_id()
			);
			
			echo json_encode($data);
		}
		
		public function ajaxGet() {
			
			$this -> database -> doQuery("Select * FROM `todo`");
			
			$data = $this -> database -> loadData();
			
			echo json_encode($data);
		}
		
		public function ajaxDelete($id) {
			
			$this -> database -> doQuery("DELETE FROM `todo` WHERE `ID` = " . $id);
			
			echo 'Success.';
		}
		
		public function getUsers() {
			
			$this -> database -> doQuery("SELECT `userName`, `date`, `role` FROM `users`");
			$users = $this -> database -> loadData();
			$aUser = "";
			foreach ($users as $key => $user) {
				
				$aUser .= "<tr><td>" . $user['userName'] . "</td><td>" . 
				date('M d, Y h : i A', strtotime($user['date'])) . "</td><td>" . $user['role'] . "</td></tr>";
			}
			
			return $aUser;
		}
	}