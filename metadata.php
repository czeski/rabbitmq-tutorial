<?php

$routing_key = end($arguments);
reset($arguments);
$message = implode(' ', array_slice($arguments, 0, count($arguments) - 1));