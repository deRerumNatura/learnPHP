<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 26.01.2018
 * Time: 18:19
 */

namespace application\controllers;

use application\controllers\AdminController;
use application\models\News;

class AdminnewsController extends AdminController
{
    private $objNews;

    public function __construct($route, array $url_params = [], array $post_vars = [])
    {
        parent::__construct($route, $url_params, $post_vars);
        $this->objNews = new News();
    }

    public function index()
    {
        $this->view->render('Admin News', ['allNews' => $this->objNews->getAllNews()]);
    }

    public function create()
    {

//        $error = [];
        $message = '';
        if (isset($_POST) && !empty($_POST)) {

            if (empty($_POST['title']) || empty($_POST['content']) || empty($_POST['date'])) {
                $this->errors[] = 'Заполните все поля!';
            } else {
                $columnNames = ['title', 'content', 'date'];
                $values = [$_POST['title'], $_POST['content'], $_POST['date']];
                $lastInsertId = $this->objNews->insertRecord($columnNames, $values);
//                dump($_FILES[key($_FILES)]['name']));

                if (!$lastInsertId) {
                    $this->errors[] = 'Ошибка добавления';
                } else {
                    $this->messages[] = 'Новость успешно добавлена';
                }

                if (!empty($_FILES[key($_FILES)]['name'])) {
                    $imageName = $this->uploadImage($_FILES, $this->objNews->table, $lastInsertId);
//                    $this->errors[] = 'картинка успешно добавлена'
//                    $this->errors[] = 'добавте корректное изображение';
                    $this->objNews->insertImageRecord('image_name', $imageName, $lastInsertId);
                }
                $errorString = [];
//                dump($this->messages);
                if(!empty($this->errors)) {
//                    foreach ($this->errors as  $value) {
//
//                        $errorString[] .=  $value;
//
//                    }
                    $errorExist = 1;
                }
                else {
                    $errorExist = 0;
                }
                $errorString = implode("&", $errorString);
                header( 'location: /adminnews/update?id=' . $lastInsertId . '&errorExist=' . $errorExist);
//                TODO как перенаправить и передать массив
            }
        }

//        dump($errorString);
        $this->view->render('Create Record', ['message' => $message, 'error' => $this->errors]);

    }

    public function update()
    {
//        dump($_GET['errorExist']);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

//            $errorString = [];
//            foreach ($_GET as $key => $value) {
//                if($key == '/adminnews/update' || $key == 'id') {
//                    continue;
//                }
//                $errorString[] .= $key . ' = ' . $value;
//
//            }
            if (isset($_GET['errorExist']) && $_GET['errorExist'] == 1) {
                $this->errors[] = 'прикрепите валидное изображение';
            }
            elseif (isset($_GET['id'])) {
                $this->errors = [];
                $this->messages = [];
            }
            else {
                $this->messages[] = 'новость успешно добавлена';
            }

        }
//        dump($errorString);

        if (isset($_POST) && !empty($_POST) && !isset($_POST['delete']) && empty($_POST['delete'])) {
            $id = $_POST['id'];
            $this->objNews->updateNewsRecord($_POST);
            $this->messages[] = "Новость успешно обновлена";
//                dump($id);
            if (!empty($_FILES[key($_FILES)]['name'])) {
                $imageName = $this->uploadImage($_FILES, $this->objNews->table, $id);

                $this->objNews->insertImageRecord('image_name', $imageName, $id);
                dump($this->errors);
            }

            if (!empty($this->errors)) {
                $this->messages = [];
            }
        }

        if (isset($_POST['delete']) && !empty($_POST['delete'])) {
            $id = $_POST['id'];
            $this->objNews->deleteNewsRecord($_POST);
            $this->messages[] = "Новость успешно удалена";
        }
//        dump($this->errors);
        $this->view->render('Admin', ['newsOne' => $this->objNews->getOneNews($id), 'error' => $this->errors, 'messages' => $this->messages]);
    }

}
