<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../metadata.php';

$exchangeName = 'sport_events_topic';
$channel->exchange_declare($exchangeName, 'topic', false, false, false);
echo "Sending '$message' to $exchangeName routing key $routing_key" . PHP_EOL;
$channel->basic_publish(new \PhpAmqpLib\Message\AMQPMessage($message), 'sport_events_topic', $routing_key);