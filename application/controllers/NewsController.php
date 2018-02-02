<?php 
	
	namespace application\controllers;
	use application\core\Controller;
	use application\models\News;

	class NewsController extends Controller
	{
		
		public function showOne()
		{
      $news = new News;
			$art_id = $_GET['id'];
			$news_content = $news->getOne($art_id);

      $this->view->render('News One Page', $news_content);

		}

		public function showAll()
		{
			$news = new News;
			$news_content = $news->getAllNews();
			// dump($news_content);
			$this->view->render('News All Page', $news_content);
		}
	}