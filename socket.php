<?php

require 'vendor/autoload.php';
require 'ConnectionsPool.php';

$server = new React\Socket\SocketServer('127.0.0.1:8080');

$pool = new ConnectionsPool();
$server->on('connection', function (React\Socket\ConnectionInterface $connection) use($pool) {
    $pool->add($connection);
});