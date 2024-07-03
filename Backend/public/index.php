<?php
require '../vendor/autoload.php';

use App\Controllers\ApiController;

$routes = require '../routes/web.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

foreach ($routes as $route => $handler) {
    list($method, $uri) = explode(' ', $route, 2);
    if ($method == $requestMethod && $uri == $requestUri) {
        list($controller, $action) = $handler;
        (new $controller)->$action();
        exit;
    }
}

http_response_code(404);
echo 'Not Found';