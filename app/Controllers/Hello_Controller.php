<?php 
	use \Core\BaseController as BaseController;
	class Hello_Controller extends BaseController {
		public function index($id) {
			echo $id;
		}
	}