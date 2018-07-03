<?php

namespace Models;

use Models\Bdo;

class Model_Slider extends Bdo
{
    public $SQL = null;

    function __construct()
    {
        parent::__construct();
    }

    public function getItems()
    {
        return $this->SQL->get('Slider');
    }

}