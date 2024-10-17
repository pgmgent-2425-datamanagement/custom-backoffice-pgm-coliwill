<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');


$router->get('/', 'UserController@index');
$router->get('/users', 'UserController@index');
$router->post('/users/add', 'UserController@addUser');


$router->get('/items', 'ItemController@index');
$router->get('/', 'ItemController@index');