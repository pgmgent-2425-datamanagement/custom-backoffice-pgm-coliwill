<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');

// users
$router->get('/', 'UserController@index');
$router->get('/users', 'UserController@index');
$router->post('/users/add', 'UserController@addUser');
$router->get('/users/edit', 'UserController@GetOneUser');
$router->get('users/detail', 'UserController@getUserDetail');
$router->post('/users/edit', 'UserController@editUser');
$router->post('/users/delete', 'UserController@deleteUser');



//items
$router->get('/items', 'ItemController@index');
$router->get('/', 'ItemController@index');
$router->get('/items/edit', 'ItemController@GetOneItem');
$router->post('/items/edit', 'ItemController@editItem');
$router->post('/items/delete', 'ItemController@deleteItem');
