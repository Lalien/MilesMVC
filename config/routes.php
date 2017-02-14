<?php
	use \Core\Route as Route;
	
	Route::get("hello/{id}", "Hello_Controller:index");

	Route::get('goodbye', function() {
		echo "Goodbye!";
	});
	
	Route::get('goodbye/{i}/miles', function($id) {
		echo "The root of the application!";
	});