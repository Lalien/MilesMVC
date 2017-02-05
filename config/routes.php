<?php
	use \Core\Request as Request;
	use \Core\Route as Route;
	
	Route::get('hello', "asdf");

	Route::get('goodbye', function() {
		echo "Goodbye!";
	});
	
	Route::get('goodbye/{i}/miles', function($id) {
		echo "The root of the application!";
	});