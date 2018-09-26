<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../metadata.php';

$exchangeName = 'sport_events_topic';
$channel->exchange_declare($exchangeName, 'topic', false, false, false);
$channel->queue_declare($message, false, false, false , false);
$channel->queue_bind($message, $exchangeName, $routing_key);
$channel->basic_consume($message, false, false, false, false, false, $printCallback);

echo "$message created bounded with $exchangeName with routing key $routing_key" . PHP_EOL;

while(count($channel->callbacks)){
    $channel->wait();
}