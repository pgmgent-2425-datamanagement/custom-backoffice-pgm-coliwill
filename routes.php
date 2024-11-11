<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });

use App\Controllers\UserController;

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
$router->post('/items/add', 'ItemController@addItem');
$router->get('/items/search', 'ItemController@search');
$router->get('/items/filter', 'ItemController@filter');


//transactions
$router->get('/transactions', 'TransactionController@index');
$router->post('/transactions/add', 'TransactionController@addTransaction');
$router->get('/transactions/edit', 'TransactionController@GetOneTransaction');
$router->post('/transactions/edit', 'TransactionController@editTransaction');

