<?php
namespace Controllers;
use Models\Model_Step;

class Controller_Step
{
    public $model = null;
    public $data = array();

    function __construct()
    {
        $this->model = new Model_Step();
    }

    public function Items()
    {
        $sqlData = $this->model->getItems();

        foreach ($sqlData as $items){
            $this->data[] = array(
                'image'=>$items['image'],
                'name'=>$items['name'],
                'info'=>$items['info']
            );
        }
        echo  json_encode($this->data);
    }

}