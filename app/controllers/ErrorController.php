<?php

	class ErrorController extends IndexController {
		
		public function __construct() {
			
			parent::__construct();
		}
		
		public function index() {
		
			$title["title"] = "404";
			$this -> load -> view("404/index", $title);
		}
	}