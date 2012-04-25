<?php
	
	class Session {
	
		/*
			To start a session you require the file 
			then you do Session::start();
			
			To set a session Session::set('name', 'Stevenson');
			
			To set a multidimension session
			Session::set(
				'username' => 'Stevenson',
				'ID'       => 98202
			);
			
			or 
			Session::set(
				'username', array(
					'username' => 'Stevenson',
					'Phone'    => 911
				)
			);
			
			Some examples
			Session::start();
			Session::set('Luis', 'Marco');
			
			Session::set(
				'username', array(
				'username' => 'Stevenson',
				'Phone'    => 911
				)
			);
			Session::set('name', 'Stevenson');
			Session::destroy();
			echo Session::get('name');
			echo Session::get('username', 'username');
			Session::display();
		*/
	
		
		private static $_sessionStarted = false;
		
		/**
		* starts a session
		*/
		public static function start() {
			
			if (!self::$_sessionStarted) {
				session_start();
				self::$_sessionStarted = true;
			}
		}
		
		/**
		* $_SESSION[$key] = $value;
		*/
		public static function set($key, $value) {
			
			$_SESSION[$key] = $value;
		}
		
		/**
		* returns the $_SESSION[$key] = $value
		*/
		public static function get($key, $secondKey = false) {
			
			if ($secondKey) {
				if (isset($_SESSION[$key][$secondKey])) {
					return $_SESSION[$key][$secondKey];
				}
			}
			else {
				if (isset($_SESSION[$key])) {
					return $_SESSION[$key];
				}	
			}
			echo "The session <strong>" . $key . "</strong> Was not set.";
		}
				
		/**
		* destroys all active sessions
		*/
		public static function destroy() {
			
			if (self::$_sessionStarted) {
				session_unset();
				session_destroy();
			}
		}
		
		/**
		* unset a session
		*/
		public static function deleteAssesion($key) {
			
			if (isset($_SESSION[$key])) {
			
				unset($_SESSION[$key]);
			}				}
		}
	}