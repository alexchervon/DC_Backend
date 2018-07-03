<?php

namespace Models;

use Models\Bdo;

class Model_Form extends Bdo
{
    public $SQL = null;

    function __construct()
    {
        parent::__construct();
    }

    public function getItems()
    {
        return $this->SQL->get('Work');
    }

    public function getItem($id = 1)
    {
        $this->SQL->join("work", "work.id=info.work_id", "LEFT");
        $this->SQL->where('work_id', $id);
        return $this->SQL->get('Info');
    }

    public function setData($data)
    {
        $result = $this->SQL->insert ('form', $data);
        if($result)
            echo 'data saves';
    }

}