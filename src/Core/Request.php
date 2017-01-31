<?php 
	namespace Core;
	class Request {
		public function getMethod() {
			return $_SERVER['REQUEST_METHOD'];
		}
	}