<?php
	
	class ContactController extends IndexController {
		
		public function index() {
		
			//Sets the current page title
			$title['title'] = "Contact";
			
			$this -> load -> view("contact/index", $title);
		}
	}
?>