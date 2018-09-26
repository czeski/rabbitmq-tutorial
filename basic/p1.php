<?php

require_once __DIR__. '/../config.php';

$channel->queue_declare('q', false, false, false, false);
$message = implode(' ', $arguments);

if (!$message){
    $message = 'Hello World!';
}

echo "Sending message: " . $message . PHP_EOL;
$channel->basic_publish(new \PhpAmqpLib\Message\AMQPMessage($message), '', 'q');
