<?php 

	namespace application\core;
	use \PDO;

	class Model extends PDO
    {
        public $pdo;


        public function __construct()
        {
            $dsn = "mysql:host=" . HOST . ";dbname=" . DB . ";charset=" . CHARSET;

            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($dsn, USER, PASS, $opt);
            $this->pdo = $pdo;
        }

        protected function createRecord($table, $columns = [], $values = [])
        {
            $sql = 'INSERT INTO ' . $table . '(' . implode(",", $columns) . ') VALUES  ( "' . implode('","', $values) . '")';
            $query = $this->pdo->prepare($sql);
            $query->execute();

            return $this->pdo->lastInsertId();
        }

        protected function createImageRecord($table, $column, $imageName, $id)
        {
            $sql = ' UPDATE ' . $table . ' SET ' . $column . ' = ' . ' " ' . $imageName . ' " ' . ' WHERE id = ' . $id;
            $query = $this->pdo->prepare($sql);
            return $query->execute();
        }

        protected function getAll($table, $columns = [])
        {
            $query = $this->pdo->query( 'SELECT '. implode(",", $columns) . ' FROM ' . $table );
            $result = $query->fetchAll();
            return $result;
        }

        public function getOne($table, $id)
        {
            $query = $this->pdo->prepare('SELECT * FROM ' . $table . ' WHERE id = ' . $id);
            $query->execute();
            $result = $query->fetch();
            return $result;
        }

        protected function updateRecord($table, $post)
        {
            $postString = [];

            foreach ( $post as $key => $value ) {
                if($key == 'id') {
                    continue;
                }
                $postString[] .=   $key . ' = "' . $value . '"';
            }
            $postString = implode(",", $postString);
            dump($post['id']);
            $sql = ' UPDATE ' . $table . ' SET ' . $postString . ' WHERE id = ' . $post['id']; // where id = post [id]
            $query = $this->pdo->prepare($sql);
            return $query->execute();
        }

        protected function deleteRecord($table, $post)
        {
            $sql = " DELETE FROM " . $table . " WHERE id =" . $post['id']; // where id = post [id]
            $query = $this->pdo->prepare($sql);
            return $query->execute();
        }
	}