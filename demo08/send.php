<?php
require_once __DIR__.'/../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.31.10', 5672, 'root', 'root123');
$channel = $connection->channel();

$channel->exchange_declare('topic_logs', 'topic', false, false, false);

// kern.info php.critical
$routing_key = empty($argv[1]) ? 'anonymous.info': $argv[1];

$data = implode(' ', array_slice($argv, 2));
if(empty($data)) $data = "Hello World!";

$msg = new AMQPMessage($data);

//routing_key
$channel->basic_publish($msg, 'topic_logs', $routing_key);

echo " [x] Sent ", $routing_key, ':',  $data, "\n";

$channel->close();
$connection->close();