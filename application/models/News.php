<?php 
	namespace application\models;
	use application\core\Model;

	class News extends Model 
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getAllNews()
        {
            return $this->getAll('news', ['*']);
		}

        public function getOneNews($id)
        {
            return $this->getOne('news', $id);
        }

        public function insertRecord($columns = [], $values = [])
        {
            return $this->createRecord('news', $columns, $values);
        }

        public function updateNewsRecord($post)
        {
            return $this->updateRecord('news', $post);
        }

        public function deleteNewsRecord($post)
        {
            return $this->deleteRecord('news', $post);
        }

	} 