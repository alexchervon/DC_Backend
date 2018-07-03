<?php
namespace Models;
use MysqliDb;

class Bdo
{
    public $SQL = null;

    function __construct()
    {
        $this->SQL = new MysqliDb ('localhost', 'root', 'root', 'api');
    }
}