<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 08.02.2018
 * Time: 15:24
 */

namespace application\models;
use application\core\Model;

class Messages extends Model
{
    public $table = 'messages';

    public function __construct()
    {
        parent::__construct();
    }

//    public function showMessages () {
//
//        return $this->getAll($this->table, ['*']);
//
//    }

    public function addMessage ($columns, $values) {

        return $this->createRecord($this->table, $columns, $values);

    }

    public function showAllMessages ($messageId = '') {

        return $this->getAll($this->table, ['*'], $messageId);

    }

}