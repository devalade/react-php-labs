<?php

require 'vendor/autoload.php';

use \React\EventLoop\Loop;
use function \React\Async\await;
use function \React\Async\async;
use function React\Promise\Timer\sleep;

$client = new React\Http\Browser();

$client->get('http://www.google.com/')->then(function (Psr\Http\Message\ResponseInterface $response) {
    var_dump($response->getHeaders(), (string)$response->getBody());
}, function (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
});