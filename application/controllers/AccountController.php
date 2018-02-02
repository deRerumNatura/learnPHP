<?php 
namespace application\controllers;
use application\core\Controller;
use application\models\Users;
use \PDO;

	/**
	* 
	*/
	class AccountController extends Controller
	{
		public $user_id;
		public $login;
		public $pass;
		public $errors = [];

		public function register() {
				// dump($_POST);
			if($this->getPostData($_POST)) {
				// dump('post exist');
				$validate = $this->validate();
				// dump($validate);
				if($validate) {
					$exist = $this->checkUserExist();
					// dump($exist);
					if(!$exist) {
						// dump('user is not exist');
						$this->addUser();

						header("location: /");
					}
					else {
						$this->errors[] = $exist;
						// dump($errors);
					}
				}
				else {
					// echo 'no validate';
					$this->errors[] = $validate;
				}
			}
			// dump('outside');
			// dump('errors array: '.$this->errors);
			$this->view->render('Register Page', ['auth_errors' => $this->errors]);
		}

		private function validate() {
			// echo 'sdsd';
			if(!preg_match("/^[a-zA-Z0-9]+$/",$this->login)) {
				$this->errors[] = "Логин может состоять только из букв английского алфавита и цифр";
				// dump($this->login);
				// dump($errors);
				// return false; // називать не так, в случае не прохождения валидации
			}

			if(!preg_match("/^[a-zA-Z0-9]+$/",$this->pass)) {
				$this->errors[] = "Пароль может состоять только из букв английского алфавита и цифр";

			}

			if(strlen($_POST['login']) < 3 or strlen($this->login) > 30) {
				$this->errors[] = "Логин должен быть не меньше 3-х символов и не больше 30";
			}

			if(strlen($_POST['pass']) < 3 or strlen($this->pass) > 30) {
				$this->errors[] = "Пароль должен быть не меньше 3-х символов и не больше 30";
			}
			if(!empty($this->errors)) {
				return false;
			}
			return true;
		}

		private function addUser() {
			// echo 'add user';
			$users = new Users();

			$insertQuery = $users->pdo->prepare("INSERT INTO users (user_login, user_password) VALUES (?,?)");
			$insertQuery->execute([$this->login, $this->pass]);

			$_SESSION['login'] = $this->login;
		}

		private function checkUserExist() {
			$users = new Users();
			$this->pass = md5(md5(trim($this->pass)));

			$query = $users->pdo->prepare('SELECT COUNT(user_id) AS amount FROM users WHERE user_login = ? AND user_password = ?');
			$query->execute([$this->login, $this->pass]);
			$result = $query->fetch();

			// dump($result);

			if($result['amount'] == 1) {
				$this->errors[] = "user has been exist already";
				// return $this->errors;
				return true;
			}
			return false; 
		}

		private function getPostData($post) {
				// dump($post);
			if( isset($post['login']) && isset($post['pass'] ) && 
				!empty($post['login']) && !empty($post['pass'])) {

				$this->login = $post['login'];
				$this->pass = $post['pass'];

			return true;
		}
			// echo "string";
		return false;
	}

	public function login() {
		// dump($_SESSION);
				// dump('post exist');
		if($this->getPostData($_POST)) {
			$validate = $this->validate();
				// dump($validate);
			if($validate) {
				// $this->pass = md5(md5(trim($post['pass'])));
				$exist = $this->checkUserExist();
					// dump($exist);
				if($exist) {
						// dump('user is not exist');
					$this->errors = 0;
					$_SESSION['login'] = $this->login;
					header("location: /");
				}
				else {
				
					$this->errors[] = "User not found. Retry please";
				}
			}
			else {

				$this->errors[] = $validate;
				// header("location: /account/enter");
			}
		}

		// header("location: /");
		$this->view->render('Login Page', ['auth_errors' => $this->errors]);
	}

	public function logout() {
		// dump($_SESSION);
			// if(isset($_POST['logout'])) {
		unset($_SESSION['login']);
			// }
		$this->view->render('Logout Page', ['auth_errors' => $this->errors]);
	}

	public function enter() {
			// dump($_POST);
		// dump($this->errors);
		// dump('method enter');
		$this->view->render('Enter Page', ['auth_errors' => $this->errors]);
	}
		// public function login()
		// {
		// 		// dump('ghdfd');
		// 	if ( isset($_POST['exit']) ) {
		// 		unset($_SESSION['user_id']);
		// 		header("location: /");
		// 	}
		// 	$error = '';
		// 	// dump($_POST);
		// 	if( isset($_POST['login']) && isset($_POST['password'] ) && 
		// 		!empty($_POST['login']) && !empty($_POST['password'])) {
		// 		$login = $_POST['login'];
		// 		$password = $_POST['password'];
		// 		$user = new Users();
		// 		$check = $user->checkUser($login, $password);
		// 		// dump($check);
		// 		if($check) {
		// 			$_SESSION['user_id'] = $check['id'];
		// 			$this->user_id = $check['id'];
		// 			@header("Location: ". $_SERVER["REQUEST_URI"]);
		// 		}
		// 		else {
		// 			$error = 'User not found';
		// 		}
		// 	}
		// 	elseif( !isset($_SESSION['user_id']) ) {
		// 		$error = 'Enter login, password';
		// 	}


		// 	$this->view->render('Login Page', ['error' => $error]);
		// }
}