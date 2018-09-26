<?php

require_once __DIR__ . '/../config.php';

$message = implode(' ', $arguments);

if (!$message){
    $message = 'hello world';
}

echo "Sending message: " . $message . PHP_EOL;
$channel->exchange_declare('fanout_exchange', 'fanout', false, false, false);
$channel->basic_publish(new \PhpAmqpLib\Message\AMQPMessage($message), 'fanout_exchange');
$channel->close();
$connection->close();

