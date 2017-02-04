<?php
	use \Core\Request as Request;
	use \Core\Route as Route;
	
	Route::get('hello', "asdf");

	Route::get('goodbye', function(Request $request) {
		var_dump($request->getData());
	});

	Route::get('goodbye/{i}/miles', function() {
		echo "The root of the application!";
	});