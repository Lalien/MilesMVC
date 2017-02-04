<?php 
	namespace Core;
	class Route {
		protected $route = [];

		/**
		 * Finds the route and binds it to the controller
		 * @param $method string
		 * @param $url string
		 * @return void
		*/
		
		public function __construct($method, $url) {
			global $routes;
			if (isset($routes[$method])) {
				foreach($routes[$method] as $route) {
					$found_url = array_search($url, $route);
					if ($found_url !== false ) {
						$this->route = $route;
						return;
					}
				}
			}
			throw new \Exception("URL not found.");
		}
		
		/**
		 * Registers all GET request routes.
		 * @param $url string
		 * @param $callback string|function
		 * @return void
		*/

		public static function get($url, $callback) {
			global $routes;
			if (!isset($routes['GET'])) {
				$routes['GET'] = [];
			}
			array_push($routes['GET'], ['url' => $url, 'callback' => $callback]);
		}

		/**
		 * Registers all POST request routes.
		 * @param $url string
		 * @param $callback string|function
		 * @return void
		*/

		public static function post($url, $callback) {
			global $routes;
			if (!isset($routes['POST'])) {
				$routes['POST'] = [];
			}
			array_push($routes['POST'], ['url' => $url, 'callback' => $callback]);
		}
		
		/**
		 * Executes the callback or the controller
		 *  @return BaseController|CallbackHandler
		*/

		public function executeCallback() {
			if(is_callable($this->route['callback'])) {
				return new CallbackHandler($this->route['callback']);
			} else {
				return new BaseController($this->route['callback']);
			}
		}
	}