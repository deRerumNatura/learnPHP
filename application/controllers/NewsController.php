<?php 
	
	namespace application\controllers;
	use application\core\Controller;
	use application\core\Db;

	class NewsController extends Controller
	{

		public function show()
		{
			echo "i'm method show";
		}

		public function showOne()
		{
			$news_content = [
							['id' => 1, 
								'title' => 'First article title', 
								'content' => 'Content', 
								'date' => '08/01/18'
							],
							['id' => 2, 
								'title' => 'First article title', 
								'content' => 'Content', 
								'date' => '08/01/18'
							],
						];

			$this->view->render('News Page', $vars = ['news_content' => $news_content]);
		}
	}