<?php
	namespace Core;
	use \Core\Request as Request;
	class BaseController implements RouteHandler {

		/**
		 * Parses the controller string
		 * @param $controller string
		 * @param $params array
		 * @return void
		*/

		public function __construct($controller, $params) {
			
		}

		/**
		 * Starts the controller.
		 * 
		 *
		*/
		public function initialize() {

		}
	}