<?php
require_once __DIR__.'/../../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.31.10', 5672, 'root', 'root123');
$channel = $connection->channel();

$exchange = 'exchange-demo';
$queue_name = 'queue-demo';
$routing_key = 'queue-demo';

$channel->queue_declare($queue_name, false, true, false, false);
$channel->exchange_declare($exchange, 'direct', false, true, false);

$message = implode(' ', array_slice($argv, 1));

$msg = new AMQPMessage($message, [
    'content_type' => 'text/plain'
]);

$channel->basic_publish($msg, $exchange, $routing_key);

echo " [x] Sent '{$message}'\n";

$channel->close();
$connection->close();
