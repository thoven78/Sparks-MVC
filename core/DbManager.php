<?php
	
	/*
		@desc: A database manager
		@auth: Stevenson Dorastin
		@email: stevensondorastinmusic@gmail.com
		@date: 01/06/2012
		@rev: 03/25/2012
		@ver: 0.4
		@license: Public domain
	*/
	
	class DbManager {
		private $dbHost;
		private $dbUser;
		private $dbPass;
		private $dbName;
		private $query; //return the mysql_query();
				
		/**
		*	Creates a new connection
		*/
		
		public function __construct(array $config) {
			
			$this -> dbHost = $config["dbHost"];
			$this -> dbUser = $config["dbUser"];
			$this -> dbPass = $config["dbPass"];
			$this -> dbName = $config["dbName"];
			$this -> connectDb();
		
		}
		
		/**
		*	Connects to the server and selects the database (table)
		*/
		
		public function connectDb() {
			
			mysql_connect($this -> dbHost, $this -> dbUser, $this -> dbPass) or die("<strong>Could not connect.</strong>" . mysql_error());
			
			mysql_select_db($this -> dbName) or die(mysql_error());
		}
		
		/**
		*	Query data from the table and escape malicious code (Escapes sql injection and protect from XSS).
		*	@return: data query.
		*/
		
		public function doQuery($sql) {
		
			$this -> sql = mysql_real_escape_string(htmlentities($sql)); //Escaping sql injection and protect from XSS
			$this -> query = mysql_query($sql) or die($sql . mysql_error());
			if (!$this -> query ) {
				echo "<strong>There is a problem with your sql Statement.</strong>";
			}
			return $this -> query;
		}
		
		/**
		*	Gets the results
		*	@param: str || int $field select a single field, or leave blank to select all 
		*	@return: mixed
		*/
		
		public function loadData($field = NULL) {
		
			if ($field == NULL) {
			
				$data = array(); 
				
				while ($row = mysql_fetch_assoc($this -> query)) {
					
					$data[] = $row; //Appends SQL data to the array if this method is called without any parameter
				}
			}
			else {
			
				$row = mysql_fetch_assoc($this -> query);
				$data = $row[$field]; //Select the specific row
			}
			
			return $data;
		}
		
		/**
		* Count how many rows are available from a mysql database
		* @return number of row from a mysql data base
		*/
		
		public function numRows($rows) {
			
			return mysql_num_rows($rows);
		}
		
		/**
		* Closes the connection
		*/
		public function __destruct() {
			
			mysql_close();
		}
	}
?>