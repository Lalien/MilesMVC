<?php 
	namespace Core;
	class Request {
		
		/**
		 * Gets the current HTTP method.
		 * @return string
		*/

		public static function getMethod() {
			return strtoupper($_SERVER['REQUEST_METHOD']);
		}
		public static function getData() {
			if ($this->getMethod() === "GET") {
				return $_GET;
			} else if ($this->getMethod() === "POST") {
				return $_POST;
			}
		}
	}