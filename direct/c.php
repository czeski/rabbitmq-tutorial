<?php

require_once __DIR__ . '/../config.php';

list($queueName, $routing_key) = $arguments;

$channel->queue_declare($queueName, false, false, false, false);
$channel->exchange_declare('sport_events', 'direct', false, false, false, false);

$channel->queue_bind($queueName, 'sport_events', $routing_key);
$channel->basic_consume($queueName, '', false, false, false, false, $printCallback);

echo "$queueName queue created and bounded with $routing_key" . PHP_EOL;

while (count($channel->callbacks)){
    $channel->wait();
}

$channel->close();
$connection->close();