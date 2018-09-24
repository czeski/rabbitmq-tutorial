<?php

require_once './vendor/autoload.php';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(
    'rabbit',
    '5672',
    'guest',
    'guest'
);

$printCallback = function($msg){
    echo '[x] received: ' . $msg . PHP_EOL;
};


$channel = $connection->channel();
$channel->queue_declare();
$arguments = array_slice($argv, 1);