<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 08.02.2018
 * Time: 18:04
 */

namespace application\controllers;

use application\core\Controller;
use application\models\Messages;
use application\controllers\ForumController;

class MessageController extends Controller
{
    private $objMessages;
    private $topicObj;

    public function __construct($route, array $url_params = [], array $post_vars = [])
    {
        parent::__construct($route, $url_params, $post_vars);
        $this->objMessages = new Messages();
    }

    public function add() {

        $topic_id = $_POST['topicId'];

        $columnNames = ['text', 'topic_id'];
        $valuesNames = [$_POST['message'], $topic_id];

        $this->objMessages->addMessage($columnNames, $valuesNames);

        header('location: /forum/showone?id='. $topic_id);
        $this->view->render();
    }

    public function show ($topicId) {

        $this->objMessages->showAllMessages($topicId);

        $this->view->render();
    }
}