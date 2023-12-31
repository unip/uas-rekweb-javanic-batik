<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/user', 'UserController@create');
$router->get('/user/detail/{id}', 'UserController@detail');
$router->get('/user', 'UserController@index');
$router->put('/user/update/{id}', 'UserController@update');
$router->put('/user/delete/{id}', 'UserController@delete');


$router->get('/produk', 'ProdukController@index');
$router->get('/produk/detail/{id}', 'ProdukController@detail');
$router->post('/produk', 'ProdukController@create');
$router->put('/produk/update/{id}', 'ProdukController@update');
$router->put('/produk/delete/{id}', 'ProdukController@delete');


$router->group(['middleware' => 'basicAuth'], function () use ($router) {
});



$router->post('/kategori', 'CategoryController@create');
$router->get('/kategori/detail/{id}', 'CategoryController@detail');
$router->get('/kategori', 'CategoryController@index');
$router->put('/kategori/update/{id}', 'CategoryController@update');
$router->put('/kategori/delete/{id}', 'CategoryController@delete');
