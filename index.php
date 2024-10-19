<?php

require "vendor/autoload.php";
require "init.php";


global $conn;

try {


    $router = new \Bramus\Router\Router();


    $router->get('/', '\App\Controllers\HomeController@index');
    $router->get('/suppliers', '\App\Controllers\SupplierController@list');
    $router->get('/suppliers/{id}', '\App\Controllers\SupplierController@single');
    $router->post('/suppliers/{id}', '\App\Controllers\SupplierController@update');
    

    $router->get('/registration-form', '\App\Controllers\RegistrationController@showForm');
    $router->post('/register', '\App\Controllers\RegistrationController@register');
    $router->get('/login-form', '\App\Controllers\LoginController@showForm');
    $router->post('/login', '\App\Controllers\LoginController@login');
    $router->get('/welcome', '\App\Controllers\LoginController@welcome'); // Create a welcome method in the controller
    $router->get('/logout', '\App\Controllers\LoginController@logout');

    


    $router->run();

} catch (Exception $e) {

    echo json_encode([
        'error' => $e->getMessage()
    ]);

}
