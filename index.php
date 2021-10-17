<?php


/**
 * @author Kravchenko Dmitriy
 * единная точка входа
 * запускаем сессию
 */
session_start();

require 'vendor/autoload.php';
date_default_timezone_set('Asia/Almaty');


/**
 * роутинг https://packagist.org/packages/nikic/fast-route
 *
 */
//print_r($_SERVER);die;
//print_r($_SESSION);
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/login', function () {
//        require_once 'info.php';
        $controller = new App\Controllers\UserController();
        $controller->index();
    });
    $r->addRoute('GET', '/users', function () {
        $controller = new App\Controllers\UserController();
        $controller->get();
    });
    $r->addRoute('GET', '/', function () {
        $controller = new App\Controllers\TaskController();
        $controller->index();
    });
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo('404 Not Found');

        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        header('HTTP/1.0 405 Method Not Allowed');
        echo 'Method Not Allowed 405';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $handler($vars);
        // ... call $handler with $vars
        break;
}
