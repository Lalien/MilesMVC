<?php
	function __autoload($class) {
		require $class . ".php";
	}

	// Loading core Utility Classes

	class_alias("\Core\Request", "Request");
	class_alias("\Core\BaseController", "BaseController");