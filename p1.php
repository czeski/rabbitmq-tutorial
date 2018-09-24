<?php

require_once __DIR__. '/../config.php';

$message = array_pop($arguments);

if (!$message){
    $message = 'Hello World!';
}

echo "Sending message: " . $message . PHP_EOL;
$channel->basic_publish(new \PhpAmqpLib\Message\AMQPMessage($message));
