<?php

declare(strict_types=1);

use Laravel\Lumen\Routing\Router;

// Application Routes

/** @var Router $router */

$router->get('/', fn(): string => $router->app->version());

$router->get('/home', 'HomeController');

$router->get('/redirect', 'TestController@redirect');
$router->get('/simple-route', [
    'as' => 'simple-route',
    'uses' => 'TestController@simpleRoute'
]);
$router->get('/complex-route/{param1}/{param2}', [
    'as' => 'complex-route',
    'uses' => 'TestController@complexRoute'
]);
$router->get('/secure', [
    'middleware' => 'auth',
    'uses' => 'TestController@secure'
]);
