<?php

class Slider
{
    function __construct($BD)
    {
        $this->SQL = $BD;
    }

    public function Items()
    {
        return $this->SQL->get('slider');
    }
}