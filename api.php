<?php
require_once 'models/slider.php';

class Api 
{
    public $BD = null;
    public $slider = null;

    function __construct($BD)
    {
        $this->BD = $BD;
        $this->slider = new Slider($this->BD);
    }

    public function getSliderItems()
    {
       $data =  $this->slider->Items();
       echo json_encode($data);
    }
}