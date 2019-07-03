<?php

require __DIR__ . '/vendor/autoload.php';
use Mindedge\CloudwatchLogger\LogClientFactory;

$cw = new LogClientFactory(['debug' => true]);
var_dump($cw->client->DescribeDestinations());