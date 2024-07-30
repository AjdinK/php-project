<?php

use Core\Container;

test('it can resolve something out of the container', function () {
    //arange 
    $container = new Container();
    $container->bind('foo', fn() => 'bar');

    //act 
    $result = $container->resolve('foo');

    //assert
    expect($result)->toEqual('asdasdasdasd');

});
