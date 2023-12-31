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

$router->group(['middleware' => 'basicAuth'], function () use ($router) {
    $router->get('/user/detail/{id}', 'UserController@detail');
    $router->put('/user/update/{id}', 'UserController@update');
    $router->put('/user/delete/{id}', 'UserController@delete');
    $router->get('/user', 'UserController@index');

    $router->post('/produk', 'ProdukController@create');
    $router->post('/produk/update/{id}', 'ProdukController@update');
    $router->put('/produk/delete/{id}', 'ProdukController@delete');

    $router->post('/kategori', 'CategoryController@create');
    $router->post('/kategori/update/{id}', 'CategoryController@update');
    $router->put('/kategori/delete/{id}', 'CategoryController@delete');

    $router->post('/logout', 'AuthController@logout');

    $router->get('/order/detail/{id}', 'OrderController@detail');
    $router->put('/order/update/{id}', 'OrderController@update');
    $router->put('/order/delete/{id}', 'OrderController@delete');
    $router->get('/order', 'OrderController@index');

    $router->get('/pesan/detail/{id}', 'PesanController@detail');
    $router->put('/pesan/delete/{id}', 'PesanController@delete');
    $router->get('/pesan', 'PesanController@index');
});

$router->post('/user', 'UserController@create');

$router->get('/produk', 'ProdukController@index');
$router->get('/produk/detail/{id}', 'ProdukController@detail');

$router->get('/kategori/detail/{id}', 'CategoryController@detail');
$router->get('/kategori', 'CategoryController@index');

$router->post('/login', 'AuthController@login');

$router->post('/order', 'OrderController@create');
$router->post('/order/phone', 'OrderController@getByPhone');

$router->post('/pesan', 'PesanController@create');
