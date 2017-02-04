<?php 
	namespace Core;
	class Request {
		public function getMethod() {
			return strtoupper($_SERVER['REQUEST_METHOD']);
		}
		public function getData() {
			if ($this->getMethod() === "GET") {
				return $_GET;
			} else if ($this->getMethod() === "POST") {
				return $_POST;
			}
		}
	}