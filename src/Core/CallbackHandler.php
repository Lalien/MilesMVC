<?php
	namespace Core;
	class CallbackHandler implements RouteHandler {
		public function __construct(\Closure $closure) {
			$this->closure = $closure;
		}
		
		public function initialize() {
			$this->closure->call($this, new Request);
		}
	}