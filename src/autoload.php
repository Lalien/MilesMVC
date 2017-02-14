<?php
		
	function __autoload($class) {
		if (strpos($class, "_Controller") || strpos($class, "_Model")) {
			return; 
		}
		$class;
		require_once BASE_PATH.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR.$class . ".php";
	}

	getDirContents(BASE_PATH.DIRECTORY_SEPARATOR."app");

	function getDirContents($dir, &$results = array()){
	    $files = scandir($dir);
	    foreach($files as $key => $value){
	        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
	        if(!is_dir($path)) {
	            $results[] = $path;
	            if(preg_match("/\.(php)$/", $value)) {
	            	include $path;
	            }
	        } else if($value != "." && $value != "..") {
	            getDirContents($path, $results);
	            $results[] = $path;
	        }
	    }
	    return $results;
	}
	
	// Loading core Utility Classes
	class_alias("\Core\Request", "Request");
	class_alias("\Core\BaseController", "BaseController");	