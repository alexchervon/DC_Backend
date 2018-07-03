<?php
namespace Controllers;
use Models\Model_Slider;

class Controller_Slider
{
    public $model = null;
    public $data = array();

    function __construct()
    {
        $this->model = new Model_Slider();
    }

    public function Items()
    {
        $sqlData = $this->model->getItems();

        foreach ($sqlData as $items){
            $this->data[] = array(
                'header'=>$items['head'],
                'info'=>$items['tagline'],
                'button'=>$items['button'],
                'link'=>$items['href'],
                'image'=>$items['image']
            );
        }
        echo  json_encode($this->data);
    }

}