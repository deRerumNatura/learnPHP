<?php 
	
	namespace application\core;
	use application\core\View;

	class Controller
	{
		public $route;
		public $url_params;
		public $post_vars;
		public $view;
		
		public function __construct($route, $url_params = [], $post_vars = []) {
			// dump($route);
			$this->route = $route;
			$this->url_params = $url_params;
			$this->post_vars = $post_vars;
			
			$this->view = new View($route);
		}
	}