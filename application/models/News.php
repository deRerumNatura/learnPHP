<?php 
	namespace application\models;
	use application\core\Model;

	class News extends Model 
	{
	    public $table = 'news';

		public function __construct()
		{
			parent::__construct();
		}

		public function getAllNews()
        {
            return $this->getAll($this->table, ['*']);
		}

        public function getOneNews($id)
        {
            return $this->getOne($this->table, $id);
        }

        public function insertRecord($columns = [], $values = [])
        {
            return $this->createRecord($this->table, $columns, $values);
        }

        public function insertImageRecord($column, $imageName, $id)
        {
            return $this->createImageRecord($this->table, $column, $imageName, $id);
        }

        public function updateNewsRecord($post)
        {
            return $this->updateRecord($this->table, $post);
        }

        public function deleteNewsRecord($post)
        {
            return $this->deleteRecord($this->table, $post);
        }

	} 