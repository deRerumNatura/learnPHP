<?php 
	namespace application\models;
	use application\core\Model;

	class Users extends Model 
	{
		// public $users;
		public function __construct()
		{
			parent::__construct();
		}

		// public function checkUser($name, $password)
		// {
  //     $stmt = $this->pdo->prepare('SELECT id, name FROM users where name = ? and password = ? ');
  //     $stmt->execute( [$name,$password] );
  //     $user = $stmt->fetch();
  //     dump($user);
  //     return $user;
		// }
		// public function () {
		// 	return $connect;
		// }

	} 