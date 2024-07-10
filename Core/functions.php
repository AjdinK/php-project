<?php
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

//dd($_SERVER);
//echo $_SERVER['REQUEST_URI'];

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


error_reporting(E_ALL);
ini_set("display_errors", 1);



