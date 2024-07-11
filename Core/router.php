<?php
require base_path("Core/Router.php");
$routes = require base_path("Core/Router.php");


function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
