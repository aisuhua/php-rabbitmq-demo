<?php
require_once __DIR__.'/../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.31.10', 5672, 'root', 'root123');
$channel = $connection->channel();

$channel->exchange_declare('hello-exchange', 'direct', false, false, false);

$message = implode(' ', array_slice($argv, 1));

$msg = new AMQPMessage($message, [
    'content_type' => 'text/plain'
]);

$channel->basic_publish($msg, 'hello-exchange', 'suhua');

$channel->close();
$connection->close();
