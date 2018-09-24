<?php

require_once  __DIR__ . "/../config.php";

$channel->basic_consume('', '', false, false, false, false, $printCallback);

while(count($channel->callbacks)){
    $channel->wait();
}

