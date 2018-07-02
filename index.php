<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'vendor/autoload.php';
require_once 'api.php';

$router = new AltoRouter();
$DataBase = new MysqliDb ('localhost', 'root', 'root', 'api');
$Api = new Api($DataBase);


// Получение данных для слайдера
$router->map('GET','/slider',function(){
     global $Api;
     $Api->getSliderItems();
});

$match = $router->match();


if($match && is_callable($match['target'])) {
	call_user_func_array($match['target'],$match['params']); 
} else {
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}