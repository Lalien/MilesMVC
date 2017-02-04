<?php 
	namespace Core;
	class Route {
		protected $route = [];
		protected $params = [];
		/**
		 * Finds the route and binds it to the controller
		 * @param $method string
		 * @param $url string
		 * @return void
		*/

		public function __construct($method, $url) {
			global $routes;
			$this->params = $url;
			if (isset($routes[$method])) {
				foreach($routes[$method] as $route) {
					if ($this->findURL($route['url'], $url)) {
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
				return new BaseController($this->route['callback'], $this->params);
			}
		}

		/**
		 * Validates the URL structure and assigns the parameters.
		 * @param $route string
		 * @return boolean
		*/

		protected function findURL($route, $url) {
			$route_segments = explode("/",$route);
			$params = explode("/", substr($url,1));
			// Checks to see if the defined route and the current route have the same number of parameters. 
			if (sizeof($params) != sizeof($route_segments)) {
				return false;
			}
			// Loops through each URL parameter.
			foreach($params as $param) {
				$current_route_segment = array_shift($route_segments);
				// Checks to see if the defined route has a wildcard parameter.
				if (preg_match_all("/{(.*?)}/", @$current_route_segment, $matches)) {
					if (sizeof($matches[1]) != 1) {
						throw new Exception("Please check the URL structure.");
						return false;
					}
					continue;
				}
				// If it doesn't, then see if there is a hardcoded parameter.
				if ($param != @$current_route_segment) {
					return false;
				}
			}
			return true;
		}
	}