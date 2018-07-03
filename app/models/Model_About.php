<?php
namespace Models;
use Models\Bdo;

class Model_About extends Bdo
{
    public $SQL = null;

    function __construct()
    {
        parent::__construct();
    }

    public function getItems()
    {
        return $this->SQL->get('About');
    }

}