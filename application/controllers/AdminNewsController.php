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
        phpinfo();
    }

    public function create()
    {
//        dump($_POST);
        $error = [];
        $message = '';
        if (isset($_POST) && !empty($_POST)) {
//            echo ' шонибуть';
            if(empty($_POST['title']) || empty($_POST['content']) || empty($_POST['date'])) {
                $error[] = 'Заполните все поля!';
            }
            else {
                $columnNames = ['title', 'content', 'date'];
                $values = [$_POST['title'], $_POST['content'], $_POST['date']];

                $result = $this->objNews->insertRecord($columnNames, $values);

                if (!$result) {
                    $error[] = 'Ошибка добавления';
                }
                else {
                    $message = 'Новость успешно добавлена';
                }
            }
        }


        $this->view->render('Create Record', ['message' => $message, 'error' => $error]);
    }

    public function update()
    {
        $error = '';

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        if(isset($_POST) && !empty($_POST)  && !isset($_POST['delete']) && empty($_POST['delete'])) {
            $id = $_POST['id'];
            $this->objNews->updateNewsRecord($_POST);
            $error = "Новость успешно обновлена";
        }

        if(isset($_POST['delete']) && !empty($_POST['delete'])) {
            $id = $_POST['id'];
            $this->objNews->deleteNewsRecord($_POST);
            $error = "Новость успешно удалена";
        }

        $this->view->render('Admin', ['newsOne' => $this->objNews->getOneNews($id), 'errors' => $error]);
    }

    public function insertImage () {
    
    }


}