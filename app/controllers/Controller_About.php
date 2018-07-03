<?php
namespace Controllers;
use Models\Model_About;

class Controller_About
{
    public $model = null;
    public $data = array();

    function __construct()
    {
        $this->model = new Model_About();
    }

    public function Items()
    {
        $sqlData = $this->model->getItems();

        foreach ($sqlData as $items){
            $this->data[] = array(
                'ico'=>$items['ico'],
                'name'=>$items['name'],
                'info'=>$items['info']
            );
        }
        echo  json_encode($this->data);
    }

}