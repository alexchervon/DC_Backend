<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *, X-Requested-With, Content-Type, Accept");
header('Content-Type: text/html; charset=utf-8');
require_once 'vendor/autoload.php';

use Controllers\Controller_Slider;

$router = new AltoRouter();

// Получение данных для слайдера
$router->map('GET', '/slider/items/', 'Slider#Items');

// Получение данных для About
$router->map('GET', '/about/items/', 'About#Items');

// Получение данных для Step
$router->map('GET', '/step/items/', 'Step#Items');

// Получение данных для Work
$router->map('GET', '/works/items/', 'Work#Items');

// Получение данных для Detail
$router->map('GET', '/works/detail/[i:id]/', 'Work#Detail');

// Валидация полей
$router->map('POST', '/valid/', 'Form#Validate');

$match = $router->match();

if ($match === false) {
    echo 'method not found';
} else {
    $prefix = 'Controller_';
    list($controller, $action) = explode('#', $match['target']);
    $className = 'Controllers\\' . $prefix . $controller;
    $exempl = new $className();
    if (is_callable(array($exempl, $action))) {
        call_user_func_array(array($exempl, $action), array($match['params']));
    } else {
        echo $prefix . $controller;
    }
}
