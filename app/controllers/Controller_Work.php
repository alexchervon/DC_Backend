<?php
namespace Controllers;
use Models\Model_Work;

class Controller_Work
{
    public $model = null;
    public $data = array();

    function __construct()
    {
        $this->model = new Model_Work();
    }

    public function Items()
    {
        $sqlData = $this->model->getItems();

        foreach ($sqlData as $items){
            $this->data[] = array(
                'id'=>$items['id'],
                'ico'=>$items['ico'],
                'image'=>$items['image'],
                'name'=>$items['name'],
                'info'=>$items['info']
            );
        }
        echo  json_encode($this->data);
    }

    public function Detail($id)
    {
        if (!isset($id['id'])){
            echo json_encode(array('error'=>'id incorrected'));
            die();
        } else {
            $id = $id['id'];
        }

        $sqlData = $this->model->getItem($id);
        if (!empty($sqlData)) {
            $sqlData = $sqlData[0];
        } else {
            echo json_encode(array('error'=>'item not found'));
        }

        $this->data = array(
            'id'=>$sqlData['id'],
            'describe'=>$sqlData['describe'],
            'name'=>$sqlData['name'],
            'author'=>$sqlData['author'],
            'countMan'=>$sqlData['countMan']
        );

        echo  json_encode($this->data);
    }

}