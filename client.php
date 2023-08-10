<?php

require 'vendor/autoload.php';

$connector = new React\Socket\Connector();

$connector->connect('127.0.0.1:8080')->then(function (React\Socket\ConnectionInterface $connection) {
    $connection->pipe(new React\Stream\WritableResourceStream(STDOUT));
    $connection->write("Hello World!\n");
}, function (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
});