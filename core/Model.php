<?php

	class Model {
		
		protected $database;
		
		public function __construct() {
			
			$config = array(
				
				"dbHost" => DB_HOST,
				"dbUser" => DB_USER,
				"dbPass" => DB_PASS,
				"dbName" => DB_NAME
			);
			
			$this -> database = new DbManager($config);
		}
		
		
	}