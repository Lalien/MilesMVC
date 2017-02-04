<?php
	require "src/bootstrap.php";
	$uri = $_SERVER['REQUEST_URI'];
	$app = \Core\Application::start($_SERVER['REQUEST_METHOD'], $uri);