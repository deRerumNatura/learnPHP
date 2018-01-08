<?php 
	
	namespace application\controllers;
	use application\core\Controller;

	class MainController extends Controller
	{

		public function index() {
			$article = [
				'<h1>this is 1 article</h1>',
				'<h1>this is 2 article</h1>',
				'<h1>this is 3 article</h1>'
			];
		// echo __METHOD__;
			$this->view->render('Main Page', $article);
		}
		public function admin() {
			$this->view->render('Admin Page');
		}
	}