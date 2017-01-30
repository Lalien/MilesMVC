<?php
	require "src/bootstrap.php";
	$uri = $_SERVER['REQUEST_URI'];
	$params = explode("/", $uri);
	$app = \Core\Application::start($_SERVER['REQUEST_METHOD'], $params);