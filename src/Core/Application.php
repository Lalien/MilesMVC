<?php 
	namespace Core;
	interface RouteHandler {
		public function initialize();
	}
	class Application {
		public static function start($method, $params) {
			$instance = new Route($method, $params[1]);
			$instance->executeCallback()->initialize();
		}
	}