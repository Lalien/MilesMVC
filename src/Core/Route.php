<?php 
	namespace Core;
	class Route {
		protected $route = [];
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
		 *  @return BaseController|void
		*/

		public function executeCallback() {
			if(is_callable($this->route['callback'])) {
				return $this->route['callback']();
			} else {
				return new BaseController($this->route['callback']);
			}
		}
	}

	Route::get('hello', "asdf");

	Route::get('goodbye', function() {
		echo "Hello!";
	});

	Route::post('goodbye', function() {
		echo "Hello!";
	});