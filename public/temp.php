<?php

use Illuminate\Support\Collection;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../Core/functions.php';

$numbers = new Collection([
    1, 2, 3, 4, 5,
]);

dd(var_dump($numbers));