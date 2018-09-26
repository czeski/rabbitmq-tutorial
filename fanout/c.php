<?php

require_once __DIR__. '/../config.php';


list($queueName) = $channel->queue_declare('', false, false, false, false);
$channel->exchange_declare($exchange = 'fanout_exchange', 'fanout', false, false, false);
$channel->queue_bind($queueName, $exchange);
$channel->basic_consume($queueName, '', false, true, false, false, $printCallback);


while (count($channel->callbacks)){
    $channel->wait();
}

$channel->close();
$connection->close();

