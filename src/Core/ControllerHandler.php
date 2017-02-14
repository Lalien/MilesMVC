<?php 
	namespace Core;
	class ControllerHandler implements RouteHandler {

		/**
		 * Parses and binds the controller string and parameters to the handler. 
		 * @param $controller_string string
		 * @param $param array
		 * @return void
		*/
		
		function __construct($controller_string, $params = []) {
			$controller_array = explode(":", $controller_string);
			$this->controller = "\\" . $controller_array[0];
			$this->method = $controller_array[1] ?: "index";
			$this->params = $params;
		}

		/**
		 * Instantiates the user's controller
		 * @return void
		*/

		public function initialize() {
			$method = $this->method;
			if (class_exists($this->controller)) {
				$userController = new $this->controller;
				if (method_exists($userController,$method)) {
					call_user_func_array(array($userController, $method), $this->params);
					return; 
				} else {
					echo "Method doesn't exist.";
				}
			}
		}
	}