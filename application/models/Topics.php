<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 08.02.2018
 * Time: 15:23
 */

namespace application\models;
use application\core\Model;

class Topics extends Model
{
    public $table = 'topics';

    public function __construct()
    {
        parent::__construct();
    }

    public function showAllTopics () {

        return $this->getAll($this->table, ['*']);

    }

    public function showOneTopic ($id) {

        return $this->getOne($this->table, $id);

    }

    public function addOneTopic ($columns, $values) {

        return $this->createRecord($this->table, $columns, $values);

    }
}