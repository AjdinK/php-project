<?php

use Core\Response;
use Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function isUrl($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}


function base_path($path)
{
    return BASE_PATH.$path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/'.$path);
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    die();
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}


error_reporting(E_ALL);
ini_set("display_errors", 1);
