<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../metadata.php';

if (!$message){
    $message = 'Hello World!';
}
$channel->exchange_declare('sport_events', 'direct', false, false, false, false);
echo '[x] sending ' . $message . ' with routing key ' . $routing_key . PHP_EOL;
$channel->basic_publish(new \PhpAmqpLib\Message\AMQPMessage($message), 'sport_events', $routing_key);