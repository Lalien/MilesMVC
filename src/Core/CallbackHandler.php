<?php
	namespace Core;
	class CallbackHandler implements RouteHandler {
		public function __construct(\Closure $closure, Array $parameters = []) {
			$this->closure = $closure;
			$this->parameters = $parameters;
		}

		public function initialize() {
			call_user_func_array($this->closure, $this->parameters);
		}
	}