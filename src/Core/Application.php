<?php 
	namespace Core;
	interface RouteHandler {
		public function initialize();
	}
	class Application {
		public static function start($method, $uri) {
			$instance = new Route($method, $uri);
			$instance->executeCallback()->initialize();
		}
	}