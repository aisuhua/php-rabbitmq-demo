<?php
require_once __DIR__.'/../../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.31.111', 5670, 'root', 'root123');
$channel = $connection->channel();

$channel->exchange_declare('direct_logs', 'direct', false, false, false);

$severity = empty($argv[1]) ? 'info': $argv[1];

$data = implode(' ', array_slice($argv, 2));
if(empty($data)) $data = "Hello World!";

$msg = new AMQPMessage($data);

//routing_key
$channel->basic_publish($msg, 'direct_logs', $severity);

echo " [x] Sent ", $severity, ':',  $data, "\n";

$channel->close();
$connection->close();