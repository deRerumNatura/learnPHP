<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 08.02.2018
 * Time: 14:49
 */

namespace application\controllers;

use application\core\Controller;
use application\controllers\MessageController;
use application\models\Messages;
use application\models\Topics;


class ForumController extends Controller
{
    private $objTopics;
    public $message;
    public $topicId;

    public function __construct($route, array $url_params = [], array $post_vars = [])
    {
        parent::__construct($route, $url_params, $post_vars);
        $this->objTopics = new Topics();
    }

    public function showTopics()
    {

        $this->view->render('Forum', ['allTopics' => $this->objTopics->showAllTopics()]);

    }

    public function showOneTopic()
    {
        $topicId = $_GET['id'];
//        dump($topicId);
        $messages = new Messages();
//        dump($messages);
        $showAllMessages = $messages->showAllMessages($topicId);
        $runTopic = $this->objTopics->showOneTopic($topicId);
//        todo спросить почему в другом методе не реботало
//        dump($showAllMessages);
        $this->view->render('nameOfTopic', ['Topic' => $runTopic, 'Message' => $showAllMessages]);

    }

    public function addTopic()
    {

        if (isset($_POST) && !empty($_POST)) {
            $columnNames = ['title'];
            $valuesNames = [$_POST['title']];

            $this->objTopics->addOneTopic($columnNames, $valuesNames);
        }

        $this->view->render('Add Topic');

    }

}