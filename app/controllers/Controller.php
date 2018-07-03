<?php
/**
 * Created by PhpStorm.
 * User: Alex Chervon
 * Date: 7/3/2018
 * Time: 2:51 PM
 */

namespace Controllers;


class Controller
{
    public function callAction($method, $parameters)
    {
        return call_user_func_array([$this, $method], $parameters);
    }

    public function __call($method, $parameters)
    {
        throw new \Exception(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
    }

}