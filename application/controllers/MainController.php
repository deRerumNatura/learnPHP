<?php 
	
	namespace application\controllers;
	use application\core\Controller;

	class MainController extends Controller
	{

		public function index() {
			$article = [
							['id' => 1, 
								'title' => 'First article title', 
								'content' => 'Content', 
								'date' => '08/01/18'
							],
							['id' => 2, 
								'title' => 'Second article title', 
								'content' => 'Content', 
								'date' => '04/01/18'
							],
							['id' => 3, 
								'title' => 'Third article title', 
								'content' => 'Content', 
								'date' => '02/01/18'
							],
						];
		// echo __METHOD__;
			$this->view->render('Home', $article);
		}
		public function adminnews() {
			$this->view->render('Admin Page');
		}
	}