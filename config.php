<?php

require_once './vendor/autoload.php';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(
    'rabbit',
    '5672',
    'guest',
    'guest'
);

$printCallback = function($msg){
    echo '[x] received: ' . $msg->body . PHP_EOL;
};


$channel = $connection->channel();
$arguments = array_slice($argv, 1);