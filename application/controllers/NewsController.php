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

			$art_id = $_GET['id'];
			$news_content_s = array_search('id', $news_content);
			dump($news_content_s);

			$this->view->render('News One Page', $vars = ['news_content' => $news_content]);
		}

		public function showAll()
		{
			$news_content = [
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

			$this->view->render('News All Page', $vars = ['news_content' => $news_content]);
		}
	}