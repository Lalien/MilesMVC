<?php
	use \Core\Request as Request;
	use \Core\Route as Route;
	
	Route::get('hello', "asdf");

	Route::get('goodbye', function(Request $request) {
		echo "Hello!";
	});

	Route::post('goodbye', function() {
		echo "Hello!";
	});