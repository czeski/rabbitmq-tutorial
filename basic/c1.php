<?php

require_once  __DIR__ . "/../config.php";

$channel->queue_declare('q', false, false, false, false);
$channel->basic_consume('q', '', false, true, false, false, $printCallback);

while(count($channel->callbacks)){
    $channel->wait();
}

$channel->close();
$connection->close();

