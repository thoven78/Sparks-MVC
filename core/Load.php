<?php
	
	/**
	* Loads a file to be displayed in the user's web browser 
	*/
	class Load {
		public $data; 
		/**
		* Takes a filename and a variable or just a file then render it to the web browser
		*/
		public function view($fileName, $data = false, $noInclude = false) {
			
			//If $data is not null check to see if it is an array. 
			if ($data) {
				//If $data being parsed in is an array extract it 
				if (is_array($data)) {
				
					//if an array is parsed like so array("firstname" => "Stevenson", "lastname" => "Dorastin")
					//you would do this in the view echo $firstname . " " .$lastname;
					extract($data);
				}
				else {
					//If it's not an array do not extract it
					$this -> data = $data;
				}

			}			
			
			//If you parse in a third parameter in the view method that means you do not want to include the main header
			if ($noInclude) {
				
				//loads whatever file you want
				include_once("app/views/" . $fileName . ".php"); 
				
				//automatically loads the footer file so we don't have to keep on typing it
				include_once("app/views/includes/footer.php"); 

			}
			else {
				//automatically loads the header file so we don't have to keep on typing it
				include_once("app/views/includes/header.php"); 
				//loads whatever file you want
				include_once("app/views/" . $fileName . ".php"); 
				
				//automatically loads the footer file so we don't have to keep on typing it
				include_once("app/views/includes/footer.php"); 

			}
		}
	}